<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Quote;
use App\Models\Client;
use Carbon\Carbon;
use http\Env\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = Quote::with('client')->get();
        return view('quotes.index', compact('quotes'));
    }

    public function getQuotesData()
    {
        $quotes = Quote::select([
            'id',
            'client_id',
            'client_name',
            'client_company',
            'guests',
            'event_date',
            'event_type',
            'package_type',
            'description',
            'status',
            'folio'
        ]);

        return DataTables::of($quotes)
            ->addColumn('actions', function ($quote) {
                return'
                <a href="'. route('quotes.edit', $quote->id) .'" class="btn btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>';
            })
            ->editColumn('event_date', function ($quote) {
                return $quote->event_date
                    ? Carbon::parse($quote->event_date)->format('Y-m-d H:i')
                    : 'Sin fecha';
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Obtener fechas ocupadas desde la Tabla Event
        $date_occupied = Event::select('event_date')
            ->whereNotNull('event_date')
            ->pluck('event_date')
            ->toArray();

        //Fecha fijas deshabilitadas
        $dates_off = [
            "2025-12-25",
            "2025-12-31",
            "2026-12-25",
            "2026-12-31",
            "2027-12-25",
            "2027-12-31",
            "2028-12-25",
            "2028-12-31",
            "2029-12-25",
            "2029-12-31",
            "2030-12-25",
            "2030-12-31",
        ];

        //Unir ambas listas
        $occupied = array_merge($dates_off, $date_occupied);

        //Obtener lista de clientes
        $clients = Client::all();

        return view('quotes.registrarCotizacion' , compact('occupied', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'client_id' => 'required|exists:clients,id',
           'guests' => 'required|integer|min:1',
           'event_date' => 'required|date_format:Y-m-d H:i',
           'event_type' => 'required|string',
           'package_type' => 'required|string',
           'description' => 'nullable|string',
        ]);

        //Obtener el ultimo folio registrado
        $lastFolio = Quote::orderBy('created_at', 'desc')->first();
        $lastNumber = $lastFolio ? (int) substr($lastFolio->create_at, 1) : 1000; //Si no hay folios previo empezar desde 1000

        //Generar el nuevo Folio
        $newFolio = 'A' . ($lastNumber + 1);

        //Obtener el cliente
        $client = Client::findOrFail($validated['client_id']);

        Quote::create([
            'client_id' => $client->id,
            'client_name' => "{$client->first_name} {$client->last_name}{$client->second_surname}",
            'client_company' => $client->company,
            'guests' => $validated['guests'],
            'event_date' => $validated['event_date'],
            'event_type' => $validated['event_type'],
            'package_type' => $validated['package_type'],
            'description' => $validated['description'],
            'status'=>'pending',//Estados por defecto
            'folio' => $newFolio, //Asignar el nuevo Folio
        ]);

        return redirect()->route('quotes.index')->with('success','Cotización guardada con exito');
    }

    public function migrateQuotesToEvents()
    {
        $quotes = Quote::with('client')->get(); //Traemos las Cotizaciones del cliente

        if ($quotes->isEmpty()) {
            return response()->json(['message' => 'No se encontraron cotizaciones para migrar'], 404);
        }

        foreach ($quotes as $quote) {
            Event::updateOrCreate(
                ['quote_id' => $quote->id],//Garantizamos que no haya duplicados
                [
                    'folio' => $quote->folio,
                    'client_id' => $quote->client_id,
                    'event_date' => $quote->event_date,
                    'event_type' => $quote->event_type,
                    'guests' => $quote->guests,
                    'package_type' => $quote->package_type,
                    'description' => $quote->description,
                    'status' => $quote->status ?? 'pending',
                ]
            );
        }
        return response()->json(['message' => 'Quotes migrado con exito']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $quote = Quote::findOrFail($id);//Obtener Lista de Cotizaciones
        return view('quotes.edit', compact('quote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
            $validated = $request->validate([
                'guests' => 'required|integer|min:1',
                'event_date' => 'required|date_format:Y-m-d H:i',
                'event_type' => 'required|string',
                'package_type' => 'required|string',
                'description' => 'nullable|string',
                'status' => 'required|string|in:pending,approved,rejected',
            ]);

        $quote = Quote::findOrFail($id);

        $quote->update([
           'guests' => $validated['guests'],
           'event_date' => $validated['event_date'],
           'event_type' => $validated['event_type'],
           'package_type' => $validated['package_type'],
           'description' => $validated['description'],
           'status' => $validated['status'],
        ]);

        return redirect()->route('quotes.index')->with('success','Cotización actualizada con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function searchClientQuote (Request $request)
    {
        $query = $request->input('query','');
        $type = $request->input('type'); //Tipo de Busqueda: 'name' o 'folio'

        if (empty($query)) {
            return response()->json([],200);//Devulve vacio si no hay resultados
        }

        $quotes = Quote::query();

        //Filtrar según el tipo
        if ($type == 'name') {
            $quotes->where('client_name', 'LIKE', "%{$query}%");
        } elseif ($type == 'folio') {
            $quotes->where('folio', 'LIKE', "%{$query}%");
        }

        $results = $quotes->get(['id', 'folio', 'client_id','client_name']);

        return response()->json($results);
    }
}

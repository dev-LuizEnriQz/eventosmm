<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Quote;
use App\Models\Client;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function createEventFromQuote($quoteId)
    {
        //Obtener la Cotización
        $quote = Quote::findOrFail($quoteId);//Buscar la cotización por su ID

        //Verificar si ya existe un evento para este coctización
        $existingEvent = Event::where('quote_id', $quoteId)->first();
        if ($existingEvent) {
            return response()->json(['message' => 'Ya existe un evento con ese id: ' . $existingEvent->id], 400);
        }

        //Crear un evento Nuevo
        $event = new Event();
        $event->folio = $quote->folio;
        $event->client_id = $quote->client_id; //Asignar el Id del Cliente
        $event->quote_id = $quote->id; //Asignar el Id de la Cotizacion
        $event->event_type = $quote->event_type; // Tipo de evento
        $event->event_date = $quote->event_date; // Fecha del evento
        $event->status = $quote->status; //Status del Evento
        $event->guests = $quote->guests; // Numero de invitados
        $event->package_id = $quote->package_id; // Tipo de Paquete
        $event->description = $quote->description; //Descripción del evento
        $event->save();

        return response()->json(['event' => 'Evento creado con exito.'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quote_id' => 'required|exists:quotes,id',
            'client_id' => 'required|exists:clients,id',
            'guests' => 'required|integer|min:1',
            'event_type' => 'required|string',
            'event_date' => 'required|date',
            'package_id' => 'required|exists:packages,id',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'folio' => 'required|string'
        ]);

        Event::create([
           'quote_id' => $request->quote_id,
            'client_id' => $request->client_id,
            'guests' => $request->guests,
            'event_type' => $request->event_type,
            'event_date' => $request->event_date,
            'package_id' => $request->package_id,
            'description' => $request->description,
            'status' => $request->status,
            'folio' => $request->folio,
        ]);

        return response()->json(['event' => 'Evento creado con exito.'], 200);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

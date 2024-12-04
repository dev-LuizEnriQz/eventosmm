<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\RedirectResponse;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Renderiza la vista principal
        return view('clients.index');
    }

    public function getClientsData(Request $request)
    {
        if ($request->ajax()) {
            $data = Client::where('activo',1)->get();
            return DataTables::of($data)
                ->addColumn('actions', function ($row) {
                    return '<a href="/clients/' . $row->id . '/edit" class="btn btn-sm btn-primary">Editar</a>
                            <a href="/clients/' . $row->id . '/desactivate" class="btn btn-sm btn-danger">Desactivar</a>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        return response()->json(['message' => 'Invalid Request'], 400);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.registrarCliente');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request) //Utilizamos Form Request Cliente
    {
        $clientData = $request->validated();
        $clientData['created_by'] = Auth::id(); //Asigna el Id del usuario autentificado que registro al Cliente

        Client::create($clientData);
        return redirect()->route('clients.index')->with('success', 'Cliente creado satisfactoriamente');
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
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, string $id)
    {
        $client = Client::findOrFail($id);
        $client->update($request->validated());

        return redirect()->route('clients.index')->with('success', 'Cliente actualizado satisfactoriamente');
    }

    public function desactivate($id) //Desactivar un cliente, para que no lo muestre en los resultados de busqueda
    {
        $client = Client::findOrFail($id);
        $client->update(['activo' => 0]);

        return redirect()->route('clients.index')->with('success', 'Cliente desactivado satisfactoriamente');
    }
}

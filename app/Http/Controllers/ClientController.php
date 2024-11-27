<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Client::where('activo', 1)->orderBy('first_name', 'asc')->get();
        return view('clients.index', compact('clientes'));
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
        Client::create($request->validated() + ['activo' => 1]);
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

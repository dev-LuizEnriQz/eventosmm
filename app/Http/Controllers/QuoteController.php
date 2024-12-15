<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Client;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('quotes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('quotes.registrarCotizacion');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           'client_id' => 'required|exists:clients,id',
           'client_name' => 'required|string|max:255',
           'client_company' => 'nullable|string|max:255',
           'guests' => 'required|integer|min:1',
           'event_date' => 'required|date',
           'event_type' => 'required|string',
           'package_type' => 'required|string',
           'description' => 'nullable|string',
        ]);

        $client = Client::findOrFail($validated['client_id']);

        Quote::create([
            'client_id' => $client->id,
            'client_name' => $client->full_name,
            'client_company' => $client->company,
            'guests' => $validated['guests'],
            'event_date' => $validated['event_date'],
            'event_type' => $validated['event_type'],
            'package_type' => $validated['package_type'],
            'description' => $validated['description'],
            'status'=>'pending',//Estados por defecto
        ]);

        return redirect()->route('quotes.index')->with('success','Cotización guardada con exito');
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
        return view('quotes.edit');
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

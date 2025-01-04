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
        $event->client_id = $quote->client_id; //Asignar el Id del Cliente
        $event->quote_id = $quote->id; //Asignar el Id de la Cotizacion
        $event->event_type = $quote->event_type; // Tipo de evento
        $event->event_date = $quote->event_date; // Fecha del evento
        $event->status = $quote->status; //Status del Evento
        $event->guests = $quote->guests; // Numero de invitados
        $event->package_type = $quote->package_type; // Tipo de Paquete
        $event->description = $quote->description; //Descripción del evento
        $event->save();

        return response()->json(['event' => 'Evento creado con exito.'], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

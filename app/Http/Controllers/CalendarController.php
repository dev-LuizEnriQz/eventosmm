<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\Quote;
use App\Models\Client;
use Illuminate\Http\Request;
use function PHPSTORM_META\map;

class CalendarController extends Controller
{
    public function index()
    {
        return view('calendar.index');
    }

    public function getEvents()
    {
        $events = Event::with('Quote')//Carga de relacion con el modelo Cotización
            ->where('status','approved')//Solo eventos aprovados
            ->get()
            ->map(function ($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->quote->client_name . ' - ' . $event->event_type,
                    'start' => $event->event_date,
                    'extendedProps' => [
                        'client_name' => $event->quote->client_name ?? 'Sin Cliente', //Nombre completo desde la cotizacion
                        'event_type' => $event->event_type,
                        'guests' => $event->guests,
                        'package_type' => $event->package_type,
                        'description' => $event->description,
                        'status' => $event->status,
                    ],
                ];
            });
        return response()->json($events);
    }
}

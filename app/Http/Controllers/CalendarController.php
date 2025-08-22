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

    public function getEvents(Request $request)
    {
        $status = $request->query('status');//Obtener el parametro status

        $eventsQuery = Event::with(['client', 'quote']); //Relacionar con cliente y cotizacion

        if ($status) {
            $eventsQuery->where('status', $status);//Filtrar por estado si existe
        }
        $events = $eventsQuery->get()->map(function ($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->quote->client_name . ' - ' . $event->event_type,
                    'start' => $event->event_date,
                    'extendedProps' => [
                        'folio' => $event->folio,
                        'client_name' => $event->quote->client_name ?? 'Sin Cliente', //Nombre completo desde la cotizacion
                        'event_type' => $event->event_type,
                        'guests' => $event->guests,
                        'package_name' => $event->package ? $event->package->name : 'Sin Paquete', //Nombre del Paquete
                        'description' => $event->description,
                        'status' => $event->status,
                    ],
                ];
            });
        return response()->json($events);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Service;

class EventServiceController extends Controller
{
    public function store(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $service = Service::findOrFail($request->service_id);

        $event->services()->attach($service->id);

        return response()->json([
            'message' => 'Servicio asignado al evento correctamente.'
        ], 201);
    }

    /**
     * Obtener todos los servicios asignados a un evento.
     *
     * @param  int  $eventId
     * @return \Illuminate\Http\Response
     */
    public function index($eventId)
{
    $event = Event::findOrFail($eventId);
    $services = $event->services;

    $serviceNames = [];

    foreach ($services as $service) {
        $serviceNames[] = $service->name;
    }

    return response()->json($serviceNames);
}

    /**
     * Eliminar un servicio asignado a un evento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $event = Event::findOrFail($request->event_id);
        $service = Service::findOrFail($request->service_id);

        $event->services()->detach($service->id);

        return response()->json([
            'message' => 'Servicio eliminado del evento correctamente.'
        ], 200);
    }
}

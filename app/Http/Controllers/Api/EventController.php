<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Controllers\Api\CustomerController;
use App\Models\Customer;
use App\Models\Location;

class EventController extends Controller
{
    public function list(){
        $events = Event::all();
        $list = [];

        foreach($events as $event){
            $object = [
                "id"=>$event->id,
                "customer_name"=>$event->client->first_name,
                "location_name"=>$event->location->name,
                "date"=>$event->date,
                "event_type"=>$event->event_type,
                
                
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
    $event = Event::where('id','=', $id)->first();
    
    if ($event) {
        $object = [
            "id" => $event->id,
            "customer_name"=>$event->client->first_name,
            "location_name"=>$event->location->name,
            "date" => $event->date,
            "event_type" => $event->event_type,
            
        ];

        return response()->json($object);
    } else {
        // Manejar el caso en el que no se encuentra ningún evento con el ID dado
        return response()->json(['error' => 'Evento no encontrado'], 404);
    }
}
public function search(Request $request)
{
    $keyword = $request->input('keyword');
    $events = Event::where('event_type', 'LIKE', '%' . $keyword . '%')->get();
    $list = [];

    foreach ($events as $event) {
        $client = $event->client; 
        $location = $event->location; 

        $clientName = $client->first_name . ' ' . $client->surname;
        $locationName = $location->name;

        $object = [
            "id" => $event->id,
            "client_name" => $clientName,
            "location_name" => $locationName,
            "date" => $event->date,
            "event_type" => $event->event_type,
            "created_at" => $event->created_at,
            "updated_at" => $event->updated_at
        ];

        array_push($list, $object);
    }

    return response()->json($list);
}
public function update(Request $request, $id)
{
    $data = $request->all();

    $record = Event::findOrFail($id);
    $record->update($data);

    return response()->json($record, 200);
}


public function store(Request $request)
{
    $data = $request->all();

    $record = Event::create($data);

    return response()->json($record, 201);
}

/**
 * Eliminar un registro existente.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $record = Event::findOrFail($id);
    $record->delete();

    return response()->json(null, 204);
}

}

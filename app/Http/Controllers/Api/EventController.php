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
                "name"=>$event->name,
                "description"=>$event->description,
                "customer_name"=>$event->customer->full_name,
                "location_name"=>$event->location->name,
                "service_name"=>$event->service->name,
                "hire_date"=>$event->hire_date,
                "status"=>$event->status, 
                "budget_used"=>$event->budget_used,     
                "notes"=>$event->notes,
                "event_date"=>$event->event_date,
                "attendance"=>$event->attendance,
                "feedback"=>$event->feedback,
                "completion_date"=>$event->completion_date,
                "organizerName" =>$event->user->name,
                "type"=>$event->type
                
                
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
            "id"=>$event->id,
                "name"=>$event->name,
                "description"=>$event->description,
                "customer_name"=>$event->customer->full_name,
                "location_name"=>$event->location->name,
                "service_name"=>$event->service->name,
                "hire_date"=>$event->hire_date,
                "status"=>$event->status, 
                "budget_used"=>$event->budget_used,   
                "notes"=>$event->notes,
                "event_date"=>$event->event_date,
                "attendance"=>$event->attendance,
                "feedback"=>$event->feedback,
                "completion_date"=>$event->completion_date,
                "organizerName" =>$event->user->name,
                "type"=>$event->type
            
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
    $events = Event::where('type', 'LIKE', '%' . $keyword . '%')->get();
    $list = [];

    foreach ($events as $event) {
        $client = $event->customer; 
        $location = $event->location;
        $service = $event->service; 

        $clientName = $client->full_name;
        $locationName = $location->name;
        $serviceName = $service->name;

        $object = [
            "id" => $event->id,
            "client_name" => $clientName,
            "location_name" => $locationName,
            "service_name"=>$serviceName,
            "date" => $event->event_date,
            "type" => $event->type,
           
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

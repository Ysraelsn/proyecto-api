<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Date;
class DateController extends Controller
{
    public function list(){
        $dates = Date::all();
        $list = [];

        foreach($dates as $date){
            $object = [
                "id"=>$date->id,
                "event_id"=>$date->name,
                "event_date"=>$date->event_date,
                "payment_date"=>$date->payment_date,
                "created_at"=>$date->created_at,
                "updated_at"=>$date->updated_at
                
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
           $date = Date::where('id','=', $id)->first();
        
            $object = [
                "id"=>$date->id,
                "event_id"=>$date->name,
                "event_date"=>$date->event_date,
                "payment_date"=>$date->payment_date,
                "created_at"=>$date->created_at,
                "updated_at"=>$date->updated_at
            ];
                 
        return response()->json($object);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $record = Date::findOrFail($id);
        $record->update($data);

        return response()->json($record, 200);
    }

 
    public function store(Request $request)
    {
        $data = $request->all();

        $record = Date::create($data);

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
        $record = Date::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }
}

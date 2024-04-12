<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function list(){
        $locations = Location::all();
        $list = [];

        foreach($locations as $location){
            $object = [
                "id"=>$location->id,
                "name"=>$location->name,
                "address"=>$location->address,
                "capacity"=>$location->capacity,
                "price"=>$location->price,
                "imageURL"=>$location->imageURL,
                "created_at"=>$location->created_at,
                "updated_at"=>$location->updated_at
                
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
           $location = Location::where('id','=', $id)->first();
        
            $object = [
                "id"=>$location->id,
                "name"=>$location->name,
                "address"=>$location->address,
                "capacity"=>$location->capacity,
                "price"=>$location->price,
                "imageURL"=>$location->imageURL,
                "created_at"=>$location->created_at,
                "updated_at"=>$location->updated_at
            ];
                 
        return response()->json($object);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $record = Location::findOrFail($id);
        $record->update($data);

        return response()->json($record, 200);
    }

 
    public function store(Request $request)
    {
        $data = $request->all();

        $record = Location::create($data);

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
        $record = Location::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }

}

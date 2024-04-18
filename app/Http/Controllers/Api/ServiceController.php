<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list(){
        $services = Service::all();
        $list = [];

        foreach($services as $service){
            $object = [
                "id"=>$service->id,
                "category_name"=>$service->category->name,
                "company_name"=>$service->company->name,
                "company_id"=>$service->company_id,
                "category_id"=>$service->category_id,
                "name"=>$service->name,
                "description"=>$service->description,
                "contact"=>$service->contact,
                "price"=>$service->price,
                "type"=>$service->type,
                "created_at"=>$service->created_at,
                "updated"=>$service->updated_at
                
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
           $service = Service::where('id','=', $id)->first();
        
            $object = [
                "id"=>$service->id,
                "category_name"=>$service->category->name,
                "company_name"=>$service->company->name,
                "company_id"=>$service->company_id,
                "category_id"=>$service->category_id,
                "name"=>$service->name,
                "description"=>$service->description,
                "contact"=>$service->contact,
                "price"=>$service->price,
                "type"=>$service->type,
                "created_at"=>$service->created_at,
                "updated"=>$service->updated_at
            ];
                 
        return response()->json($object);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $record = Service::findOrFail($id);
        $record->update($data);

        return response()->json($record, 200);
    }

 
    public function store(Request $request)
    {
        $data = $request->all();

        $record = Service::create($data);

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
        $record = Service::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }
}

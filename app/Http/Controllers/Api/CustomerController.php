<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list(){
        $customers = Customer::all();
        $list = [];

        foreach($customers as $customer){
            $object = [
                "id"=>$customer->id,
                "first_name"=>$customer->first_name,
                "second_name"=>$customer->second_name,
                "surname"=>$customer->surname,
                "second_surname"=>$customer->second_surname,
                "email"=>$customer->email,
                "phone_number"=>$customer->phone_number,
                "age"=>$customer->age,
                "budget"=>$customer->budget
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
           $customer = Customer::where('id','=', $id)->first();
        
            $object = [
                "id"=>$customer->id,
                "first_name"=>$customer->first_name,
                "second_name"=>$customer->second_name,
                "surname"=>$customer->surname,
                "second_surname"=>$customer->second_surname,
                "email"=>$customer->email,
                "phone_number"=>$customer->phone_number,
                "age"=>$customer->age,
                "budget"=>$customer->budget
            ];
                 
        return response()->json($object);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $record = Customer::findOrFail($id);
        $record->update($data);

        return response()->json($record, 200);
    }

 
    public function store(Request $request)
    {
        $data = $request->all();

        $record = Customer::create($data);

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
        $record = Customer::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }
}

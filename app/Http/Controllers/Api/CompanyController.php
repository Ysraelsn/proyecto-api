<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function list(){
        $companies = Company::all();
        $list = [];

        foreach($companies as $company){
            $object = [
                "id"=>$company->id,
                "name"=>$company->name,
                "address"=>$company->adress,
                "phone"=>$company->phone,
                "email"=>$company->email,
                "website"=>$company->website,
                
                
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
           $company = Company::where('id','=', $id)->first();
        
            $object = [
                "id"=>$company->id,
                "name"=>$company->name,
                "address"=>$company->adress,
                "phone"=>$company->phone,
                "email"=>$company->email,
                "website"=>$company->website,
                
            ];
                 
        return response()->json($object);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $record = Company::findOrFail($id);
        $record->update($data);

        return response()->json($record, 200);
    }

 
    public function store(Request $request)
    {
        $data = $request->all();

        $record = Company::create($data);

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
        $record = Company::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }
}
    


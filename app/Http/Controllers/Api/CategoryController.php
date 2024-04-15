<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list(){
        $categories = Category::all();
        $list = [];

        foreach($categories as $category){
            $object = [
                "id"=>$category->id,
                "name"=>$category->name,
                "description"=>$category->description,
                
                
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
           $category = category::where('id','=', $id)->first();
        
            $object = [
                "id"=>$category->id,
                "name"=>$category->name,
                "description"=>$category->description,
                
                
            ];
                 
        return response()->json($object);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $record = Category::findOrFail($id);
        $record->update($data);

        return response()->json($record, 200);
    }

 
    public function store(Request $request)
    {
        $data = $request->all();

        $record = Category::create($data);

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
        $record = Category::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }
}

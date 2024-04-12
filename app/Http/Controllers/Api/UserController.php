<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function list(){
        $users = User::all();
        $list = [];

        foreach($users as $user){
            $object = [
                "id"=>$user->user_id,
                "name"=>$user->name,
                "email"=>$user->email,
                "email_verified_at"=>$user->email_verified_at,
                "password"=>$user->password,
                "remember_token"=>$user->remember_token,
                "created_at"=>$user->created_at,
                "updated"=>$user->updated_at
                
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
           $user = User::where('id','=', $id)->first();
        
            $object = [
                "id"=>$user->user_id,
                "name"=>$user->name,
                "email"=>$user->email,
                "email_verified_at"=>$user->email_verified_at,
                "password"=>$user->password,
                "remember_token"=>$user->remember_token,
                "created_at"=>$user->created_at,
                "updated"=>$user->updated_at
            ];
                 
        return response()->json($object);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $record = User::findOrFail($id);
        $record->update($data);

        return response()->json($record, 200);
    }

 
    public function store(Request $request)
    {
        $data = $request->all();

        $record = User::create($data);

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
        $record = User::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }
}

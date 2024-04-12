<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function list(){
        $payments = Payment::all();
        $list = [];

        foreach($payments as $payment){
            $object = [
                "id"=>$payment->id,
                "planification_id"=>$payment->planification_id,
                "payment_type"=>$payment->payment_type,
                "payment_date"=>$payment->payment_date,
                "payment_method"=>$payment->payment_method,
                "created_at"=>$payment->created_at,
                "updated_at"=>$payment->updated_at
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
           $payment = Payment::where('id','=', $id)->first();
        
            $object = [
                "id"=>$payment->id,
                "planification_id"=>$payment->planification_id,
                "payment_type"=>$payment->payment_type,
                "payment_date"=>$payment->payment_date,
                "payment_method"=>$payment->payment_method,
                "created_at"=>$payment->created_at,
                "updated_at"=>$payment->updated_at
            ];
                 
        return response()->json($object);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $record = Payment::findOrFail($id);
        $record->update($data);

        return response()->json($record, 200);
    }

 
    public function store(Request $request)
    {
        $data = $request->all();

        $record = Payment::create($data);

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
        $record = Payment::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Planification;

class PlanificationController extends Controller
{
    public function list(){
        $planifications = Planification::all();
        $list = [];

        foreach($planifications as $planification){
            $object = [
                "id"=>$planification->id,
                "event_type"=>$planification->event->event_type,
                "company_name"=>$planification->company->name,
                "hire_date"=>$planification->hire_date,
                "status"=>$planification->status,
                "budget_used"=>$planification->budget_used,
                "notes"=>$planification->notes,
                "start_date"=>$planification->start_date,
                "end_date"=>$planification->end_date,
                "attendance"=>$planification->attendance,
                "feedback"=>$planification->feedback,
                "completion_date"=>$planification->completion_date,
              
            ];
            array_push($list,$object);

        }
        return response()->json($list);
    }
    public function item($id)
{
           $planification = Planification::where('id','=', $id)->first();
        
            $object = [
                "id"=>$planification->id,
                "event_id"=>$planification->event_id,
                "company_id"=>$planification->planification_type,
                "hire_date"=>$planification->planification_date,
                "status"=>$planification->planification_method,
                "budget_used"=>$planification->budget_used,
                "notes"=>$planification->notes,
                "start_date"=>$planification->start_date,
                "end_date"=>$planification->end_date,
                "attendance"=>$planification->attendance,
                "feedback"=>$planification->feedback,
                "completion_date"=>$planification->completion_date,
                "created_at"=>$planification->created_at,
                "updated_at"=>$planification->updated_at
            ];
                 
        return response()->json($object);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $record = Planification::findOrFail($id);
        $record->update($data);

        return response()->json($record, 200);
    }

 
    public function store(Request $request)
    {
        $data = $request->all();

        $record = Planification::create($data);

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
        $record = Planification::findOrFail($id);
        $record->delete();

        return response()->json(null, 204);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Event;
use App\Models\Planification;
use App\Models\Payment;
use App\Models\Date;
use Illuminate\Http\Request;

class TuControlador extends Controller
{
    public function agregarDatos(Request $request)
    {
        // Validar los datos enviados desde el formulario
        $validatedData = $request->validate([
            'customer' => 'required|array',
            'date' => 'required|array',
            'event' => 'required|array',
            'payment' => 'required|array',
            'planifications' => 'required|array',
        ]);

        // Crear un nuevo cliente
        $customer = Customer::create($validatedData['customer']);

        // Crear una nueva fecha
        $date = Date::create(array_merge($validatedData['date'], ['event_id' => $customer->id]));

        // Crear un nuevo evento
        $event = Event::create(array_merge($validatedData['event'], ['customer_id' => $customer->id, 'date_id' => $date->id]));

        // Crear un nuevo pago
        $payment = Payment::create(array_merge($validatedData['payment'], ['event_id' => $event->id]));

        // Crear nuevas planificaciones
        foreach ($validatedData['planifications'] as $planificationData) {
            Planification::create(array_merge($planificationData, ['event_id' => $event->id]));
        }

        return response()->json(['message' => 'Datos agregados correctamente']);
    }
}
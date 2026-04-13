<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = payment::all();
        return response()->json([
            "data"=>$payments,
            "status"=>"success"
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            $valideted = $request->validate([
            'rental_id' => 'required|numeric',
             'amount' => 'required|min:3|max:30',
            'payment_method' => 'required|min:3|max:30',
            'transaction_id' => 'required|min:3|max:30',
            'status' => 'required|enum:pending,completed,failed,refunded',
            'payment_date' => 'required|date',
        ]);
        $car = new payment();
        $car->rental_id = $request->rental_id;
        $car->amount = $request->amount;
        $car->payment_method = $request->payment_method;
        $car->transaction_id = $request->transaction_id;
        $car->status = $request->status;
        $car->payment_date = $request->payment_date;   

        $car->save();
        return response()->json([
            "data"=>$car,
            "status"=>"success"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $payment = payment::find($id);
        if($payment == null){
            return response()->json([
                "message"=>"Pago no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$payment,
            "status"=>"success"
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valideted = $request->validate([
            'rental_id' => 'required|numeric',
             'amount' => 'required|min:3|max:30',
            'payment_method' => 'required|min:3|max:30',
            'transaction_id' => 'required|min:3|max:30',
            'status' => 'required|enum:pending,completed,failed,refunded',
            'payment_date' => 'required|date',
        ]);
        $car = payment::find($id);
        $car->rental_id = $request->rental_id;
        $car->amount = $request->amount;
        $car->payment_method = $request->payment_method;
        $car->transaction_id = $request->transaction_id;
        $car->status = $request->status;
        $car->payment_date = $request->payment_date;   

        $car->save();
        return response()->json([
            "data"=>$car,
            "status"=>"success"
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $payment = payment::find($id);
        if($payment == null){
            return response()->json([
                "error"=>"Pago no encontrado",
                "status"=>"error"
            ],404);
        }
        $payment->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}

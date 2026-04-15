<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rental;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rentals = rental::all();
        return response()->json([
            "data"=>$rentals,
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
            'user_id' => 'required|numeric',
             'car_id' => 'required|numeric',
            'driver_id' => 'required|numeric',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|enum:pending,confirmed,active,completed,canceled',
        ]);
        $car = new rental();
        $car->user_id = $request->user_id;
        $car->car_id = $request->car_id;
        $car->driver_id = $request->driver_id;
        $car->pickup_date = $request->pickup_date;
        $car->return_date = $request->return_date;
        $car->total_amount = $request->total_amount;
        $car->status = $request->status;

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
         $rental = rental::find($id);
        if($rental == null){
            return response()->json([
                "message"=>"no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$rental,
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
            'user_id' => 'required|numeric',
             'car_id' => 'required|numeric',
            'driver_id' => 'required|numeric',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'status' => 'required|enum:pending,confirmed,active,completed,canceled',
        ]);
        $car = rental::find($id);
        $car->user_id = $request->user_id;
        $car->car_id = $request->car_id;
        $car->driver_id = $request->driver_id;
        $car->pickup_date = $request->pickup_date;
        $car->return_date = $request->return_date;
        $car->total_amount = $request->total_amount;
        $car->status = $request->status;

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
         $rental = rental::find($id);
        if($rental == null){
            return response()->json([
                "error"=>"Renta no encontrada",
                "status"=>"error"
            ],404);
        }
        $rental->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
    public function uStatus(Request $request, $id){
        $rental = rental::findOrFail($id);
        $rental->status = $request->status;
        $rental->save();
        return response()->json([
            "data"=>$rental,
            "status"=>"success"
        ],200);
    }
}

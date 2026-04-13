<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
                $cars = car::all();
        return response()->json([
            "data"=>$cars,
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
            'brand_id' => 'required|numeric',
             'model' => 'required|min:3|max:30',
            'year' => 'required|numeric',
            'color' => 'required|min:3|max:30',
            'license_plate' => 'required|min:3|max:30|unique:cars',
            'mileage' => 'required|numeric',
            'lat'=>'required|numeric',
            'lng'=>'required|numeric',
            'is_premium'=>'required|numeric',
            'renta_count'=>'required|numeric',
            'daily_rate'=>'required|numeric',
            'status'=>'required|enum:available,rented,maintenance,retired'
        ]);
        $car = new car();
        $car->brand_id = $request->brand_id;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->license_plate = $request->license_plate;
        $car->mileage = $request->mileage;
        $car->lat = $request->lat;
        $car->lng = $request->lng;
        $car->is_premium = $request->is_premium;
        $car->renta_count = $request->renta_count;
        $car->daily_rate = $request->daily_rate;
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
         $car = car::find($id);
        if($car == null){
            return response()->json([
                "message"=>"Carro no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$car,
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
            'brand_id' => 'required|numeric',
             'model' => 'required|min:3|max:30',
            'year' => 'required|numeric',
            'color' => 'required|min:3|max:30',
            'license_plate' => 'required|min:3|max:30|unique:cars',
            'mileage' => 'required|numeric',
            'lat'=>'required|numeric',
            'lng'=>'required|numeric',
            'is_premium'=>'required|numeric',
            'renta_count'=>'required|numeric',
            'daily_rate'=>'required|numeric',
            'status'=>'required|enum:available,rented,maintenance,retired'
        ]);
        $car = car::find($id);
        $car->brand_id = $request->brand_id;
        $car->model = $request->model;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->license_plate = $request->license_plate;
        $car->mileage = $request->mileage;
        $car->lat = $request->lat;
        $car->lng = $request->lng;
        $car->is_premium = $request->is_premium;
        $car->renta_count = $request->renta_count;
        $car->daily_rate = $request->daily_rate;
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
         $car = car::find($id);
        if($car == null){
            return response()->json([
                "error"=>"Carro no encontrado",
                "status"=>"error"
            ],404);
        }
        $car->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
    
}

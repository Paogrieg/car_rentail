<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\driver;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $drivers = driver::all();
        return response()->json([
            "data"=>$drivers,
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
            'license_number' => 'required|min:3|max:30|unique:drivers',
            'license_img' => 'required|min:3|max:200',
        ]);
        $car = new driver();
        $car->user_id = $request->user_id;
        $car->license_number = $request->license_number;
        $car->license_img = $request->license_img;

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
         $driver = driver::find($id);
        if($driver == null){
            return response()->json([
                "message"=>"Conductor no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$driver,
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
            'license_number' => 'required|min:3|max:30|unique:drivers',
            'license_img' => 'required|min:3|max:200',
        ]);
        $car = driver::find($id);
        $car->user_id = $request->user_id;
        $car->license_number = $request->license_number;
        $car->license_img = $request->license_img;

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
         $driver = driver::find($id);
        if($driver == null){
            return response()->json([
                "error"=>"Conductor no encontrado",
                "status"=>"error"
            ],404);
        }
        $driver->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}

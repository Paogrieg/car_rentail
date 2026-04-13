<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loyalty_level;

class loyalty_levelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loyalty_levels = loyalty_level::all();
        return response()->json([
            "data"=>$loyalty_levels,
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
            'name' => 'required|min:3|max:100',
            'min_points' => 'required|numeric',
            'discount_percentage' => 'required|numeric',
            'free_extra_hours' => 'required|numeric',
        ]);
        $car = new loyalty_level();
        $car->name = $request->name;
        $car->min_points = $request->min_points;
        $car->discount_percentage = $request->discount_percentage;
        $car->free_extra_hours = $request->free_extra_hours;

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
         $loyalty_level = loyalty_level::find($id);
        if($loyalty_level == null){
            return response()->json([
                "message"=>"Nivel de lealtad no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$loyalty_level,
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
            'name' => 'required|min:3|max:100',
            'min_points' => 'required|numeric',
            'discount_percentage' => 'required|numeric',
            'free_extra_hours' => 'required|numeric',
        ]);
        $car = loyalty_level::find($id);
        $car->name = $request->name;
        $car->min_points = $request->min_points;
        $car->discount_percentage = $request->discount_percentage;
        $car->free_extra_hours = $request->free_extra_hours;

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
         $loyalty_level = loyalty_level::find($id);
        if($loyalty_level == null){
            return response()->json([
                "error"=>"Nivel de lealtad no encontrado",
                "status"=>"error"
            ],404);
        }
        $loyalty_level->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brand;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::all();
        return response()->json([
            "data"=>$brands,
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
            'img' => 'required|min:3|max:200',
        ]);
        $car = new brand();
        $car->name = $request->name;
        $car->img = $request->img;

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
         $brand = brand::find($id);
        if($brand == null){
            return response()->json([
                "message"=>"Marca no encontrada",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$brand,
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
            'img' => 'required|min:3|max:200',
        ]);
        $car = brand::find($id);
        $car->name = $request->name;
        $car->img = $request->img;

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
         $brand = brand::find($id);
        if($brand == null){
            return response()->json([
                "error"=>"Marca no encontrada",
                "status"=>"error"
            ],404);
        }
        $brand->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}

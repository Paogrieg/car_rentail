<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\brand;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            'name' => 'Dodge',
            'img' => 'default.png',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        
        $dato = new brand();
        $dato->name = 'Chevrolet';
        $dato->img = 'default.png';
        $dato->save();
    }
}


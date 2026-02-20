<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'brand_id' => '1',
            'model' => 'Challenger',
            'year' => '2020',
            'color' => 'Negro',
            'license_plate' => 'ABC-1234',
            'mileage' => '15000',
            'lat' => '-34.6037',
            'lng' => '-58.3816',
            'is_premium' => '0',
            'rental_count' => '200',
            'daily_rate' => '50',
            'status' => 'available',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $dato = new car();
        $dato->brand_id = 2;
        $dato->model = 'Camaro';
        $dato->year = 2021;
        $dato->color = 'Blanco';
        $dato->license_plate = 'XYZ-5678';
        $dato->mileage = 10000;
        $dato->lat = '-34.6037';
        $dato->lng = '-58.3816';
        $dato->is_premium = 1;
        $dato->rental_count = 150;
        $dato->daily_rate = 75;
        $dato->status = 'available';
        $dato->save();
    }
}

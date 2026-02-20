<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\rental;

class RentalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rentals')->insert([
            'user_id' => '1',
            'car_id' => '1',
            'driver_id' => '1',
            'pickup_date' => '2026-02-13',
            'return_date' => '2026-02-18',
            'total_amount' => '500',
            'status' => 'completed',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $dato= new rental();
        $dato->user_id='2';
        $dato->car_id='2';
        $dato->driver_id='2';
        $dato->pickup_date='2026-03-01';
        $dato->return_date='2026-03-05';
        $dato->total_amount='600';
        $dato->status='completed';
        $dato->save();
    }
}

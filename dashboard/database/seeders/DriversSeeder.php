<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\driver;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            'user_id' => '1',
            'license_number' => '12ABCT56789',
            'license_img' => 'default.png',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $dato= new driver();
        $dato->user_id='2';
        $dato->license_number='34DEFG56789';
        $dato->license_img='default.png';
        $dato->save();
    }
}

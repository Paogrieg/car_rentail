<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\loyalty_level;

class Loyalty_levelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loyalty_levels')->insert([
            'name' => 'Bronze',
            'min_points' => '10',
            'discount_percentage' => '15',
            'free_extra_hours' => '2',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $dato= new loyalty_level();
        $dato->name='Silver';
        $dato->min_points='100';
        $dato->discount_percentage='20';
        $dato->free_extra_hours='4';
        $dato->save();
    }
}

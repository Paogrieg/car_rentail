<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Paola Griego',
            'email' => 'paola.griego@gmail.com',
            'password' => Hash::make('123456'),
            'img' => 'default.png',
            'loyalty_points' => 20,
            'loyalty_level_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $dato= new User();
        $dato->name='Reyna Griego';
        $dato->email='reyna.griego@gmail.com';
        $dato->password=Hash::make('123456');
        $dato->img='default.png';
        $dato->loyalty_points=80;
        $dato->loyalty_level_id=2;
        $dato->save();
    }
}

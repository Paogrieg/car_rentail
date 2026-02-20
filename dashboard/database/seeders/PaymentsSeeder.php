<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\payment;

class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            'rental_id' => '1',
            'amount' => '500',
            'payment_method' => 'Credit Card',
            'transaction_id' => '1',
            'status' => 'completed',
            'payment_date' => '2026-02-13',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $dato= new payment();
        $dato->rental_id='2';
        $dato->amount='600';
        $dato->payment_method='PayPal';
        $dato->transaction_id='2';
        $dato->status='completed';
        $dato->payment_date='2026-03-01';
        $dato->save();
    }
}

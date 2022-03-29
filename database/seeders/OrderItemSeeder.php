<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_items')->insert([
            [
                'Id' => '1',
                'orderId' => '1',
                'productId' => '4',
                'unitPrice' => '500',
                'quantity' => '2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id' => '2',
                'orderId' => '2',
                'productId' => '3',
                'unitPrice' => '300',
                'quantity' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id' => '3',
                'orderId' => '2',
                'productId' => '2',
                'unitPrice' => '300',
                'quantity' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

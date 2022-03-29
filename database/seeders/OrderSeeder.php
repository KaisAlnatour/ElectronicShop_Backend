<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            [
                'Id' => '1',
                'customerId' => '1',
                'orderDate' => Carbon::createFromFormat(config('app.dateFormat'),'5-7-2020')
                    ->format('Y/m/d'),
                'orderNumber' => '5',
                'TotalAmount' => '1000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id' => '2',
                'customerId' => '2',
                'orderDate' => Carbon::createFromFormat(config('app.dateFormat'), '14-8-2020')
                    ->format('Y/m/d'),
                'orderNumber' => '8',
                'TotalAmount' => '600',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

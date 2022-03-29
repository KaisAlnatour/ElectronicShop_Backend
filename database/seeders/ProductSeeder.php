<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'Id' => '1',
                'supplierId' => '1',
                'productName' => 'Chai',
                'unitPrice' => '150',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id' => '2',
                'supplierId' => '1',
                'productName' => 'Rice',
                'unitPrice' => '300',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id' => '3',
                'supplierId' => '2',
                'productName' => 'Sugar',
                'unitPrice' => '250',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id' => '4',
                'supplierId' => '3',
                'productName' => 'Biscuit',
                'unitPrice' => '500',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

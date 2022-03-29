<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'Id' => '1',
                'firstName' => 'Mohamad',
                'lastName' => 'Zid',
                'city' => 'Beirut',
                'country' => 'Lebanon',
                'phone' => '02015485546',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id' => '2',
                'firstName' => 'Samer',
                'lastName' => 'Salam',
                'city' => 'Damascus',
                'country' => 'Syria',
                'phone' => '555456687',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

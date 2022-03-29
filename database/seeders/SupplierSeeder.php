<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'Id' => '1',
                'companyName' => 'SwafTech',
                'contactName' => 'Ahmad',
                'city' => 'Damascus',
                'country' => 'Syria',
                'phone' => '33324587',
                'fax' => '33324588',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id' => '2',
                'companyName' => 'Durra',
                'contactName' => 'سعيد',
                'city' => 'دمشق',
                'country' => 'سوريا',
                'phone' => '0113855454',
                'fax' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id' => '3',
                'companyName' => 'كهربائيات المصري',
                'contactName' => 'محمود',
                'city' => 'حلب',
                'country' => 'سوريا',
                'phone' => '',
                'fax' => '',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}

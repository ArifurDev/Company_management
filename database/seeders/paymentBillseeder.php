<?php

namespace Database\Seeders;

use App\Models\Billdate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class paymentBillseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //payment bill bydefult
         Billdate::create([
            'house_rent' => '14',
            'gard_bill' => null,
            'electricity_bill' => null,
            'sewerage_bill' => '14',
            'water_bill' => null,
            'fewa_bill' => null,
            'wifi_bill' => null,
            'a' => null,
            'b' => null,
            'c' => null,
            'empolyee' => null,
            'created_at' => now(),
        ]);
    }
}

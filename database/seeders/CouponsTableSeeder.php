<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::create([
            'code' => 'ABC123',
            'type' => 'percent',
            'percent_off' => 20,
        ]);

        Coupon::create([
            'code' => 'CAPTHE456',
            'type' => 'percent',
            'percent_off' => 10,
        ]);

        Coupon::create([
            'code' => 'DEFG972',
            'type' => 'percent',
            'percent_off' => 30,
        ]);
    }
}

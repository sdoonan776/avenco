<?php

use App\Models\Product;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 100)->create();

        $path = 'database/data.sql';
        DB::unprepared(file_get_contents($path));

        // $factory->define(Product::class, function (Faker $faker) {
        //     for ($i = 0; $i < 483; $i++) {
        //         return [
        //            'product_image' => $faker->imageUrl(800, 600, 'fashion')    
        //         ];   
        //     }
        // });
    }
}

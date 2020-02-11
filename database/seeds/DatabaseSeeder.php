<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    // private $images = [
    //     'img-1.jpg',
    //     'img-2.jpg',
    //     'img-3.jpg',
    //     'img-4.jpg',
    //     'img-5.jpg',
    //     'img-6.jpg',
    //     'img-7.jpg',
    //     'img-8.jpg',
    //     'img-9.jpg',
    //     'img-10.jpg',
    //     'img-11.jpg',
    //     'img-12.jpg',
    //     'img-13.jpg',
    //     'img-14.jpg',
    //     'img-15.jpg',
    // ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 100)->create();
        factory(Product::class, 300)->create();
        DB::unprepared(file_get_contents('database/data.sql'));
    }        
}


<?php

use App\Models\Product;
use App\Models\User;
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
        factory(Product::class, 300)->create();
        // $this->call(CategorySeeder::class);
        DB::unprepared(file_get_contents('database/data.sql'));
    }        
}

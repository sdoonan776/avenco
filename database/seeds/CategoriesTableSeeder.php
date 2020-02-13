<?php

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$now = Carbon::now()->toDateTimeString();
        
        Category::insert([
        	['name' => 'Dresses', 'slug' => 'dresses', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Bags', 'slug' => 'bags', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Shoes', 'slug' => 'shoes', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Hats', 'slug' => 'hats', 'created_at' => $now, 'updated_at' => $now],
        	['name' => 'Accessories', 'slug' => 'accessories', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

<?php

use App\Models\Product;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $name = $faker->words(2, true);
        $slug = Str::slug($name);

        for ($i = 1; $i <= 15; $i++) {
        	Product::insert([
                'category_id' => $faker->numberBetween(1, 5),
                'name' => $name,
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(10, 100),
                'quantity' => $faker->numberBetween(0, 30),
		        'product_image' => 'resources/assets/img/products/img-'.$i.'.jpg',
        	]);
        }
    }
}

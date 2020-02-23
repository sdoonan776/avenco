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

        for ($i = 1; $i <= 15; $i++) {
            $name = $faker->words(2, true);
            $slug = Str::slug($name);

        	Product::insert([
                'category_id' => $faker->numberBetween(1, 5),
                'name' => ucwords($name),
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
		        'product_image' => 'resources/assets/img/products/img-'.$i.'.jpg',
        	]);
        }

        for ($i = 1; $i <= 6; $i++) {
            $name = $faker->words(2, true);
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 1,
                'name' => ucwords($name),
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'resources/assets/img/products/dresses_'.$i.'.jpg',
            ]);
        }

        for ($i = 1; $i <= 6; $i++) {
            $name = $faker->words(2, true);
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 2,
                'name' => ucwords($name),
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'resources/assets/img/products/hats_'.$i.'.jpg',
            ]);
        }

        for ($i = 1; $i <= 6; $i++) {
            $name = $faker->words(2, true);
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 3,
                'name' => ucwords($name),
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'resources/assets/img/products/shoes_'.$i.'.jpg',
            ]);
        }

        for ($i = 1; $i <= 6; $i++) {
            $name = $faker->words(2, true);
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 4,
                'name' => ucwords($name),
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'resources/assets/img/products/accessories_'.$i.'.jpg',
            ]);
        }

        for ($i = 1; $i <= 6; $i++) {
            $name = $faker->words(2, true);
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 5,
                'name' => ucwords($name),
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'resources/assets/img/products/bags_'.$i.'.jpg',
            ]);
        }

    }
}

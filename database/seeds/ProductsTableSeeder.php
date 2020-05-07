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

        for ($i = 1; $i <= 10; $i++) {
            $name = 'dress '.$i;
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 1,
                'name' => $name,
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'img/dresses_'.$i.'.jpg',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            $name = 'bag '.$i;
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 2,
                'name' => $name,
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'resources/assets/img/products/bags_'.$i.'.jpg',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            $name = 'shoe '.$i;
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 3,
                'name' => $name,
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'resources/assets/img/products/shoes_'.$i.'.jpg',
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            $name = 'hat '.$i;
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 4,
                'name' => $name,
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'resources/assets/img/products/hats_'.$i.'.jpg',
            ]);
        }

        for ($i = 1; $i <= 9; $i++) {
            $name = 'accessory '.$i;
            $slug = Str::slug($name);

            Product::insert([
                'category_id' => 5,
                'name' => $name,
                'slug' => $slug,
                'description' => $faker->paragraphs(3, true),
                'price' => $faker->numberBetween(1000, 10000),
                'quantity' => $faker->numberBetween(0, 30),
                'product_image' => 'resources/assets/img/products/accessories_'.$i.'.jpg',
            ]);
        }

    }
}

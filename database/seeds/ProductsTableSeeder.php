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
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
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
                'product_image' => 'img/bags_'.$i.'.jpg',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
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
                'product_image' => 'img/shoes_'.$i.'.jpg',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
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
                'product_image' => 'img/hats_'.$i.'.jpg',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
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
                'product_image' => 'img/accessories_'.$i.'.jpg',
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime()
            ]);
        }

    }
}

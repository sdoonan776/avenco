<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
    	'category_id' => $faker->numberBetween(1, 5),
        'name' => $faker->words(2, true),
        'description' => $faker->paragraphs(15, true),
        'price' => $faker->numberBetween(10, 100),
        'quantity' => $faker->numberBetween(0, 30),
        'product_image' => $faker->imageUrl('abstract'),
    ];
});

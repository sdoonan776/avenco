<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => factory(\App\Category::class),
        'name' => $faker->name,
        'quantity' => $faker->randomNumber(),
        'description' => $faker->text,
        'order_placed' => $faker->,
        'order_dispached' => $faker->,
    ];
});

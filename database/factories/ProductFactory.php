<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
	static $images = [ 
		'img-1.jpg',
        'img-2.jpg',
        'img-3.jpg',
        'img-4.jpg',
        'img-5.jpg',
        'img-6.jpg',
        'img-7.jpg',
        'img-8.jpg',
        'img-9.jpg',
        'img-10.jpg',
        'img-11.jpg',
        'img-12.jpg',
        'img-13.jpg',
        'img-14.jpg',
        'img-15.jpg'
	];

	foreach ($images as $i => $image) {
		$product_image = $image;
	}

    return [
    	'category_id' => $faker->numberBetween(1, 5),
        'name' => $faker->words(2, true),
        'description' => $faker->paragraphs(7, true),
        'price' => $faker->numberBetween(10, 100),
        'quantity' => $faker->numberBetween(0, 30),
        'product_image' => $product_image,
    ];
});

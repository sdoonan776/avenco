<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
        'full_name' => $faker->word,
        'email' => $faker->safeEmail,
        'username' => $faker->userName,
        'password' => $faker->password,
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
	static $password, $api_token;

    return [
        'full_name' => $faker->name,
        'email' => $faker->safeEmail,
        'username' => $faker->userName,
        'password' => $password ?: $password = bcrypt('password'),
        'api_token' => Str::random(60),
        'remember_token' => Str::random(10),
        'email_verified_at' => now(),
        'api_token' => Str::random(60),
    ];
});

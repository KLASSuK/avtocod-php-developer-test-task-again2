<?php

use App\Models\User;

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(User::class, function (Faker $faker) {
    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => Hash::make('secret'),
        'remember_token' => Str::random(10),

    ];
});

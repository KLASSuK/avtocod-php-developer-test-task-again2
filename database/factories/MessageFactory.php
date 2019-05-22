<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Message;
use Carbon\Carbon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

/** @var Factory $factory */
$factory->define(Message::class, function (Faker $faker) {
    $users = \App\Models\User::all()->shuffle();

    return [
        'body'     => $faker->sentence,
        'id_owner' => $users->first()->id,
    ];
});

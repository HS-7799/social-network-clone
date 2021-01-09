<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'from_id' => rand(1,52),
        'to_id' => rand(1,52),
        'content' => $faker->sentence
    ];
});

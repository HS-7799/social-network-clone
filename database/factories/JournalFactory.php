<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Journal;
use App\User;
use Faker\Generator as Faker;

$factory->define(Journal::class, function (Faker $faker) {
    return [
        'user_id' => Factory(User::class)->create()
    ];
});

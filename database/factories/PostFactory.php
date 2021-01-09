<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use App\Journal;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => Factory(User::class)->create(),
        'journal_id' => Factory(Journal::class)->create(),
        'body' => $faker->sentence
    ];
});

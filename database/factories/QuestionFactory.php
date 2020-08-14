<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use App\User;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'description' => $faker->paragraph(rand(10,25)),
        'user_id' => User::pluck('id')->random()
    ];
});

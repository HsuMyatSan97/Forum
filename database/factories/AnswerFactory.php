<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use App\Question;
use App\User;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
             
             'description' => $faker->paragraph(rand(10,25)),
             'user_id' => User::pluck('id')->random(),
             'question_id' =>Question::pluck('id')->random()
    
    ];
});

<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'cover' => $faker->imageUrl(),
        'content' => $faker->realText(),
        'is_top' => $faker->randomElement([0, 1]),
        'is_hidden' => $faker->randomElement([0, 1]),
        'view' => $faker->randomDigit,
        'comment' => $faker->randomDigit,
    ];
});

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

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'article_id' => $faker->numberBetween(1,10000),
        'content' => $faker->realText(50),
        'name' => $faker->name,
        'email' => $faker->email,
        'ip' => $faker->ipv4,
        'city' => $faker->city,
    ];
});

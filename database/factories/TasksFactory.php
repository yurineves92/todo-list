<?php

use Faker\Generator as Faker;

$factory->define(App\Tasks::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->name,
        'started' => date("Y-m-".rand(1, 5)),
        'ended' => date("Y-m-".rand(10, 29)),
        'status' => rand(0, 1),
        'category_id' => rand(1, 5),
        'user_id' => 1,
    ];
});

<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Application::class, function (Faker $faker) {
    return [
        'user_id'  => function () {
            return factory(\App\Models\User::class)->create()->id;
        },
        'event_id' => function () {
            return factory(\App\Models\Event::class)->create()->id;
        },
        'status'   => $faker->randomElements(['processing', 'on-hold', 'accepted', 'rejected', 'withdrawn']),
    ];
});

<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Event::class, function (Faker $faker) {
    return [
        'name'                => $faker->sentence,
        'description'         => $faker->realText(),
        'location'            => $faker->address,
        'start_at'            => $faker->date(),
        'end_at'              => $faker->date(),
        'start_time'          => $faker->time(),
        'end_time'            => $faker->time(),
        'rewards'             => implode(', ',$faker->sentences()),
        'count_male'          => $faker->randomDigit,
        'count_female'        => $faker->randomDigit,
        'registration_status' => $faker->randomElement(['open', 'closed']),
        'published_at'        => $faker->dateTime,
    ];
});

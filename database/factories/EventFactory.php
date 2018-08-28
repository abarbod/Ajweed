<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Event::class, function (Faker $faker) {

    $possibleRewards = [
        'شهادة',
        'شهادة مباشرة',
        'مكافأة مالية',
        'رحلة سفر ( للمتميز الأول فقط )',
        'رحلة طيران',
        'وجبة مجانية',
    ];

    return [
        'name'                => $faker->eventName,
        'description'         => $faker->realText(),
        'location'            => $faker->address,
        'start_at'            => $startAt = $faker->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d'),
        'end_at'              => $faker->dateTimeInInterval($startAt, '+3 days')->format('Y-m-d'),
        'start_time'          => $startTime = \Carbon\Carbon::createFromFormat('H:m', $faker->time('H:m')),
        'end_time'            => $startTime->copy()->addHours(rand(1, 6)),
        'rewards'             => implode(', ', $faker->randomElements($possibleRewards, rand(2, 5))),
        'count_male'          => round($faker->numberBetween(0, 50) / 5) * 5, // 0, 5, 10, 15, 20 , 25..50
        'count_female'        => round($faker->numberBetween(0, 50) / 5) * 5,
        'registration_status' => $faker->randomElement(['open', 'closed']),
        'published_at'        => $faker->optional(0.75)->dateTimeThisYear,
    ];
});

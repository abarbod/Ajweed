<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Profile::class, function (Faker $faker) {

    $academicDegrees = [
        'ثانوي'     => 'ثانوي',
        'دبلوم'     => 'دبلوم',
        'بكالوريوس' => 'بكالوريوس',
        'ماجستير'   => 'ماجستير',
        'دكتوراة'   => 'دكتوراة',
    ];

    $occupations = [
        'طالب'  => 'طالب',
        'خريج'  => 'خريج',
        'موظف'  => 'موظف',
        'متسبب' => 'متسبب',
    ];

    $skills = [
        'Public Relations' => __('Public Relations'),
        'Marketing'        => __('Marketing'),
        'editing'          => __('Editing'),
        'Communication'    => __('Communication'),
        'Presentation'     => __('Planning'),
        'MS Office'        => __('MS Office'),
        'Design'           => __('Design'),
        'Graphics'         => __('Graphics'),
        'Motion graphics'  => __('Motion graphics'),
        'Photographer'     => __('Photographer'),
        'Draw'             => __('Draw'),
        'video_filming'    => __('Video filming'),
    ];

    $typingSpeeds = [
        'ممتاز 90 - 100'   => 'ممتاز 90 - 100',
        'جيد جداً 80 - 90' => 'جيد جداً 80 - 90',
        'جيد 70 - 80'      => 'جيد 70 - 80',
        'مقبول 60 - 70'    => 'مقبول 60 - 70',
        'غير متمكن'        => 'غير متمكن',
    ];

    $languagesList = [
        'العربية'    => 'العربية',
        'الانجليزية' => 'الانجليزية',
        'الفرنسية'   => 'الفرنسية',
        'الاسبانية'  => 'الاسبانية',
        'الألمانية'  => 'الألمانية',
        'التركية'    => 'التركية',
    ];

    return [
        'user_id' => function () {
            return factory(\App\Models\User::class)->create()->id;
        },
        'birth_date'      => $faker->dateTimeBetween('-60 years', '-13 years'),
        'gender'          => $faker->randomElement(['male', 'female']),
        'city'            => $faker->city,
        'academic_degree' => $faker->randomElement($academicDegrees),
        'occupation'      => $faker->randomElement($occupations),
        'preferred_times' => $faker->randomElement(['morning', 'evening']),
        'languages'       => implode(',', $faker->randomElements($languagesList, rand(1, count($languagesList) - 1))),
        'typing_speed'    => $faker->randomElement($typingSpeeds),
        'skills'          => implode(',', $faker->randomElements($skills, rand(1, count($skills) - 1))),
        'experiences'     => $faker->sentences(3, true),
        'twitter'         => $faker->optional(0.2)->userName, // 20% chance will get a username.
        'instegram'       => $faker->optional(0.2)->userName,
    ];
});

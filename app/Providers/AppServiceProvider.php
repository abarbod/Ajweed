<?php

namespace App\Providers;

use Carbon\Carbon;
use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Set Arabic locale for Carbon and Faker.
        Carbon::setLocale('ar');
        $this->app->singleton(Generator::class, function () {

            $faker = Factory::create('ar_SA');

            $eventNameProvider = new \EventNameProvider($faker);
            $faker->addProvider($eventNameProvider);

            return $faker;
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

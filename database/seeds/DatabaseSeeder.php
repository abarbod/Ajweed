<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $attributes = [
            'email'    => 'admin@example.com',
            'username' => 'admin',
        ];

        // Create an admin user for development purposes.
        \App\Models\User::query()->updateOrCreate($attributes,
            factory(\App\Models\User::class)->raw($attributes));

        $this->call(EventsTableSeeder::class);
    }
}

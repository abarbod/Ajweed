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

        // Create an admin user for development purposes.
        \App\Models\User::query()->updateOrCreate(['email' => 'admin@example.com'],
            factory(\App\Models\User::class)->raw([
                'email' => 'admin@example.com',
            ]));

        $this->call(EventsTableSeeder::class);
    }
}

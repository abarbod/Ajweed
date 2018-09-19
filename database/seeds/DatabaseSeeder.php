<?php

use App\Models\Profile;
use App\Models\User;
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

        // Example user to use during development
        $user = factory(User::class)->create(['email' => 'user@example.com', 'username' => 'user']);
        factory(Profile::class)->create(['user_id' => $user->id]);

        $this->call(UsersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(ApplicationTableSeeder::class);
    }
}

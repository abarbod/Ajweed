<?php

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;

class ApplicationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @var \Illuminate\Database\Eloquent\Collection $events
     * @var \Illuminate\Database\Eloquent\Collection $users
     *
     * @return void
     */
    public function run()
    {
        // We don't want events to be fired when creating applications.
        \Illuminate\Support\Facades\Event::fake();

        $users = User::all();
        $events = Event::all();

        // We want only events open for registration.
        $events->filter(function (Event $event) {
            return $event->registration_status === 'open';
        })->each(function (Event $event) use ($users) {
            // pick random users to apply for this event.
            $users->random(rand(0, 30))
                  ->each(function (User $user) use ($event) {

                      if ($user->isAdmin()) {
                          return;
                      }

                      $event->applyBy($user);
                  });
        });
    }
}

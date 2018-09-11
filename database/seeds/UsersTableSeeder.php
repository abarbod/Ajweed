<?php

use App\Models\Profile;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = 0;
        // creating a profile will create a user :)
        for ($i = 0; $i < 100; $i++) {
            try {
                factory(Profile::class)->create();
                $count++;
            } catch (QueryException $exception) {
//                $this->command->warn($i . ' Could not create a user, probably duplicate entry for username, mobile or official id.');
            }
        }

        $this->command->info('Created ' . $count . ' users out of 100 attempted.');
    }
}

<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(100)->create();

        $events = Event::all();
        $groups = Group::all();
        User::all()->each(function ($user) use ($events, $groups) {
            $user->events()->attach(
                $events->random(rand(1, 5))->pluck('id')->toArray()
            );
            $user->groups()->attach(
                $groups->random(rand(1, 2))->pluck('id')->toArray()
            );
        });
    }
}

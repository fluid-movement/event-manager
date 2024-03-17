<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = \App\Models\Event::all();
        $faker = \Faker\Factory::create();
        $groups = \App\Models\Group::all();
        $countries = ['Belgium', 'Germany', 'United Kingdom', 'France', 'Poland', 'Italy', 'United States', 'Canada'];
        $cities = ['Antwerp', 'Berlin', 'Brighton', 'Paris', 'Warsaw', 'Rome', 'New York', 'Seattle', 'Durham', 'Jacksonville'];
        foreach ($events as $event) {
            if (!$event->description) {
                $event->description = $faker->paragraphs(3, true);
            }

            if (!$event->group_id) {
                $event->group_id = $groups->random()->id;
            }

            if (!$event->country) {
                $event->country = $countries[array_rand($countries)];
            }

            if (!$event->city) {
                $event->city = $cities[array_rand($cities)];
            }

            $event->save();
        }
    }
}

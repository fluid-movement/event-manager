<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $events = ['Paganello', 'FPA World Championships', 'European Championships',
            '1234 Berlin Hat', 'The Jam Session', 'Munich Mash', 'Beljam', 'Rose Bowl', 'Frisbeer Cup', 'Summit & Sea',
            'Cranbury Jam', 'Anzio Jam'];
        $date = $this->faker->dateTimeBetween('now', '+8 month');
        $days = rand(2, 5);
        $name = $events[array_rand($events)];
        return [
            'name' => $name,
            'slug' => \Str::slug($name),
            'description' => $this->faker->text,
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'start' => $date,
            'end' => $date->modify("+$days days"),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->unique()->sentence(3);
        return [
            'name' => $name,
            'slug' => \Str::slug($name),
            'description' => $this->faker->text,
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
        ];
    }
}

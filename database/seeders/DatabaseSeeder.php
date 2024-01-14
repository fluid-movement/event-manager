<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Group::factory(10)->create();
        $this->call([
            UserSeeder::class,
            EventSeeder::class,
            AttendeeSeeder::class,
        ]);
        User::factory()->create(
            [
                'name' => 'John Doe',
                'email' => 'test@example.com'
            ]
        );
    }
}

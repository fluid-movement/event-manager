<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Artisan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artisan::call('migrate:fresh');
        Artisan::call('app:import-data');
        $this->call([
            GroupSeeder::class,
            EventSeeder::class,
            UserSeeder::class,
        ]);
    }
}

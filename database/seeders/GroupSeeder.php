<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = ['Beljammers', 'Berlin Jammers', 'Brighton Pirates', 'Spincollectif', 'Warsaw Jammers',
            'Alpenbrise Munich', 'Seattle Rainjammers', 'New York Sheep Meadow Jammers', 'Durham Jammers',
            'Jacksonville Jammers', 'Rome Jammers'];
        foreach ($groups as $name) {
            Group::factory()->create([
                'name' => $name,
                'slug' => \Str::slug($name),
            ]);
        }
    }
}

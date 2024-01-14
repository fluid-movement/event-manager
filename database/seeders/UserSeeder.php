<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $groups = Group::all();
        foreach (range(1, 200) as $i) {
            $group = $groups->random();
            User::factory()->create([
                'group_id' => $group->id,
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserTaskList;

class UserTaskListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 10 users
        User::factory(10)->create()->each(function ($user) {
            // For each user, create 5 tasks
            UserTaskList::factory(5)->create([
                'user_id' => $user->id,
            ]);
        });
    }
}

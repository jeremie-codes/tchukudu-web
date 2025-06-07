<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a broadcaster user
        User::create([
            'name' => 'Broadcaster User',
            'email' => 'broadcaster@example.com',
            'password' => Hash::make('password'),
            'role' => 'broadcaster',
            'email_verified_at' => now(),
        ]);

        // Create a spectator user
        User::create([
            'name' => 'Spectator User',
            'email' => 'spectator@example.com',
            'password' => Hash::make('password'),
            'role' => 'spectator',
            'email_verified_at' => now(),
        ]);

        // Create additional users
        User::factory(8)->create();
    }
}
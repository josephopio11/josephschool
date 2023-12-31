<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Joseph Opio',
            'email' => 'hi@josephopio.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => null,
        ]);
    }
}

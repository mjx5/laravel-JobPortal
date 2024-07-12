<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::factory()->create([
            'first_name' => 'Test User',
            'last_name' => 'User',
            'email' => 'test@example.com',
            'password' => '12345678'
        ]);

        $this->call(JobSeeder::class);
    }
}

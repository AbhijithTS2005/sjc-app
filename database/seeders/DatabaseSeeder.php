<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Seed user accounts (admin + department manager)
        $this->call(\Database\Seeders\UserSeeder::class);

        // Seed some sample faculty records
        $this->call(\Database\Seeders\FacultySeeder::class);

        // Seed sample events
        $this->call(\Database\Seeders\EventSeeder::class);
    }
}

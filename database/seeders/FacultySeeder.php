<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Faculty;

class FacultySeeder extends Seeder
{
    public function run()
    {
        // Create a few sample faculties for each department
        Faculty::factory()->count(4)->create(['department' => 'commerce']);
        Faculty::factory()->count(3)->create(['department' => 'chemistry']);
        Faculty::factory()->count(3)->create(['department' => 'economics']);
        Faculty::factory()->count(3)->create(['department' => 'english']);
        Faculty::factory()->count(3)->create(['department' => 'managementstudies']);
        Faculty::factory()->count(3)->create(['department' => 'socialwork']);
    }
}

<?php

namespace Database\Factories;

use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacultyFactory extends Factory
{
    protected $model = Faculty::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'degree' => $this->faker->randomElement(['BCommerce','BMS','BA','MCommerce','MSocialWork','PhD','MPhil']),
            'department' => $this->faker->randomElement(['commerce', 'managementstudies', 'english', 'socialwork', 'chemistry', 'physics', 'economics','mathematics','datascience']),
            'masters' => $this->faker->randomElement(['MCom','MSc','MA', null]),
            'experience_years' => $this->faker->numberBetween(0,30),
            'designation' => $this->faker->randomElement(['Assistant Professor','Associate Professor','Professor']),
            'qualification' => $this->faker->sentence(6),
            'area_of_interest' => $this->faker->words(3, true),
            'teaching_experience' => $this->faker->numberBetween(1,20) . ' years',
            'industrial_experience' => $this->faker->numberBetween(0,15) . ' years',
            'vidwan_id' => null,
            'orcid_id' => null,
            'scopus_id' => null,
            'google_scholar_id' => null,
            'photo_path' => 'faculty_default.png',
        ];
    }
}

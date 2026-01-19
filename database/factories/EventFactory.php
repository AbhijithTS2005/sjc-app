<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['academic', 'sports', 'cultural', 'placement', 'social'];

        return [
            'title' => $this->faker->sentence(3),
            'date' => $this->faker->dateTimeBetween('-3 years', '+6 months'),
            'description' => $this->faker->sentence(10),
            'content' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->imageUrl(600, 400),
            'type' => $this->faker->randomElement($types),
            'status' => 'approved',
        ];
    }
}

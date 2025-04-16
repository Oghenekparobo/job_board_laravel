<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'description' => $this->faker->paragraph(5),
            'salary' => $this->faker->numberBetween(30000, 120000),
            'location' => $this->faker->city(),
            'category' => $this->faker->randomElement(Job::$categories),
            'experience' => $this->faker->randomElement(['entry', 'intermediate', 'senior']),
          
        ];
    }
}

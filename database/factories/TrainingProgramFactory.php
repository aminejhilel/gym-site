<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\TrainingProgram;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TrainingProgram>
 */
class TrainingProgramFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Strength Builder', 'Fat Burner', 'Muscle Mass', 'Endurance Pro', 'Beginner Basics', 'HIIT Express', 'Powerlifting']),
            'description' => fake()->paragraph(),
            'coach_id' => Coach::factory(),
            'duration_weeks' => fake()->randomElement([4, 6, 8, 12]),
            'level' => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
            'is_active' => fake()->boolean(80),
        ];
    }
}

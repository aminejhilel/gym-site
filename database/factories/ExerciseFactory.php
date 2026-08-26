<?php

namespace Database\Factories;

use App\Models\Exercise;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Exercise>
 */
class ExerciseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Squat', 'Deadlift', 'Bench Press', 'Pull-up', 'Push-up', 'Lunge', 'Plank', 'Burpee', 'Bicep Curl', 'Shoulder Press', 'Leg Press', 'Lat Pulldown', 'Tricep Dip', 'Cable Row', 'Hip Thrust']),
            'description' => fake()->sentence(),
            'muscle_group' => fake()->randomElement(['Chest', 'Back', 'Legs', 'Shoulders', 'Arms', 'Core', 'Full Body', 'Glutes']),
            'difficulty' => fake()->randomElement(['beginner', 'intermediate', 'advanced']),
            'instructions' => fake()->paragraph(),
            'video_url' => null,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\GymClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<GymClass>
 */
class GymClassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Morning Yoga', 'HIIT Blast', 'CrossFit WOD', 'Zumba Dance', 'Spin Cycle', 'Pilates Core', 'Boxing Basics', 'Aqua Aerobics']),
            'description' => fake()->sentence(),
            'coach_id' => Coach::factory(),
            'capacity' => fake()->numberBetween(10, 30),
            'duration_minutes' => fake()->randomElement([45, 60, 90]),
            'scheduled_at' => fake()->dateTimeBetween('-1 month', '+2 months'),
            'status' => fake()->randomElement(['scheduled', 'scheduled', 'completed', 'cancelled']),
            'location' => fake()->randomElement(['Main Hall', 'Studio A', 'Studio B', 'Pool', 'Outdoor']),
        ];
    }
}

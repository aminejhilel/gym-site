<?php

namespace Database\Factories;

use App\Models\Coach;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Coach>
 */
class CoachFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->phoneNumber(),
            'specialty' => fake()->randomElement(['Yoga', 'CrossFit', 'Weightlifting', 'Cardio', 'Boxing', 'Pilates', 'Zumba', 'Swimming']),
            'bio' => fake()->paragraph(),
            'photo' => null,
            'hire_date' => fake()->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'salary' => fake()->numberBetween(2000, 6000),
            'is_active' => fake()->boolean(90),
        ];
    }
}

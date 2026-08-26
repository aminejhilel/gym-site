<?php

namespace Database\Factories;

use App\Models\GymSetting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<GymSetting>
 */
class GymSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => fake()->unique()->slug(2),
            'value' => fake()->word(),
            'type' => fake()->randomElement(['text', 'boolean', 'integer']),
            'label' => fake()->words(2, true),
        ];
    }
}

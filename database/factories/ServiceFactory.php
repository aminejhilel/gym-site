<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['Personal Training', 'Nutrition Coaching', 'Sauna Access', 'Swimming Pool', 'Group Classes', 'Locker Room', 'Towel Service', 'Parking']),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 10, 200),
            'icon' => null,
            'is_active' => fake()->boolean(85),
        ];
    }
}

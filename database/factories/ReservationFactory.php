<?php

namespace Database\Factories;

use App\Models\GymClass;
use App\Models\Member;
use App\Models\Reservation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => Member::factory(),
            'gym_class_id' => GymClass::factory(),
            'reserved_at' => fake()->dateTimeBetween('-1 month', 'now'),
            'status' => fake()->randomElement(['reserved', 'attended', 'cancelled']),
        ];
    }
}

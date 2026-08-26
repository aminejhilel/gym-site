<?php

namespace Database\Factories;

use App\Models\Attendance;
use App\Models\Member;
use App\Models\Membership;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $checkedIn = fake()->dateTimeBetween('-6 months', 'now');

        return [
            'member_id' => Member::factory(),
            'membership_id' => Membership::factory(),
            'checked_in_at' => $checkedIn,
            'checked_out_at' => fake()->optional(0.8)->dateTimeBetween($checkedIn, (clone $checkedIn)->modify('+3 hours')),
            'method' => fake()->randomElement(['qr', 'manual']),
        ];
    }
}

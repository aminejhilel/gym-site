<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Membership;
use App\Models\MembershipPlan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Membership>
 */
class MembershipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-2 years', 'now');
        $durationDays = fake()->randomElement([30, 90, 180, 365]);
        $endDate = (clone $startDate)->modify("+{$durationDays} days");

        return [
            'member_id' => Member::factory(),
            'plan_id' => MembershipPlan::factory(),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate->format('Y-m-d'),
            'status' => $endDate < now() ? 'expired' : 'active',
            'qr_code' => Str::uuid()->toString(),
        ];
    }
}

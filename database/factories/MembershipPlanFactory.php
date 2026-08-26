<?php

namespace Database\Factories;

use App\Models\MembershipPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MembershipPlan>
 */
class MembershipPlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $plans = [
            ['Monthly', 30, 49.99],
            ['Quarterly', 90, 129.99],
            ['Semi-Annual', 180, 229.99],
            ['Annual', 365, 399.99],
        ];
        $plan = fake()->randomElement($plans);

        return [
            'name' => $plan[0],
            'description' => fake()->sentence(),
            'duration_days' => $plan[1],
            'price' => $plan[2],
            'features' => ['Unlimited gym access', 'Locker room', 'Free WiFi', 'Guest pass'],
            'is_active' => true,
        ];
    }
}

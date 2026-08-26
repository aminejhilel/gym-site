<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Membership;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'membership_id' => Membership::factory(),
            'member_id' => Member::factory(),
            'amount' => fake()->randomElement([49.99, 129.99, 229.99, 399.99]),
            'payment_method' => fake()->randomElement(['cash', 'card', 'transfer']),
            'status' => fake()->randomElement(['paid', 'paid', 'paid', 'pending']),
            'paid_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}

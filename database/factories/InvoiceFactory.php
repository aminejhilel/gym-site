<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Member;
use App\Models\Payment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $issuedAt = fake()->dateTimeBetween('-1 year', 'now');

        return [
            'payment_id' => Payment::factory(),
            'member_id' => Member::factory(),
            'invoice_number' => 'INV-' . strtoupper(fake()->unique()->bothify('####??')),
            'amount' => fake()->randomElement([49.99, 129.99, 229.99, 399.99]),
            'issued_at' => $issuedAt,
            'due_at' => (clone $issuedAt)->modify('+30 days'),
            'status' => 'paid',
        ];
    }
}

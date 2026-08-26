<?php

namespace Database\Factories;

use App\Models\Expense;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->randomElement(['Electricity Bill', 'Water Bill', 'Equipment Repair', 'New Dumbbells', 'Cleaning Supplies', 'Coach Salary', 'Rent', 'Marketing']),
            'amount' => fake()->randomFloat(2, 50, 5000),
            'category' => fake()->randomElement(['equipment', 'utilities', 'salaries', 'maintenance', 'other']),
            'expense_date' => fake()->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'notes' => fake()->optional()->sentence(),
            'paid_by' => null,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Testimonial>
 */
class TestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'member_id' => null,
            'author_name' => fake()->name(),
            'content' => fake()->randomElement([
                'This gym changed my life! The coaches are amazing and the facilities are top-notch.',
                'Best gym I have ever been to. The equipment is modern and the staff is very helpful.',
                'I lost 15kg in 3 months thanks to the personalized training programs here.',
                'Great atmosphere, friendly community, and excellent coaching. Highly recommend!',
                'The nutrition coaching combined with the training program gave incredible results.',
            ]),
            'rating' => fake()->numberBetween(4, 5),
            'is_published' => fake()->boolean(70),
            'photo' => null,
        ];
    }
}

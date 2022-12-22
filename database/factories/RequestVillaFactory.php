<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestVilla>
 */
class RequestVillaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(90, 103),
            'staff_id' => fake()->numberBetween(90, 103),
            'status' => fake()->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contract>
 */
class ContractFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
            'staff_id' => $this->faker->numberBetween(99, 103),
            'villa_id' => $this->faker->numberBetween(99, 103),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'total_price' => $this->faker->randomFloat(2, 100, 1000),
            'signatures_staff' => $this->faker->boolean,
            'signatures_villa' => $this->faker->boolean,
            'payment_status' => $this->faker->randomElement(['pending', 'paid']),
        ];
    }
}

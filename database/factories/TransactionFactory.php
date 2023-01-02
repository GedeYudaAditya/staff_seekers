<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'villa_id' => $this->faker->numberBetween(99, 103),
            'contract_id' => $this->faker->numberBetween(1, 10),
            'code_transaction' => 'CodeTrans' . $this->faker->randomNumber(8),
            'price' => $this->faker->numberBetween(100000, 1000000),
            'total_price' => $this->faker->numberBetween(100000, 1000000),
            'payment_status' => $this->faker->randomElement(['pending', 'valid', 'invalid']),
            'status' => $this->faker->randomElement(['process', 'send', 'received', 'done']),
        ];
    }
}

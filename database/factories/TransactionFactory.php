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
            'contract_id' => $this->faker->numberBetween(1, 10),
            'code_transaction' => 'CodeTrans' . $this->faker->randomNumber(8),
            'villa_id' => $this->faker->numberBetween(99, 103),
        ];
    }
}

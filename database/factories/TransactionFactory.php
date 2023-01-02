<?php

namespace Database\Factories;

use App\Models\Contract;
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
        $contract = Contract::all()->pluck('id')->toArray();
        $villa = Contract::all()->pluck('villa_id')->toArray();

        return [
            'villa_id' => fake()->randomElement($villa),
            'contract_id' => fake()->randomElement($contract),
            'code_transaction' => 'StaffSeekers-' . $this->faker->randomNumber(8),
            'price' => $this->faker->numberBetween(100000, 1000000),
            'total_price' => $this->faker->numberBetween(100000, 1000000),
            'payment_status' => $this->faker->randomElement(['pending', 'valid', 'invalid']),
            'status' => $this->faker->randomElement(['process', 'send', 'received', 'done']),
        ];
    }
}

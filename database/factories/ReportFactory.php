<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Report>
 */
class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Take all id from staff and villa
        $dataId = User::where('role', 'staff')->orWhere('role', 'villa')->pluck('id')->toArray();

        return [
            'slug' => $this->faker->slug(),
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['pending', 'processed', 'done']),
            'type' => $this->faker->randomElement(['bug', 'report']),
            'user_id' => $this->faker->randomElement($dataId),
        ];
    }
}

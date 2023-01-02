<?php

namespace Database\Factories;

use App\Models\User;
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
        $userVilla = User::where('role', 'villa')->pluck('id')->toArray();
        $userStaff = User::where('role', 'staff')->pluck('id')->toArray();

        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['process', 'berjalan', 'selesai', 'batal']),
            'position' => $this->faker->jobTitle(),
            'staff_id' => fake()->unique()->randomElement($userStaff),
            'villa_id' => fake()->unique()->randomElement($userVilla),
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'signatures_staff' => $this->faker->boolean,
            'signatures_villa' => $this->faker->boolean,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestStaff>
 */
class RequestStaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Take all id from staff and villa
        $dataIdStaff = User::where('role', 'staff')->pluck('id')->toArray();
        $dataIdVilla = User::where('role', 'villa')->pluck('id')->toArray();

        return [
            'user_id' => fake()->randomElement($dataIdStaff),
            'villa_id' => fake()->randomElement($dataIdVilla),
            'status' => fake()->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}

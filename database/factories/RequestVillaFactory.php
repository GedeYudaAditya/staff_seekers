<?php

namespace Database\Factories;

use App\Models\User;
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
        // Take all id from staff and villa
        $dataIdStaff = User::where('role', 'staff')->pluck('id')->toArray();
        $dataIdVilla = User::where('role', 'villa')->pluck('id')->toArray();

        return [
            'user_id' => fake()->randomElement($dataIdVilla),
            'staff_id' => fake()->randomElement($dataIdStaff),
            'status' => fake()->randomElement(['pending', 'accepted', 'rejected']),
        ];
    }
}

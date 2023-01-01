<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // Take all id from staff villa
        $dataIdVilla = User::where('role', 'villa')->pluck('id')->toArray();
        return [
            'user_id' => fake()->randomElement($dataIdVilla),
            'title' => fake()->sentence(3),
            'hiring' => fake()->boolean,
            'slug' => fake()->slug,
            'thumbnail' => fake()->imageUrl(640, 480, 'people'),
        ];
    }
}

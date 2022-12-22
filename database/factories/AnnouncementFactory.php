<?php

namespace Database\Factories;

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
        return [
            'user_id' => fake()->numberBetween(90, 103),
            'title' => fake()->sentence(3),
            'hiring' => fake()->boolean,
            'slug' => fake()->slug,
            'thumbnail' => fake()->imageUrl(640, 480, 'people'),
        ];
    }
}

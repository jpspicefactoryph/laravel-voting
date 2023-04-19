<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poll>
 */
class PollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::pluck('id')->all();

        return [
            'title' => fake()->catchPhrase(),
            'description' => fake()->paragraph(),
            'is_published' => fake()->randomElement([0,1]),
            'starts_at' => fake()->dateTimeBetween('2023-01-01', '2023-01-31')->format('Y-m-d'),
            'ends_at' => fake()->dateTimeBetween('2023-05-01', '2023-05-31')->format('Y-m-d'),
            'user_id' => fake()->randomElement($user),
        ];

    }
}

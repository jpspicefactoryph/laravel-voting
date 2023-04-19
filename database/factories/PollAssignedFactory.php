<?php

namespace Database\Factories;

use App\Models\Poll;
use App\Models\PollAssigned;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PollAssigned>
 */
class PollAssignedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $poll = Poll::pluck('id')->all();
        $user = User::pluck('id')->all();

        return [
            'poll_id' => fake()->randomElement($poll),
            'user_id' => fake()->randomElement($user),
            'status' => fake()->boolean(),
        ];
    }

}

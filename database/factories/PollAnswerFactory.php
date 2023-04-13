<?php

namespace Database\Factories;

use App\Models\Poll;
use App\Models\PollQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PollAnswer>
 */
class PollAnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $polls = Poll::pluck('id')->all();
        $pollQuestions = PollQuestion::pluck('id')->all();

        return [
            'content' => fake()->paragraph(1),
            'is_active' => fake()->randomElement([0, 1]),
            'poll_id' => fake()->randomElement($polls),
            'poll_question_id' => fake()->randomElement($pollQuestions),
        ];
    }
}

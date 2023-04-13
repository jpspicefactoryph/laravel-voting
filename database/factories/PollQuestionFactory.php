<?php

namespace Database\Factories;

use App\Models\Poll;
use App\Models\PollQuestionType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PollQuestion>
 */
class PollQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $polls = Poll::pluck('id')->all();
        $pollQuestionTypes = PollQuestionType::pluck('id')->all();

        return [
            'content' => fake()->catchPhrase(),
            'is_active' => fake()->randomElement([0, 1]),
            'poll_id' => fake()->randomElement($polls),
            'poll_question_type_id' => fake()->randomElement($pollQuestionTypes),
        ];
    }
}

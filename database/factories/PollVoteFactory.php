<?php

namespace Database\Factories;

use App\Models\Poll;
use App\Models\PollAnswer;
use App\Models\PollQuestion;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PollVote>
 */
class PollVoteFactory extends Factory
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
        $pollAnswers = PollAnswer::pluck('id')->all();
        $users = User::pluck('id')->all();

        return [
            'content' => fake()->paragraph(1),
            'poll_id' => fake()->randomElement($polls),
            'poll_question_id' => fake()->randomElement($pollQuestions),
            'poll_answer_id' => fake()->randomElement($pollAnswers),
            'user_id' => fake()->randomElement($users),
        ];
    }
}

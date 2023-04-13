<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Poll;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PollCategory>
 */
class PollCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $poll = Poll::pluck('id')->all();
        $category = Category::pluck('id')->all();

        return [
            'poll_id' => fake()->randomElement($poll),
            'category_id' => fake()->randomElement($category),
        ];
    }
}

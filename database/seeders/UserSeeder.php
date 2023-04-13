<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Poll;
use App\Models\PollAnswer;
use App\Models\PollCategory;
use App\Models\PollQuestion;
use App\Models\PollVote;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(5)->create();
        $pollQuestionTypes = DB::table('poll_question_types')->insert([
            [ 'name' => 'Yes or No' ],
            [ 'name' => 'Multiple Choice'],
            [ 'name' => 'Input'],
        ]);

        $users = User::factory(15)->create();

        $polls = Poll::factory(5)->create()->each(function($poll) use($categories){
            PollCategory::factory()->create([
                'poll_id' => $poll->id,
            ]);

            PollQuestion::factory(1)->create([
                'poll_id' => $poll->id,
            ])->each(function($question){
                
                PollAnswer::factory(rand(1, 3))->create([
                    'poll_id' => $question->poll_id,
                    'poll_question_id' => $question->id,
                ])->each(function($answer){
                    
                    PollVote::factory()->create([
                        'poll_id' => $answer->poll_id,
                        'poll_question_id' => $answer->poll_question_id,
                        'poll_answer_id' => $answer->id,
                    ]);
                });
            });
        });


    }
}

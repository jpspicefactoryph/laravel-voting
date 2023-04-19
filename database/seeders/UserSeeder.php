<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Poll;
use App\Models\PollAnswer;
use App\Models\PollAssigned;
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
            // [ 'name' => 'Input'],
        ]);

        User::factory(100)->create();
        // Create User
        Poll::factory()->count(100)->create()->each(function ($poll) {
            PollCategory::factory()->create([
                'poll_id' => $poll->id,
            ]);

            $users = User::inRandomOrder()->take(rand(3, 4))->get();
            foreach ($users as $user) {
                PollAssigned::create([
                    'poll_id' => $poll->id,
                    'user_id' => $user->id,
                ]);
            }
            
            PollQuestion::factory(rand(1, 3))->create([
                'poll_id' => $poll->id,
            ])->each(function($question) use($poll){
                
                if($question->poll_question_type_id === 1){
                    $answerData = PollAnswer::factory(rand(3,4))
                    ->sequence(
                        ['content' => 'Yes'],
                        ['content' => 'No']
                    )
                    ->create([
                        'poll_id' => $question->poll_id,
                        'poll_question_id' => $question->id,
                    ]);

                    $answerDataIDArray = [];
                    $pollAssignedUsersDataIDArray = [];
                    shuffle($answerDataIDArray);
                    shuffle($pollAssignedUsersDataIDArray);

                    $pollAssignedUsersData = PollAssigned::where('poll_id', $question->poll_id)->get();
                    $pollAssignedUsersCount = PollAssigned::where('poll_id', $question->poll_id)->get()->count();
                    
                    foreach ($pollAssignedUsersData as $pAUData) {
                        array_push($pollAssignedUsersDataIDArray, $pAUData->user_id);
                    }
                    
                    foreach ($answerData as $aData) {
                        array_push($answerDataIDArray, $aData->id);
                        // WHILE REMAINING VOTER != 0

                        while($pollAssignedUsersCount > 0){
                            PollVote::factory()->create([
                                'poll_id' => $question->poll_id,
                                'poll_question_id' => $question->id,
                                'poll_answer_id' => $aData->id,
                                'user_id' => end($pollAssignedUsersDataIDArray),
                            ]);
                            $pollAssignedUsersCount = $pollAssignedUsersCount-1;
                            array_pop($answerDataIDArray);
                            array_pop($pollAssignedUsersDataIDArray);
                        }
                    }
                }

                if($question->poll_question_type_id === 2){
                    $answerData = PollAnswer::factory(2)
                    ->sequence(
                        ['content' => 'Yes'],
                        ['content' => 'No']
                    )
                    ->create([
                        'poll_id' => $question->poll_id,
                        'poll_question_id' => $question->id,
                    ]);

                    $answerDataIDArray = [];
                    $pollAssignedUsersDataIDArray = [];
                    shuffle($answerDataIDArray);
                    shuffle($pollAssignedUsersDataIDArray);

                    $pollAssignedUsersData = PollAssigned::where('poll_id', $question->poll_id)->get();
                    $pollAssignedUsersCount = PollAssigned::where('poll_id', $question->poll_id)->get()->count();
                    
                    foreach ($pollAssignedUsersData as $pAUData) {
                        array_push($pollAssignedUsersDataIDArray, $pAUData->user_id);
                    }
                    
                    foreach ($answerData as $aData) {
                        array_push($answerDataIDArray, $aData->id);
                        // WHILE REMAINING VOTER != 0

                        while($pollAssignedUsersCount > 0){
                            PollVote::factory()->create([
                                'poll_id' => $question->poll_id,
                                'poll_question_id' => $question->id,
                                'poll_answer_id' => $aData->id,
                                'user_id' => end($pollAssignedUsersDataIDArray),
                            ]);
                            $pollAssignedUsersCount = $pollAssignedUsersCount-1;
                            array_pop($answerDataIDArray);
                            array_pop($pollAssignedUsersDataIDArray);
                        }
                    }
                }
                
                // if($question->poll_question_type_id === 3){
                //     $answerData = PollAnswer::factory(2)
                //     ->sequence(
                //         ['content' => 'Yes'],
                //         ['content' => 'No']
                //     )
                //     ->create([
                //         'poll_id' => $question->poll_id,
                //         'poll_question_id' => $question->id,
                //     ]);

                //     $answerDataIDArray = [];
                //     $pollAssignedUsersDataIDArray = [];
                //     shuffle($answerDataIDArray);
                //     shuffle($pollAssignedUsersDataIDArray);

                //     $pollAssignedUsersData = PollAssigned::where('poll_id', $question->poll_id)->get();
                //     $pollAssignedUsersCount = PollAssigned::where('poll_id', $question->poll_id)->get()->count();
                    
                //     foreach ($pollAssignedUsersData as $pAUData) {
                //         array_push($pollAssignedUsersDataIDArray, $pAUData->user_id);
                //     }
                    
                //     foreach ($answerData as $aData) {
                //         array_push($answerDataIDArray, $aData->id);
                //         // WHILE REMAINING VOTER != 0

                //         while($pollAssignedUsersCount > 0){
                //             PollVote::factory(1)->create([
                //                 'poll_id' => $question->poll_id,
                //                 'poll_question_id' => $question->id,
                //                 'poll_answer_id' => $aData->id,
                //                 'user_id' => end($pollAssignedUsersDataIDArray),
                //             ]);
                //             $pollAssignedUsersCount = $pollAssignedUsersCount-1;
                //             array_pop($answerDataIDArray);
                //             array_pop($pollAssignedUsersDataIDArray);
                //         }
                //     }
                // }
            });
        });

    }
}

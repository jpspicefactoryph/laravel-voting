<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\PollRepositoryInterface;
use App\Models\Poll;
use App\Models\PollAssignedUsers;

class PollRepository implements PollRepositoryInterface
{
    /**
     * @var Poll
     */
    protected $poll;

    /**
     * PollRepository constructor.
     *
     * @param Poll $poll
     */
    public function __construct(Poll $poll)
    {
        $this->poll = $poll;
    }

    /**
     * Get all polls.
     *
     * @return Poll $poll
     */
    public function getAllMyPolls($id)
    {
        return $this->poll->where('user_id', $id)->get();
    }

    /**
     * Get all my asssigned polls.
     *
     * @return Poll $poll
     */
    public function getAllMyAsignedPolls($id)
    {
        // return PollAssignedUsers::where('user_id', $id)->get();
    }

    /**
     * Get poll details.
     *
     * @return Poll $poll
     */
    public function getPollDetails($data)
    {
        return $this->poll
        ->select('polls.id', 'polls.title', 'polls.description', 'polls.starts_at', 'polls.ends_at', 'polls.is_published', 'polls.created_at')
        ->with(['pollQuestions' => function($q){
            $q->select('id','content','is_active','poll_id','poll_question_type_id','created_at')
            ->with('pollQuestionType:id,name')
            ->with(['pollAnswers' => function($q){
                $q->select('id','content','is_active','poll_question_id','created_at')
                ->withCount('pollVotes');
            }]);
        }])
        ->with(['pollCategory' => function($q){
            $q->select('id','poll_id', 'category_id')->with('category:id,title,meta_title,slug,content');
        }])
        ->withCount('assignedUsers')
        ->where('polls.id', $data->id)->first();        
    }
}

?>
<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Interfaces\PollRepositoryInterface;
use App\Models\Poll;

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
     * Get poll details.
     *
     * @return Poll $poll
     */
    public function getPollDetails($data)
    {
        return $this->poll->with('pollQuestions.pollAnswers.pollVotes')->where('id', $data->id)->get();
    }
}

?>
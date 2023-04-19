<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\PollAssigned;
use App\Repositories\PollRepository;
use Illuminate\Support\Facades\Auth;

class PollService
{
    /**
     * @var $pollRepository
     */
    protected $pollRepository;

    /**
     * PollService constructor.
     *
     * @param PollRepository $pollRepository
     */
    public function __construct(PollRepository $pollRepository)
    {
        $this->pollRepository = $pollRepository;
    }

    /**
     * Get all polls.
     *
     * @return Obj
     */
    public function getAllMyPolls($id)
    {
        return $this->pollRepository->getAllMyPolls($id);
    }

    /**
     * Get all polls.
     *
     * @return Obj
     */
    public function getAllMyAssignedPolls($id)
    {
        return PollAssigned::select('poll_assigneds.id as poll_assigned_id', 'poll_assigneds.status as pollAssignedStatus', 'polls.id as poll_id', 'polls.title as poll_title', 'polls.description as poll_desc', 'polls.starts_at as starts_at', 'polls.ends_at as ends_at', 'polls.created_at as poll_created_at', 'poll_assigneds.user_id as userID', 'poll_categories.id as poll_category_id', 'categories.title as cat_title')
        ->leftJoin('polls', 'poll_assigneds.poll_id', '=', 'polls.id')
        ->leftJoin('poll_categories', 'polls.id', '=', 'poll_categories.poll_id')
        ->leftJoin('categories', 'poll_categories.category_id', '=', 'categories.id')
        ->havingRaw('userID = ?', [Auth::id()])
        ->get();
    }

    /**
     * Get poll details.
     *
     * @return Obj
     */
    public function getMyPollDetails($data)
    {
        return $this->pollRepository->getPollDetails($data);
    }
    
}
?>
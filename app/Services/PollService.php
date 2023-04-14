<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PollRepository;

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
<?php

namespace App\Interfaces;

interface PollRepositoryInterface
{
    public function getAllMyPolls($id);
    public function getPollDetails($data);
}

?>
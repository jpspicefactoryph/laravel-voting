<?php

namespace App\Http\Controllers;

use App\Models\PollAssigned;
use App\Models\User;
use App\Services\PollService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;


class AssignedPollController extends Controller
{

    /**
     * @var pollService
     */
    protected $pollService;

    /**
     * PollController Constructor
     *
     * @param PollService $pollService
     *
     */
    public function __construct(PollService $pollService)
    {
        $this->pollService = $pollService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        try {
            $result['data'] = $this->pollService->getAllMyAssignedPolls(Auth::id());
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return view('polls.assigned-polls', [
            'myAssignedPolls' => $result['data'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Http\Requests\StorePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Services\PollService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PollController extends Controller
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
    public function index(Request $request)
    {
        $result = ['status' => 200];
        
        try {
            $result['data'] = $this->pollService->getAllMyPolls(Auth::id());
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        // return dd($result);
        return view('polls.my-polls', [
            'myPolls' => $result['data'],
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
    public function store(StorePollRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Poll $myPoll)
    {
        // try {
        //     $result['data'] = $this->pollService->getMyPollDetails($myPoll);
        // } catch (Exception $e) {
        //     $result = [
        //         'status' => 500,
        //         'error' => $e->getMessage()
        //     ];
        // }
        
        // return $myPoll->with('pollQuestions.pollAnswers.pollVotes')->where('id', $myPoll->id)->get();
        return view('polls.my-poll-details', [
            'pollDetails' => response()->json($myPoll->with('pollQuestions.pollAnswers.pollVotes')->where('id', $myPoll->id)->get()),
        ]);
        // return $myPoll->with('pollQuestions.pollAnswers.pollVotes')->where('id', $myPoll->id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePollRequest $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poll $poll)
    {
        //
    }
}

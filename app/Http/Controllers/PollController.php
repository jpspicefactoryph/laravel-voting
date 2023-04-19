<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Http\Requests\StorePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Models\PollCategory;
use App\Services\PollService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        return view('polls.my-polls', [
            'myPolls' => $result['data'],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polls.create-poll');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePollRequest $request)
    {
        $validatedData = $request->validated();

        DB::beginTransaction();

        try {

            // Poll
            $poll = Poll::create([
                'user_id' => $request->user_id,
                'title' => $request->title,
                'description' => $request->description,
                'starts_at' => $request->starts_at,
                'ends_at' => $request->ends_at,
            ]);

            // Poll Category *STATIC DATA*
            PollCategory::create([
                'poll_id' => $poll->id,
                'category_id' => 2,
            ]);

            foreach ($request->questions as $questionData) {
                $question = $poll->pollQuestions()->create([
                    'content' => $questionData['content'],
                ]);
    
                foreach ($questionData['options'] as $optionData) {
                    $question->pollAnswers()->create([
                        'content' => $optionData['content'],
                    ]);
                }
            }

            DB::commit();
            // all good
            
            return redirect()->route('myPolls.index', $poll)->with('success', 'Poll created successfully!');
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
            return $e;
        }
    }

    /**
     * Display the specified resource.
     * : View
     */
    public function show(Poll $myPoll)
    {
        try {
            $result['data'] = $this->pollService->getMyPollDetails($myPoll);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return view('polls.my-poll-details', [
            'pollDetails' => $result['data'],
        ]);
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

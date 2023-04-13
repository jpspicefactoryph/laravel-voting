<?php

namespace App\Http\Controllers;

use App\Models\PollQuestion;
use App\Http\Requests\StorePollQuestionRequest;
use App\Http\Requests\UpdatePollQuestionRequest;

class PollQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorePollQuestionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PollQuestion $pollQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PollQuestion $pollQuestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePollQuestionRequest $request, PollQuestion $pollQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PollQuestion $pollQuestion)
    {
        //
    }
}

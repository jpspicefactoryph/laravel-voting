<?php

namespace App\Http\Controllers;

use App\Models\PollCategory;
use App\Http\Requests\StorePollCategoryRequest;
use App\Http\Requests\UpdatePollCategoryRequest;

class PollCategoryController extends Controller
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
    public function store(StorePollCategoryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PollCategory $pollCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PollCategory $pollCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePollCategoryRequest $request, PollCategory $pollCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PollCategory $pollCategory)
    {
        //
    }
}

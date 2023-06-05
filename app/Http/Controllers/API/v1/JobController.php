<?php

namespace App\Http\Controllers\API\v1;

use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Requests\jobRequest;
use App\Http\Controllers\Controller;

class JobController extends Controller
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
    public function store(jobRequest $request)
    {
        $validatedData = $request->validated();

        auth()->user()->employerProfile->jobs()->create([
            'title' => $validatedData['title'],
            'category_id' => $validatedData['category_id'],
            'location_id' => $validatedData['location_id'],
            'description' => $validatedData['description'],
            'salary' => $validatedData['salary'],
            'type' => $validatedData['type'],
            'gender' => $validatedData['gender'],
            'experience' => $validatedData['experience'],
            'qualification' => $validatedData['qualification'],
            'address' => $validatedData['address'],
        ]);


        return "The Job Created Successfully Successfully 🥳";



    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
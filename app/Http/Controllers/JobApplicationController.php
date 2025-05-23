<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}



    /**
     * Show the form for creating a new resource.
     */
    public function create(Job $job)
    {
        return view('job_application.create', ['job' => $job]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Job $job, Request $request)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'expected_salary' => 'required|integer|min:1|max:100000',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        

        // Store the uploaded CV file
        $file = $request->file('cv');
        $path = $file->store('cvs', 'private');

        // Create a job application record
        $job->jobApplications()->create([
            'user_id' => $request->user()->id,
            'job_id' => $job->id,
            'expected_salary' => $validatedData['expected_salary'],
            'cv_path' => $path,
        ]);

        // Redirect back with a success message
        return redirect()->route('jobs.show', $job)
            ->with('success', 'Job application submitted');
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

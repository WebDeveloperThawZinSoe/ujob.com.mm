<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function store(Request $request, $employer_id)
    {
        // Retrieve employer and job data
        $employer = Employer::findOrFail($employer_id);
        $jobs = Job::where('employer_id', $employer_id)->count();
        $jobsHighlight = Job::where('employer_id', $employer_id)->where('highlight', 1)->count();
        $currentDate = Carbon::now();
        $jobDeadline = Carbon::parse($employer->end_date);

        // Check if job postings are full and the deadline is in the future
        if ($employer->total_jobs > $jobs && $jobDeadline->isFuture()) {
            return redirect()->back()->with('error', 'Your Job Posts are full.');
        }

        // Check if highlight job postings are full
        if ($request->input('highlight') != '') {
            if ($employer->total_highlights > $jobsHighlight) {
                return redirect()->back()->with('error', 'Your Highlight Job Posts are full.');
            }
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'nullable|numeric',
            'job_type' => 'required|string',
            'deadline' => 'required|date',
            'category_id' => 'required|integer|exists:categories,id',
            'location_id' => 'required|integer|exists:locations,id',
            'skills' => 'required|array',
            'skills.*' => 'required|string', // Removed exists validation for skills since it's a multi-select
        ]);

        $job = new Job();
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->salary = $request->input('salary');
        $job->job_type = $request->input('job_type');
        $job->deadline = $request->input('deadline');
        $job->highlight = $request->input('highlight');
        $job->is_active = 1; // Assuming the job is active by default
        $job->employer_id = $employer_id;
        $job->category_id = $request->input('category_id');
        $job->location_id = $request->input('location_id');

        // Save skills as comma-separated values
        $job->skills = implode(', ', $request->input('skills'));

        $job->save();

        return redirect()->back()->with('success', 'Job posted successfully!');
    }


}

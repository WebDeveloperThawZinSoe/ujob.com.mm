<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Location;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request) {
        $categories = Category::all();
        $locations = Location::all();
    
        $jobs = Job::query();
    
        if ($request->filled('title')) {
            $jobs->where("title", "like", "%" . $request->get("title") . "%");
        }
        if ($request->filled('job_type')) {
            $jobs->where("job_type", $request->get("job_type"));
        }
        if ($request->filled('category_id')) {
            $jobs->whereIn("category_id", (array) $request->get("category_id"));
        }
        if ($request->filled('location_id')) {
            $jobs->where("location_id", $request->get("location_id"));
        }
    
        $jobs = $jobs->orderBy('created_at', 'desc')->paginate(12);
    
        return view('admin.jobs.index', compact( 'jobs', 'categories', 'locations'));
    }

    public function show($id){
        $job = Job::findOrFail($id);
       
        $resumes = JobSeeker::where('job_id', $id)->get();
        return view('admin.jobs.show.index', compact('job', 'resumes'));
    }
    
      public function create() {
        $employers = Employer::all();
        $categories = Category::all();
        $locations = Location::all();
        $skills = Skill::all();
        return view('admin.jobs.create', compact('employers','categories', 'locations','skills'));
    }


    public function store(Request $request) {
        
        $employer_id = $request->employer;
         // Retrieve employer and job data
         $employer = Employer::findOrFail($employer_id);
         $jobs = Job::where('employer_id', $employer_id)->count();
         $jobsHighlight = Job::where('employer_id', $employer_id)->where('highlight', 1)->count();
         $currentDate = Carbon::now();
         $jobDeadline = Carbon::parse($employer->end_date);
 
         // Check if job postings are full and the deadline is in the future
         // if ($employer->total_jobs <= $jobs && $jobDeadline->isFuture()) {
         //     return redirect()->back()->with('error', 'Your Job Posts are full.');
         // }
 
         if ($employer->total_jobs <= $jobs ) {
             return redirect()->back()->with('error', 'Your Job Posts are full.');
         }
 
         // Check if highlight job postings are full
         if ($request->input('highlight') == 1 && $employer->total_highlights <= $jobsHighlight) {
             return redirect()->back()->with('error', 'Your Highlight Job Posts are full.');
         }
 
         // Validate form data
         $request->validate([
             'title' => 'required|string|max:255',
             'description' => 'required|string', // HTML allowed
             'salary' => 'nullable|numeric',
             'job_type' => 'required|string',
             'deadline' => 'required|date',
             'category_id' => 'required|integer|exists:categories,id',
             'location_id' => 'required|integer|exists:locations,id',
             'skills' => 'required|array',
             'skills.*' => 'required|string',
         ]);
 
         // Store job data
         $job = new Job();
         $job->title = $request->input('title');
         $job->description = $request->input('description'); // Store HTML safely
         $job->salary = $request->input('salary');
         $job->job_type = $request->input('job_type');
         $job->deadline = $request->input('deadline');
         $job->highlight = $request->input('highlight');
         $job->is_active = 1; // Assuming the job is active by default
         $job->employer_id = $employer_id;
         $job->category_id = $request->input('category_id');
         $job->location_id = $request->input('location_id');
         $job->is_anonymous = $request->anynomous ?? null;
 
         // Save skills as a comma-separated list
         $job->skills = implode(', ', $request->input('skills'));
 
         $job->save();
 
         return redirect()->back()->with('success', 'Job posted successfully!');

    }

    public function edit($id){
        $job = Job::findOrFail($id);
       
        $resumes = JobSeeker::where('job_id', $id)->get();
        $employers = Employer::all();
        $categories = Category::all();
        $locations = Location::all();
        $skills = Skill::all();
        return view('admin.jobs.show.edit', compact('job', 'resumes','employers','categories', 'locations','skills'));
    }
    
    public function update(Request $request)
    {
        // dd($request->all()); // Uncomment this for debugging
    
        $employer_id = $request->employer;
        $job_id = $request->job_id;
    
        // Retrieve employer and job data
        $employer = Employer::findOrFail($employer_id);
        $job = Job::findOrFail($job_id);
    
        $jobsHighlight = Job::where('employer_id', $employer_id)->where('highlight', 1)->count();
        $currentDate = Carbon::now();
        $jobDeadline = Carbon::parse($employer->end_date);
    
        // Check if highlight job postings are full
        if ($request->input('highlight') == 1 && $employer->total_highlights <= $jobsHighlight && !$job->highlight) {
            return redirect()->back()->with('error', 'Your Highlight Job Posts are full.');
        }
    
        // Validate form data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string', // HTML allowed
            'salary' => 'nullable|numeric',
            'job_type' => 'required|string',
            'deadline' => 'required|date',
            'category_id' => 'required|integer|exists:categories,id',
            'location_id' => 'required|integer|exists:locations,id',
            'skills' => 'required|array',
            'skills.*' => 'required|string',
        ]);
    
        // Update job data
        $job->title = $request->input('title');
        $job->description = $request->input('description'); // Store HTML safely
        $job->salary = $request->input('salary');
        $job->job_type = $request->input('job_type');
        $job->deadline = $request->input('deadline');
        $job->highlight = $request->input('highlight');
        $job->category_id = $request->input('category_id');
        $job->location_id = $request->input('location_id');
        $job->is_anonymous = $request->input('anynomous') ?? null;  // Make sure this matches the request parameter name
    
        // Convert skills from array to comma-separated string
        $skills = $request->input('skills');
        if (is_array($skills)) {
            $job->skills = implode(', ', $skills);
        } else {
            $job->skills = '';
        }
    
        // Save the job data
        $job->save();
    
        return redirect()->back()->with('success', 'Job updated successfully!');
    }
    // In JobController.php
    public function destroy($id)
    {
        $job = Job::findOrFail($id); // Find the job or fail if not found

        // Delete the job
        $job->delete();

        JobSeeker::where('job_id', $id)->delete(); // Delete associated job seekers
        // Redirect back with a success message
        return redirect()->route('admin.jobs.index')->with('success', 'Job deleted successfully!');
    }
    
}

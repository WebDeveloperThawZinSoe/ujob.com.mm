<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Location;
use App\Models\Skill;
use App\Models\User;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;


class JobController extends Controller
{
    //jobCreate
    public function jobCreate(){
        $categories = Category::all();
        $locations = Location::all();
        $skills = Skill::all();
        return view("frontend.employer.job_create",compact("categories","locations","skills"));
    }

    //store
    public function store(Request $request, $employer_id)
    {
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

        // Save skills as a comma-separated list
        $job->skills = implode(', ', $request->input('skills'));

        $job->save();

        return redirect("/employer/jobs/lists")->with('success', 'Job posted successfully!');
    }

    //jobLists
    public function jobLists(){
        $company_name = Auth::user()->employer->company_name;
        $employer = Employer::where('company_name', '=', $company_name)->firstOrFail();
        $jobs = Job::where('employer_id', $employer->id)
        ->orderBy("id", "desc")
        ->paginate(15);
        $categories = Category::all();
        $locations = Location::all();
        $skills = Skill::all();

        $ads = Advertisement::all();
        return  view("frontend.employer.job_list",compact("employer","jobs","categories","locations","skills","ads","company_name"));
    }

    //edit
    public function edit($id){
        $job = Job::findOrFail($id);
        $categories = Category::all();
        $locations = Location::all();
        $skills = Skill::all();
        return view("frontend.employer.job_edit",compact("job","categories","locations","skills"));
    }

    //update
    public function update(Request $request)
    {
        // dd($request->all());
        $employer_id = $request->employer_id;
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

        // Save skills as a comma-separated list
        $job->skills = implode(', ', $request->input('skills'));

        $job->save();

        return redirect("/employer/jobs/lists")->with('success', 'Job updated successfully!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Location;
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
    
}

<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\User;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    public function resumes($id){
        $job = Job::findOrFail($id);
        $resumes = JobSeeker::where('job_id', $id)->get();
        return view('frontend.employer.resumes', compact('job', 'resumes'));
    }
    public function resumeUpdate(Request $request, $id){
        $resume = JobSeeker::findOrFail($id);
        $resume->status = $request->status;
        $resume->save();
        return redirect()->back()->with('success', 'Job posted successfully!');
    }
}

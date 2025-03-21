<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobEmail;
use App\Models\JobSeeker;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function jobApply(Request $request){
        $job = Job::findOrFail($request->job_id);

        $validated = $request->validate([
            'user_name' => 'required|max:255',
            'user_phone' => 'required|not_regex:/[a-z]/',
            'user_email' => 'required|max:255|email',
            'user_cv' => 'required|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:10240',

            
        ]);

        // insert Main Image to local file
        $main_image_name = $request->file('user_cv');
            
        $main_image_name->move(public_path().'/cv-data-001/', $img = rand(1, 1000).time().'.'.$request->user_cv->extension());


        $jointTable = new JobSeeker();
        $jointTable->job_id = $job->id;
        $jointTable->seeker_id = auth()->user()->seeker->id;
        $jointTable->status = 'Submitted';
        $jointTable->user_name = $request->user_name;
        $jointTable->user_email = $request->user_email;
        $jointTable->user_phone = $request->user_phone;
        $jointTable->user_cv = $img;
        $jointTable->cover_letter = $request->cover_letter;
        $jointTable->save();

        return redirect()->back()->with('success', 'Job successfully applied!');

        // Submitted
        // Under Review
        // Interviewed
        // Hired
        // Rejected
        
    }
    public function jobHuntingApply(Request $request){
        $validated = $request->validate([
            'email' => 'required|max:255|email',
        ]);
        
        $jobEmail = new JobEmail();
        $jobEmail->email = $request->email;
        $jobEmail->save();

        return redirect()->back()->with('success', 'Your Email applied!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Location;
use App\Models\Skill;
use App\Models\User;
use App\Models\JobSeeker;

class EmployerController extends Controller
{
    //index
    public function index(){
        $employers = Employer::orderBy("id","desc")->get();
        return view("admin.employer.index",compact("employers"));
    }

    //detail
    public function detail($id){
        $employer = Employer::where("id",$id)->firstOrFail();
        $jobs = Job::where("employer_id",$id)->paginate(10);
        $highlight = Job::where("employer_id",$id)->where("highlight","1")->get();
        $user = User::where("id",$employer->user_id)->firstOrFail();
        return view("admin.employer.detail",compact("employer","jobs","user","highlight"));
    }


    //delete
    public function deleteJob($id){
        $job = Job::where("id",$id)->delete();
        JobSeeker::where("job_id",$id)->delete();
        return redirect()->back()->with('success', 'Job successfully deleted!');
    }
}

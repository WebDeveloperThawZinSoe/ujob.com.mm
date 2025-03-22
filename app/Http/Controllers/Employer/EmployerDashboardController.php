<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Location;
use App\Models\Skill;
use App\Models\User;
use Auth;

class EmployerDashboardController extends Controller
{
    //index
    public function index(){
        $company_name = Auth::user()->employer->company_name;
        $employer = Employer::where('company_name', '=', $company_name)->firstOrFail();
        $jobs = Job::where('employer_id', '=', $employer->id)->get();
        $highlight_job = Job::where('employer_id', '=', $employer->id)->where("highlight",1)->get();
        $latest_jobs = Job::where('employer_id', $employer->id)
        ->orderBy("id", "desc")
        ->paginate(10);
        $categories = Category::all();
        $locations = Location::all();
        $skills = Skill::all();

        $ads = Advertisement::all();
        return  view("frontend.employer.dashboard",compact("highlight_job","employer","jobs","categories","locations","skills","ads","latest_jobs"));
    }

    //password_update
    public function password_update(){
        return  view("frontend.employer.password_update");
    }
  
}

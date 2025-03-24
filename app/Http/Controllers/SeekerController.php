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
use App\Models\Seeker;


class SeekerController extends Controller
{
    //index
    public  function index(){
       $seekers = Seeker::orderBy("id","desc")->get();
       return view("admin.seeker.index",compact("seekers"));
    }

    //open_to_work
    public function open_to_work(){
        $seekers = Seeker::where("open_to_work",1)->orderBy("id","desc")->get();
        return view("admin.seeker.open_to_work",compact("seekers"));
    }

    //deleteSeeker
    public function deleteSeeker($id){
        Seeker::where("id",$id)->delete();
        JobSeeker::where("seeker_id",$id)->delete();
        return redirect()->back()->with('success', 'Seeker successfully deleted!');
    }

}

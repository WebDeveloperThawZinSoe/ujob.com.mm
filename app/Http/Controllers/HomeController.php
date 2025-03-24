<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function indexAdmin()
    {
        // Assuming you have 'jobs' table and 'users' table with roles
        $totalJobs = Job::count();
        $totalSeekers = User::where('role', 'seeker')->count();
        $totalEmployers = User::where('role', 'employer')->count();

        $latestJobs = Job::latest()->take(5)->get();
        $latestSeekers = User::where('role', 'seeker')->latest()->take(5)->get();
        $latestEmployers = User::where('role', 'employer')->latest()->take(5)->get();

        return view('admin.index', compact('totalJobs', 'totalSeekers', 'totalEmployers', 'latestJobs', 'latestSeekers', 'latestEmployers'));
        // return view('admin.index');
    }

    //adminChangePassword
    public function adminChangePassword(){
        return view('admin.password_change');
    }
    
}

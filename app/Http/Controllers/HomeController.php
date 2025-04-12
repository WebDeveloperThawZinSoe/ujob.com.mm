<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\User;
use App\Models\Category;

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

    public function exportData()
{
    $employer_count = User::where('role', 'employer')->count();
    $seeker_count = User::where('role', 'seeker')->count();
    $opening_job = Job::where('is_active', 1)->count();
    $categories = Category::withCount('jobs')->get();

    $filename = "job_summary_" . now()->format('Ymd_His') . ".csv";

    $headers = [
        "Content-type"        => "text/csv",
        "Content-Disposition" => "attachment; filename=$filename",
        "Pragma"              => "no-cache",
        "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
        "Expires"             => "0"
    ];

    $callback = function () use ($employer_count, $seeker_count, $opening_job, $categories) {
        $file = fopen('php://output', 'w');

        // Section 1: Summary Counts
        fputcsv($file, ['Data Summary']);
        fputcsv($file, ['Employers', 'Job Seekers', 'Active Jobs']);
        fputcsv($file, [$employer_count, $seeker_count, $opening_job]);
        fputcsv($file, []); // Empty line

        // Section 2: Categories
        fputcsv($file, ['Job Categories']);
        fputcsv($file, ['Category Name', 'Number of Jobs']);

        foreach ($categories as $category) {
            fputcsv($file, [$category->name, $category->jobs_count]);
        }

        fclose($file);
    };

    return response()->stream($callback, 200, $headers);
}
    
}

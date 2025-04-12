<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Article;
use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Location;
use App\Models\Membership;
use App\Models\Seeker;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(){
        $ads = Advertisement::all();
       
        $categories = Category::all();
        $locations = Location::all();
        $jobs = Job::where('is_active', 1)
                ->where('highlight', 1)
                ->orderBy('created_at', 'desc')
                ->take(12)
                ->get();

        $articles = Article::take(6)->get();

        return view('frontend.pages.index', compact('ads', 'categories', 'locations', 'jobs', 'articles'));
    }

    public function cv($id){
        $seeker = Seeker::findOrFail($id);
        return view('frontend.pages.templates.cv', compact('seeker'));
    }

    
    public function downloadCv($id)
    {
        $seeker = Seeker::findOrFail($id);
        $pdf = PDF::loadView('frontend.pages.templates.cv', compact('seeker'));
        return $pdf->download('cv.pdf');
    }

    public function blog(){
        $ads = Advertisement::all();
        $articles = Article::all();
        return view('frontend.pages.blog', compact('ads', 'articles'));
    }

    public function blogDetail($id){
        $ads = Advertisement::all();
        $article = Article::findOrFail($id);
        return view('frontend.pages.blog-detail', compact('ads', 'article'));
    }

    public function candidates(){
        $ads = Advertisement::all();
        $candidates = Seeker::all();
        return view('frontend.pages.candidates', compact('ads', 'candidates'));
    }

    public function companies(){
        $ads = Advertisement::all();
        $companies = Employer::all();
        return view('frontend.pages.companies', compact('ads', 'companies'));
    }


    public function jobs(Request $request) {
        $ads = Advertisement::all();
        $categories = Category::all();
        $locations = Location::all();
    
        $jobs = Job::query();
    
        if ($request->filled('title')) {
            $jobs->where("title", "like", "%" . $request->get("title") . "%");
        }
        if ($request->filled('job_type')) {
            $jobs->whereIn("job_type", $request->get("job_type"));
        }
        if ($request->filled('category_id')) {
            $jobs->whereIn("category_id", (array) $request->get("category_id"));
        }
        if ($request->filled('location_id')) {
            $jobs->where("location_id", $request->get("location_id"));
        }
        if ($request->filled('job_posted')) {
            $postedDays = [
                'all' => now()->subDays(365),
                '1' => now()->subDay(),
                '7' => now()->subDays(7),
                '30' => now()->subDays(30),
            ];
            $jobs->where('created_at', '>=', $postedDays[$request->get('job_posted')]);
        }
    
        $jobs = $jobs->where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(12);
    
        return view('frontend.jobs.all-jobs', compact('ads', 'jobs', 'categories', 'locations'));
    }
    
    
    

    public function jobsDetail($id){
        $ads = Advertisement::all();
        $job = Job::findOrFail($id);
        $simplerJobs = Job::where('category_id', $job->category_id)->where('is_active', 1)->get();
        $highlightJobs = Job::where('highlight', 1)
                    ->where('is_active', 1)
                    ->take(6)
                    ->get();

        return view('frontend.jobs.detail', compact('ads', 'job', 'simplerJobs', 'highlightJobs'));
    }

    
    public function pricing(){
        $ads = Advertisement::all();
        $memberships = Membership::orderBy("order","asc")->get();
        return view('frontend.pages.pricing', compact('ads', 'memberships'));
    }
}

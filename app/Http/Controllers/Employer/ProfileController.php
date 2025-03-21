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
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($company_name){
        $employer = Employer::where('company_name', '=', $company_name)->with('jobs')->firstOrFail();
        $locations = Location::all();
        $ads = Advertisement::all();
        return view('frontend.employer.profile', compact('employer', 'locations', 'ads'));
    }

    public function jobs($company_name){
        $employer = Employer::where('company_name', '=', $company_name)->firstOrFail();
        $jobs = Job::where('employer_id', '=', $employer->id)->get();

        $categories = Category::all();
        $locations = Location::all();
        $skills = Skill::all();

        $ads = Advertisement::all();
        return view('frontend.employer.post-job', compact('employer', 'jobs', 'categories', 'locations', 'skills', 'ads'));
    }

    public function imageUpdate(Request $request){

        $user = User::findOrFail(auth()->user()->id);

        $validated = $request->validate([
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);
    
         
            // insert Main Image to local file
            $asset_file = $request->file('profile_image');
                    
            $asset_file->move(public_path().'/profile/', $img = rand(1, 1000).time().'.'.$request->profile_image->extension());

            // Delete old main image
            if ($user->image != '') {
                $del_main_image_path = public_path().'/profile/'.$user->image;
                unlink($del_main_image_path);
            }

        

        $user->image = $img;
        $user->save();

        $company = Employer::where('user_id', $user->id)->firstOrFail();

        return redirect()->route('frontend.employer.profile', $company->company_name)->with('success', 'Image successfully updated!');
    }

    public function companyDataUpdate(Request $request)
{
    $company = Employer::where('user_id', auth()->user()->id)->firstOrFail();

    $validated = $request->validate([
        'company_name' => 'required|string|max:255|unique:employers,company_name,' . $company->id,
        'company_website' => 'nullable|string|max:255',
        'phone' => 'nullable|max:255',
        'location_id' => 'nullable',
    ]);

    $company->update([
        'company_name' => $request->company_name,
        'company_website' => $request->company_website,
        'phone' => $request->phone,
        'company_description' => $request->company_description,
        'location_id' => $request->location_id,
    ]);

    return redirect()->route('frontend.employer.profile', $company->company_name)->with('success', 'Company information successfully updated!');
}
}

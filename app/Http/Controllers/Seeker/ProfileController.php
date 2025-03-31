<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobSeeker;
use App\Models\Seeker;
use App\Models\SeekerEducation;
use App\Models\SeekerExperience;
use App\Models\SeekerProject;
use App\Models\Skill;
use App\Models\User;
use App\Models\Employer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{

    //dashboard
    public function dashboard(){
        $leading_employers = Employer::where("is_feature", 1)
        ->inRandomOrder()
        ->limit(4)
        ->get();    
        /* Job Based On Your Profile Feature */
                // Get the seeker associated with the authenticated user
                $seeker = Seeker::where("user_id", Auth::id())->firstOrFail();
                // Convert seeker's skills into an array
                $seekerSkills = explode(', ', $seeker->skills);
        
                // Fetch jobs and prioritize jobs with matching skills
                $jobs = Job::where('is_active', 1)
                ->when($seeker->category_id, function ($query) use ($seeker) {
                    return $query->where("category_id", $seeker->category_id);
                })
                ->get() // Fetch all jobs before sorting
                ->map(function ($job) use ($seekerSkills) {
                    $jobSkills = explode(', ', $job->skills);
                    $job->matchingSkillsCount = count(array_intersect($seekerSkills, $jobSkills));
                    return $job;
                })
                ->sortByDesc('matchingSkillsCount') // Sort by matching skills
                ->values(); // Re-index array
    
            // Convert collection to a paginator
            $perPage = 10;
            $currentPage = request()->get('page', 1); // Get current page
            $paginatedJobs = new \Illuminate\Pagination\LengthAwarePaginator(
                $jobs->forPage($currentPage, $perPage),
                $jobs->count(),
                $perPage,
                $currentPage,
                ['path' => request()->url()] // Maintain pagination links
            );
    
        return view('frontend.seeker.dashboard', compact('leading_employers',"paginatedJobs","jobs"));
    }

    //index
    public function index(){
        $user = User::where('role', '=', 'seeker')->where('id', auth()->user()->id)->first();
        $seeker = $user->seeker;
        $myJobs = JobSeeker::where('seeker_id', $user->seeker->id)->paginate(8);
        $skills = Skill::all();
        return view('frontend.seeker.profile', compact('user', 'myJobs', 'seeker', 'skills'));
    }

    //appliedJobs
    public  function appliedJobs(){
        $user = User::where('role', '=', 'seeker')->where('id', auth()->user()->id)->first();
        $seeker = $user->seeker;
        $myJobs = JobSeeker::where('seeker_id', $user->seeker->id)->paginate(15);
        return view('frontend.seeker.applied_jobs', compact('user', 'myJobs', 'seeker'));
    }

    //jobBasedOnProfile
    public function jobBasedOnProfile(){
        // Get the seeker associated with the authenticated user
        $seeker = Seeker::where("user_id", Auth::id())->firstOrFail();
        // Convert seeker's skills into an array
        $seekerSkills = explode(', ', $seeker->skills);

        // Fetch jobs and prioritize jobs with matching skills
        $jobs = Job::where('is_active', 1)
            ->when($seeker->category_id, function ($query) use ($seeker) {
                return $query->where("category_id", $seeker->category_id);
            })
            ->get() // Fetch all jobs before sorting
            ->map(function ($job) use ($seekerSkills) {
                $jobSkills = explode(', ', $job->skills);
                $job->matchingSkillsCount = count(array_intersect($seekerSkills, $jobSkills));
                return $job;
            })
            ->sortByDesc('matchingSkillsCount') // Sort by matching skills
            ->values(); // Re-index array

        // Convert collection to a paginator
        $perPage = 15;
        $currentPage = request()->get('page', 1); // Get current page
        $paginatedJobs = new \Illuminate\Pagination\LengthAwarePaginator(
            $jobs->forPage($currentPage, $perPage),
            $jobs->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url()] // Maintain pagination links
        );

        return view('frontend.seeker.job_based_on_profile', compact("paginatedJobs"));
    }

    public function imageUpdate(Request $request)
    {
        $user = auth()->user();
    
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);
    
        // Store the new image
        $asset_file = $request->file('profile_image');
        $filename = uniqid() . '.' . $asset_file->getClientOriginalExtension();
        $asset_file->move(public_path('profile'), $filename);
    
        // Delete old image if exists
        if ($user->image && file_exists(public_path('profile/' . $user->image))) {
            unlink(public_path('profile/' . $user->image));
        }
    
        // Update user image
        $user->image = $filename;
        $user->save();
    
        return redirect()->back()->with('success', 'Profile image updated successfully!');
    }
    
    public function imageDelete()
    {
        $user = auth()->user();
    
        if ($user->image && file_exists(public_path('profile/' . $user->image))) {
            unlink(public_path('profile/' . $user->image));
        }
    
        $user->image = null;
        $user->save();
    
        return redirect()->back()->with('success', 'Profile image deleted successfully!');
    }
    
    
    public function updateSkill(Request $request)
    {
        // dd($request->all());
        // Validate request data
        
        $seeker = Seeker::findOrFail(auth()->user()->seeker->id);
        if(!$request->skills){
            $seeker->update([
                "skills" => "",
            ]);
            return redirect()->back()->with('success', 'Remove all Skill successfully !');
        }
        $seeker->update([
            "skills" => "",
        ]);
        // Create seeker
        $seeker->update([
            // Add other fields here
            'skills' => implode(', ', $request->input('skills')),
        ]);

        return redirect()->back()->with('success', 'Skills successfully updated!');
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact_number' => 'nullable|string|max:20',  
            'category_id' => 'nullable',  
        ]);

        $user = auth()->user();
        $user->update(['email' => $request->email]);

        $seeker = $user->seeker;
        $seeker->update($request->only(['full_name', 'contact_number', 'headline', 'summary','category_id']));

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    // Experiences
    public function storeExperience(Request $request)
    {
        $experience = new SeekerExperience;
        $experience->seeker_id = auth()->user()->seeker->id;
        $experience->title = $request->title;
        $experience->company = $request->company;
        $experience->start_date = $request->start_date;
        $experience->end_date = $request->end_date;
        $experience->save();

        // return response()->json(['experience' => $experience], 200);
        return redirect()->back()->with('success', 'Add new Experience  successfully!');
    }

    public function updateExperience(Request $request)
    {
        $experience = SeekerExperience::find($request->experience_id);
        if ($experience) {
            $experience->title = $request->title;
            $experience->company = $request->company;
            $experience->start_date = $request->start_date;
            $experience->end_date = $request->end_date;
            $experience->save();

            return response()->json(['experience' => $experience], 200);
        }

        return response()->json(['message' => 'Experience not found'], 404);
    }

    public function deleteExperience(Request $request)
    {
        // dd($request->all());
        $experience = SeekerExperience::find($request->experience_id);
        if ($experience) {
            $experience->delete();
            return redirect()->back()->with('success', 'Experience  Delete Success!');
        }

        // return response()->json(['message' => 'Experience not found'], 404);
        return redirect()->back()->with('success', 'Experience  Delete Fail!');
    }

    // Educations
    public function storeEducation(Request $request)
    {
        $education = new SeekerEducation;
        $education->seeker_id = auth()->user()->seeker->id;
        $education->degree = $request->degree;
        $education->institution = $request->institution;
        $education->start_date = $request->start_date;
        $education->end_date = $request->end_date;
        $education->save();

        // return response()->json(['education' => $education], 200);

        return redirect()->back()->with('success', 'Add new Education  successfully!');
    }

    public function updateEducation(Request $request)
    {
        $education = SeekerEducation::find($request->education_id);
        if ($education) {
            $education->degree = $request->degree;
            $education->institution = $request->institution;
            $education->start_date = $request->start_date;
            $education->end_date = $request->end_date;
            $education->save();

            return response()->json(['education' => $education], 200);
        }

        return response()->json(['message' => 'Education not found'], 404);
    }

    public function deleteEducation(Request $request)
    {
        $education = SeekerEducation::find($request->education_id);
        if ($education) {
            $education->delete();
            // return response()->json(['message' => 'Education deleted successfully'], 200);
            return redirect()->back()->with('success', 'Education deleted successfully');
        }
        return redirect()->back()->with('success', 'Education deleted fail');
        //return response()->json(['message' => 'Education not found'], 404);
    }

    // Projects
    public function storeProject(Request $request)
    {
        $project = new SeekerProject;
        $project->seeker_id = auth()->user()->seeker->id;
        $project->title = $request->title;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->save();

        // return response()->json(['project' => $project], 200);
        return redirect()->back()->with('success', 'Add new Project  successfully!');
    }

    public function updateProject(Request $request)
    {
        $project = SeekerProject::find($request->project_id);
        if ($project) {
            $project->title = $request->title;
            $project->description = $request->description;
            $project->start_date = $request->start_date;
            $project->end_date = $request->end_date;
            $project->save();

            return response()->json(['project' => $project], 200);
        }

        return response()->json(['message' => 'Project not found'], 404);
    }

    public function deleteProject(Request $request)
    {
        $project = SeekerProject::find($request->project_id);
        if ($project) {
            $project->delete();
            // return response()->json(['message' => 'Project deleted successfully'], 200);
            return redirect()->back()->with('success', 'Project deleted success');
        }

        // return response()->json(['message' => 'Project not found'], 404);
        return redirect()->back()->with('success', 'Project deleted fail');
    }

    
}
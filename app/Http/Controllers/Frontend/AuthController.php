<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Employer;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Models\Seeker;

class AuthController extends Controller
{
    public function register(){
        return view('frontend.auth.register');
    }
    public function jobRegisterEmployer(){
        return view('frontend.auth.employer-register');
    }
    public function jobRegisterSeeker(){
        return view('frontend.auth.seeker-register');
    }

    public function jobRegisterEmployerStore(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255', 'unique:employers'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Create a new user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => 'employer',
            'password' => Hash::make($validatedData['password']),
        ]);


        $memership = Membership::where("price",0)->firstOrFail();
        $employer =  Employer::create([
            'company_name' => $validatedData['company_name'],
            'user_id' => $user->id,
            'total_jobs' => $memership->total_job,
            'total_highlights' =>  $memership->highlight_job,
            'membership_name' => "$memership->title",
            "is_feature" => $memership->is_feature_company,
            "pre_question" => $memership->pre_question,
            "auto_match"  => $memership->auto_match,
            "bulk_cvs" => $memership->bluk_cvs
        ]);

        

        // Log the user in
        auth()->login($user);

        // Redirect to the desired location
        return redirect()->route('frontend.employer.profile', ['company_name' => $employer->company_name]);
    }


    public function googleSSO(){
        $googleUser = Socialite::driver('google')->stateless()->user(); // Add stateless()
    
        // Find or create the user
        $user = User::updateOrCreate([
            'email' => $googleUser->getEmail(),
        ], [
            'name' => $googleUser->getName(),
            'google_id' => $googleUser->getId(),
            'password' => bcrypt('password'),
            'role' => "seeker"
        ]);
        
        $alreadyExsitsOrNot = Seeker::where("user_id",$user->id)->count();
        if($alreadyExsitsOrNot == 0){
            Seeker::create([
                'user_id' => $user->id,
                'viber_number' => null,
                'full_name' => $user->name,
            ]);
        }
       
    
        auth()->login($user);
    
        return redirect('/redirect/auth');
    }
    
    
}
 
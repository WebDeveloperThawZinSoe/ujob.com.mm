<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class RedirectController extends Controller
{
    //redirect
    public function redirect(){
        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return  redirect("/admin");
            }else if(Auth::user()->role == 'employer'){
                return  redirect("/employer/dashboard");
            }else if(Auth::user()->role == 'seeker'){
                return  redirect("/seeker/dashboard");
            }
        }else{
            return  redirect("/login");
        }
    }

    //changePassword
    public function changePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => [
                'required',
                'min:6',
                'confirmed', // Ensures 'new_password_confirmation' matches
            ],
        ], [
            'new_password.confirmed' => 'The new password and confirm password must match.',
            'new_password.min' => 'The new password must be at least 6 characters long.',
        ]);
    
        $user = Auth::user();
    
        // Check if old password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Old password is incorrect.');
        }
    
        // Update password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);
    
        return back()->with('success', 'Password successfully updated.');
    }

}

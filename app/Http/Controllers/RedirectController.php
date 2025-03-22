<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
                return  redirect("/seeker/profile");
            }
        }else{
            return  redirect("/login");
        }
    }
}

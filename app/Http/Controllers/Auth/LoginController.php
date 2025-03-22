<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/redirect/auth';
//     protected function redirectTo()
// {
//     // Get the authenticated user
//     $user = Auth::user();

//     // Check user role and redirect accordingly
//     if ($user->role == 'seeker') {
//         return '/'; // Redirect user to home
//     } elseif ($user->role == 'employer') {
//         return '/'; // Redirect employer to employer dashboard
//     } elseif ($user->role == 'admin') {
//         return '/admin'; // Redirect admin to admin dashboard
//     }
// }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

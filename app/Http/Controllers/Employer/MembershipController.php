<?php

namespace App\Http\Controllers\Employer;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Membership;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function checkout($id){
        $membership = Membership::findOrFail($id);
        return view('frontend.employer.checkout', compact('membership'));

    }

    public function membershipApply(Request $request)
    {
        $membership = Membership::findOrFail($request->membership_id);
        $request->validate([
            'membership_id' => 'required',
            'user_name' => 'required|max:255',
            'user_email' => 'required|max:255|email',
            'user_phone' => 'required|not_regex:/[a-z]/',
            'payment_asset' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:10200'
        ]);

        // If payment option is Online Payment, upload payment asset
       
            $main_image_name = $request->file('payment_asset');
            $img = rand(1, 1000) . time() . '.' . $request->payment_asset->extension();
            $main_image_name->move(public_path() . '/payment', $img);
        

        // Insert sale data into database
        $sale = new Sale();

        
        $sale->order_number = uniqid() . rand(1, 1000) . time();
        $sale->membership_id = $membership->id;
        $sale->payment_asset = $img;
        $sale->user_name = $request->user_name;
        $sale->user_email = $request->user_email;
        $sale->user_phone = $request->user_phone;
        $sale->user_note = $request->user_note;
        $sale->user_id = auth()->user()->id;
        $sale->status = "Pending";
        $sale->save();

        return redirect()->route("frontend.membership.apply.success");
    }
    public function checkoutSuccess(){
        return view('frontend.employer.checkout_success');
    }

    
    public function showMembership(){
        $user = User::findOrFail(auth()->user()->id);
        $sales = Sale::where('user_id', '=', auth()->user()->id)->get();
        $jobs = Job::where('employer_id', '=', $user->employer->id)->get();
        $jobsHighlight = Job::where('employer_id', '=', $user->employer->id)->where('highlight', 1)->get();
        $ads = Advertisement::all();
        return view('frontend.employer.memberships', compact('user', 'sales', 'ads', 'jobs', 'jobsHighlight'));
    }
}

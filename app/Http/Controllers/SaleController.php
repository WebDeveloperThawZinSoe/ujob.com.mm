<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return view('admin.orders.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sale = Sale::find($id);
        return view('admin.orders.view', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sale = Sale::find($id);

        $validated = $request->validate([
            'status' => 'required|max:255'
        ]);

        if($request->status == 'Completed'){

            
            $user = User::find($sale->user_id); // Assuming User model for seller
            $employer = Employer::find($user->employer->id);
            $employer->membership_name = $sale->membership->title;
            $employer->total_highlights  = $sale->membership->highlight_job;
            $employer->total_jobs = $sale->membership->total_job;
            $employer->	is_feature = $sale->membership->is_feature_company;
            $employer->pre_question = $sale->membership->pre_question;
            $employer->auto_match = $sale->membership->bluk_cvs;
            $employer->bulk_cvs = $sale->membership->auto_match;
            $employer->save();
            

            $sale->status = $request->status;
            $sale->save();

        }elseif($request->status == 'Pending' || $request->status == 'Pending'){

            $sale->status = $request->status;
            $sale->save();

        }


        return redirect()->back()->with('success', 'Order updated status successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        $sale->delete();
        return redirect()->back()->with('success', 'Order Record - ပယ်ဖျက်ပြီးပါပြီ။');
    }
}

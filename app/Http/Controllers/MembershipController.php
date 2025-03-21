<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('admin.memberships.index', compact('memberships'));
    }

    // order default
    public function order(){
        if(Membership::count() == 0){
            return 1;
        }else{
            return Membership::max('order') + 1;
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'order' => 'unique:memberships',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        // insert Main Image to local file
        $main_image_name = $request->file('image');
            
        $main_image_name->move(public_path().'/memberships/', $img = rand(1, 1000).time().'.'.$request->image->extension());

    
        $memberships = new Membership();
        $memberships->title = $request->title;
        $memberships->image = $img;
        $memberships->short_detail = $request->short_detail;
        $memberships->summary = $request->summary;
        $memberships->order = $request->order ?? $this->order();
        $memberships->save();

        return redirect()->back()->with('success', 'Membership successfully created!');
    }

    public function edit($id)
    {
        $membership = Membership::find($id);
            
        return view('admin.memberships.edit', compact('membership'));
    }

    
    public function update(Request $request, $id)
    {
        $membership = Membership::find($id);

        $validated = $request->validate([
            
            'order' => 'unique:memberships,order,'.$membership->id,
            'title' => 'required|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);

        // edit Main image
        if($request->image != ''){
            // insert Main Image to local file
            $asset_file = $request->file('image');
                    
            $asset_file->move(public_path().'/memberships/', $img = rand(1, 1000).time().'.'.$request->image->extension());

            // Delete old main image
            if ($membership->image != '') {
                $del_main_image_path = public_path().'/memberships/'.$membership->image;
                unlink($del_main_image_path);
            }

        }else{
            $img = $membership->image_url;
        }
    
        $membership->title = $request->title;
        $membership->image = $img;
        $membership->short_detail = $request->short_detail;
        $membership->summary = $request->summary;
        $membership->order = $request->order ?? $this->order();
        $membership->save();

        return redirect()->back()->with('success', 'Membership - '. $request->name .' - successfully updated!');
    }

    
    public function destroy($id)
    {
        $membership = Membership::find($id);

        if ($membership->image_url != '') {
            $del_main_image_path = public_path().'/memberships/'.$membership->image;
            unlink($del_main_image_path);
        }

        $membership->delete();
        return redirect()->back()->with('success', 'Membership - successfully deleted!');
    }
}

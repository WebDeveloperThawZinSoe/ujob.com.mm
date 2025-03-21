<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advertisements = Advertisement::all();
        return view('admin.advertisements.index', compact('advertisements'));
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'image_url' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'target_url' => 'required|max:255',
            'location' => 'required|max:255',
        ]);

        // insert Main Image to local file
        $main_image_name = $request->file('image_url');
            
        $main_image_name->move(public_path().'/ads/', $img = rand(1, 1000).time().'.'.$request->image_url->extension());

    
        $advertisements = new Advertisement();
        $advertisements->title = $request->title;
        $advertisements->image_url = $img;
        $advertisements->target_url = $request->target_url;
        $advertisements->location = $request->location;
        $advertisements->start_date = $request->start_date;
        $advertisements->end_date = $request->end_date;
        $advertisements->save();

        return redirect()->back()->with('success', 'Advertisement successfully created!');
    }

    public function edit($id)
    {
        $advertisement = Advertisement::find($id);
            
        return view('admin.advertisements.edit', compact('advertisement'));
    }

    
    public function update(Request $request, $id)
    {
        $advertisement = Advertisement::find($id);

        $validated = $request->validate([
            'title' => 'required|max:255',
            'image_url' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'target_url' => 'required|max:255',
            'location' => 'required|max:255',
        ]);
    
         // edit Main image
        if($request->image_url != ''){
            // insert Main Image to local file
            $asset_file = $request->file('image_url');
                    
            $asset_file->move(public_path().'/ads/', $img = rand(1, 1000).time().'.'.$request->image_url->extension());

            // Delete old main image
            if ($advertisement->image_url != '') {
                $del_main_image_path = public_path().'/ads/'.$advertisement->image_url;
                unlink($del_main_image_path);
            }

        }else{
            $img = $advertisement->image_url;
        }

        $advertisement->title = $request->title;
        $advertisement->image_url = $img;
        $advertisement->target_url = $request->target_url;
        $advertisement->location = $request->location;
        $advertisement->start_date = $request->start_date;
        $advertisement->end_date = $request->end_date;
        $advertisement->save();

        return redirect()->back()->with('success', 'Advertisement - '. $request->title .' - successfully updated!');
    }

    
    public function destroy($id)
    {
        $advertisement = Advertisement::find($id);

        if ($advertisement->image_url != '') {
            $del_main_image_path = public_path().'/ads/'.$advertisement->image_url;
            unlink($del_main_image_path);
        }
        
        $advertisement->delete();
        return redirect()->back()->with('success', 'Advertisement - successfully deleted!');
    }
}

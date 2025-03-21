<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return view('admin.locations.index', compact('locations'));
    }

    // order default
    public function order(){
        if(Location::count() == 0){
            return 1;
        }else{
            return Location::max('order') + 1;
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'unique:locations',
        ]);
    
        $locations = new Location();
        $locations->name = $request->name;
        $locations->order = $request->order ?? $this->order();
        $locations->save();

        return redirect()->back()->with('success', 'Location successfully created!');
    }

    public function edit($id)
    {
        $location = Location::find($id);
            
        return view('admin.locations.edit', compact('location'));
    }

    
    public function update(Request $request, $id)
    {
        $location = Location::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'unique:locations,order,'.$location->id,
        ]);
    
        $location->name = $request->name;
        $location->order = $request->order ?? $this->order();
        $location->save();

        return redirect()->back()->with('success', 'Location - '. $request->name .' - successfully updated!');
    }

    
    public function destroy($id)
    {
        $location = Location::find($id);

        $location->delete();
        return redirect()->back()->with('success', 'Location - successfully deleted!');
    }
}

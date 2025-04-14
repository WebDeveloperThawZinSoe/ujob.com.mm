<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Images;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index()
    {
        $images = Images::latest()->get();
        return view('admin.images.index', compact('images'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|max:255',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            'url' => 'nullable|max:255',
            'type' => 'required|max:255'
        ]);

        $main_image = $request->file('image');
        $img_name = rand(1, 1000) . time() . '.' . $main_image->extension();
        $main_image->move(public_path('ads'), $img_name);

        $image = new Images();
        $image->title = $request->title;
        $image->image = $img_name;
        $image->url = $request->url;
        $image->type = $request->type ?? 'banner';
        $image->save();

        return redirect()->back()->with('success', 'Image successfully uploaded!');
    }

    public function destroy($id)
    {
        $image = Images::findOrFail($id);
        

        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }
}

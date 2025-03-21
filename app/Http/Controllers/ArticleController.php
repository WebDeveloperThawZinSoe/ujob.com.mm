<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){
        $articles = Article::select('id', 'title')->get();
        return view('admin.articles.index', compact('articles'));
    }

    public function create(){
       
        return view('admin.articles.create');
    }

    public function store(Request $request){
        // check validation
        $validated = $request->validate([
            'title' => 'required|max:255',
            'asset' => 'required|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);
    
        // insert Main Image to local file
        $main_image_name = $request->file('asset');
        $main_image_name->move(public_path().'/articles/', $img = rand(1, 1000).time().'.'.$request->asset->extension());

        // inert to database
        $article = new Article();
        $article->title = $request->title;
        $article->asset = $img;
        $article->description = $request->description;
        $article->save();

        return redirect()->route('admin.articles.index')->with('success','(' . $request->name.') Article successfully created!');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.articles.edit', compact('article'));
    }


    public function update(Request $request, $id){

        $article = Article::find($id);

        // check validation
        $validated = $request->validate([
            'title' => 'required|max:255',
            'asset' => 'nullable|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
        ]);
    
        // Edit image
        if($request->asset != ''){
            // insert Main Image to local file
            $asset_file = $request->file('asset');
                    
            $asset_file->move(public_path().'/articles/', $img = rand(1, 1000).time().'.'.$request->asset->extension());
    
            // Delete old main image
            if ($article->asset != '') {
                $del_main_image_path = public_path().'/articles/'.$article->asset;
                unlink($del_main_image_path);
            }
    
        }else{
            $img = $article->asset;
        }

        // inert to database
        $article->title = $request->title;
        $article->asset = $img;
        $article->description = $request->description;
        $article->save();

        return redirect()->back()->with('success','(' . $request->title.') Article successfully Updated!');
    }


    public function destroy($id)
    {
        $article = Article::findOrFail($id);

        // delete image
        $del_main_image_path = public_path().'/articles/'.$article->asset;
        unlink($del_main_image_path);

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Deleted Successfully');
    }
}

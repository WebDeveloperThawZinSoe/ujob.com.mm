<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // order default
    public function order(){
        if(Category::count() == 0){
            return 1;
        }else{
            return Category::max('order') + 1;
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'unique:categories',
        ]);
    
        $categories = new Category();
        $categories->name = $request->name;
        $categories->order = $request->order ?? $this->order();
        $categories->save();

        return redirect()->back()->with('success', 'Category successfully created!');
    }

    public function edit($id)
    {
        $category = Category::find($id);
            
        return view('admin.categories.edit', compact('category'));
    }

    
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'unique:categories,order,'.$category->id,
        ]);
    
        $category->name = $request->name;
        $category->order = $request->order ?? $this->order();
        $category->save();

        return redirect()->back()->with('success', 'Category - '. $request->name .' - successfully updated!');
    }

    
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();
        return redirect()->back()->with('success', 'Category - successfully deleted!');
    }
}

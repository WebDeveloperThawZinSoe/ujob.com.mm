<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('admin.skills.index', compact('skills'));
    }

    // order default
    public function order(){
        if(Skill::count() == 0){
            return 1;
        }else{
            return Skill::max('order') + 1;
        }
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'unique:skills',
        ]);
    
        $skills = new Skill();
        $skills->name = $request->name;
        $skills->order = $request->order ?? $this->order();
        $skills->save();

        return redirect()->back()->with('success', 'Skill successfully created!');
    }

    public function edit($id)
    {
        $skill = Skill::find($id);
            
        return view('admin.skills.edit', compact('skill'));
    }

    
    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);

        $validated = $request->validate([
            'name' => 'required|max:255',
            'order' => 'unique:skills,order,'.$skill->id,
        ]);
    
        $skill->name = $request->name;
        $skill->order = $request->order ?? $this->order();
        $skill->save();

        return redirect()->back()->with('success', 'Skill - '. $request->name .' - successfully updated!');
    }

    
    public function destroy($id)
    {
        $skill = Skill::find($id);

        $skill->delete();
        return redirect()->back()->with('success', 'Skill - successfully deleted!');
    }
}

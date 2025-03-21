<?php

namespace App\Http\Controllers;

use App\Models\JobEmail;
use Illuminate\Http\Request;

class EmailListController extends Controller
{
    public function index()
    {
        $emailLists = JobEmail::all();
        return view('admin.emailLists.index', compact('emailLists'));
    }
    public function destroy($id)
    {
        $emailList = JobEmail::find($id);

        $emailList->delete();
        return redirect()->back()->with('success', 'Email - successfully deleted!');
    }
}

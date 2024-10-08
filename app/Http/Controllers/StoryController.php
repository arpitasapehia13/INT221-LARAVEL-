<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoryController extends Controller
{
    // To display the form
    public function addstory(){
        return view('add-story');
    }

    // To handle form submission
    public function addstorySubmit(Request $request){
        DB::table('stories')->insert([
            'title' => $request->title,
            'body' => $request->body
        ]);
        // Redirect to all stories after submission
        return redirect('allstories');
    }

    // To fetch all stories and display them
    public function getAllStories(){
        $stories = DB::table('stories')->get();  // Corrected DB facade usage
        return view('allstories', compact('stories'));
    }
}

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

    public function singleStory($id)
    {
        // Retrieve the story by ID
        $story = DB::table('stories')->where('id', $id)->first();

        // Pass the story to the view
        return view('single-story', compact('story'));
    }

    public function editStory($id)
    {
        $story = DB::table('stories')->where('id', $id)->first();
    
        // Pass the view name as a string
        return view('edit-story', compact('story'));
    }
    
    public function updateStory($id, Request $request)
    {
        // Update the story in the database
        DB::table('stories')
            ->where('id', $id)
            ->update([
                'title' => $request->title,
                'body' => $request->body
            ]);
    
        // Redirect to the route that lists all stories
        return redirect()->route('getAllStories')->with('success', 'Story updated successfully!');
    }
    
}


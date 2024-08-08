<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeasController extends Controller
{


    public function show(Idea $idea){

        return view('ideas.show',compact('idea'));
    }
    public function edit(Idea $idea){

        return view('ideas.edit',compact('idea'));
    }
    public function update(Request $request, $id)
    {
        $idea = Idea::findOrFail($id);
        $idea->content = $request->input('content');
        $idea->save();

        return redirect()->route('idea.show', $id)->with('success', 'Idea updated successfully!');
    }
    public function store(){

        $validated = request() -> validate([
            'content' => 'required|min:5|max:240'
        ]);
        $validated['user_id'] = auth() -> id();
        $idea = Idea::create($validated);
        return redirect() -> route('dashboard',$idea -> id) -> with ('success','Idea was added successfully');
    }

    public function destroy(Idea $idea){

        $idea -> delete();
        return redirect() -> route('dashboard') -> with ('success','Idea was deleted successfully');
    }
}

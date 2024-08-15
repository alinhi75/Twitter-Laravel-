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


        $this -> authorize('update',$idea);

        return view('ideas.edit',compact('idea'));
    }
    public function update(Request $request, $id)
{
    $idea = Idea::findOrFail($id); // Step 1: Retrieve the Idea model
    $this->authorize('update', $idea); // Step 2: Authorize the update action

    $idea->content = $request->input('content'); // Step 3: Update the content attribute
    $idea->save(); // Step 4: Save the updated Idea model

    return redirect()->route('idea.show', $id)->with('success', 'Idea updated successfully!'); // Step 5: Redirect with success message
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


        $this -> authorize('delete',$idea);

        $idea -> delete();
        return redirect() -> route('dashboard') -> with ('success','Idea was deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\User;
use App\Http\Requests\CreateIdeaRequest;

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
    $idea = Idea::findOrFail($id);
    $this->authorize('update', $idea);

    $idea->content = $request->input('content');
    $idea->save();

    return redirect()->route('idea.show', $id)->with('success', 'Idea updated successfully!'); // Step 5: Redirect with success message
}
    public function store(CreateIdeaRequest $request){



        $validated = $request -> validated();
        $validated['user_id'] = auth() -> id();
        $idea = Idea::create($validated);
        return redirect() -> route('dashboard',$idea -> id) -> with ('success','Idea was added successfully');
    }

    public function destroy(Idea $idea){

        //if the admin delete idea redirect to admin panel
        if(auth() -> user() -> is_admin == 1){
            $idea -> delete();
            return redirect() -> route('admin.ideas.index') -> with ('success','Idea was deleted successfully');
        }

        $this -> authorize('delete',$idea);

        $idea -> delete();

        return redirect() -> route('dashboard') -> with ('success','Idea was deleted successfully');
    }
}

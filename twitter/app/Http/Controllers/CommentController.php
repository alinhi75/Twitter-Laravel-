<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Idea;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request,Idea $idea) {

        $request->validated();

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = $request->get('content');
        $comment -> save();


        return redirect()->route('idea.show', $idea->id)->with('success', 'Comment was posted successfully');


    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(){

        $comments = Comment::latest()->paginate(5);
        return view('admin.comments.index',compact('comments'));
    }

    public function destroy(Comment $comment){
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success','Comment deleted successfully');
    }
}

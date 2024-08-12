<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        $liker = auth()->user();
        $idea->likes()->attach($liker);

        return redirect()->route('users.show', $liker->id)->with('success', 'Liked Successfully!');
    }
    public function unlike(Idea $idea)
    {
        $liker = auth()->user();
        $idea->likes()->detach($liker);

        return redirect()->route('users.show', $liker->id)->with('success', 'Unliked Successfully!');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user)

    {

        auth()->user()->follow($user);
        return redirect()->route('users.show', $user->id)->with('success', 'Followed Successfully!');

    }

    public function unfollow(User $user)
    {
        auth()->user()->unfollow($user);
        return redirect()->route('users.show', $user->id)->with('success', 'Unfollowed Successfully!');

    }
}

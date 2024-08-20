<?php

namespace App\Http\Controllers;
use App\Models\Idea;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)

    {

        $userId = auth()->id();
        $followingIDs = auth()->user()->followings()->pluck('user_id')->push($userId);

        $ideas = Idea::when($request->has('search'), function ($query) {
            $query->search(request('search',''));
        })->whereIn('user_id', $followingIDs)->latest();

        return view('dashboard', [
            'ideas' => $ideas->paginate(3),
        ]);
    }
}

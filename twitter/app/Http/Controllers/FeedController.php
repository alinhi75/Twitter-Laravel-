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
        // Get the authenticated user's ID
        $userId = auth()->id();

        // Get the IDs of the users the authenticated user is following
        $followingIDs = auth()->user()->followings()->pluck('user_id');

        // Include the authenticated user's ID in the collection
        $followingIDs->push($userId);

        // Fetch ideas where the user_id is in the updated $followingIDs collection
        $ideas = Idea::whereIn('user_id', $followingIDs)->latest();

        // Apply search filter if present
        if ($request->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . $request->get('search', '') . '%');
        }

        // Return the view with paginated ideas
        return view('dashboard', [
            'ideas' => $ideas->paginate(3),
        ]);
    }
}

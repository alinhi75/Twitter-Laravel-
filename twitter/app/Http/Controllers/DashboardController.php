<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Idea;
use App\Models\User;
class DashboardController extends Controller
{
    public function index() {


        $ideas = Idea::orderby('created_at','DESC');

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search','').'%') ;
        }
        // count the number of ideas for each user
        $topUsers = User::withCount('ideas')
        ->orderBy('ideas_count','desc')
        ->take(5)->get();

        return view('dashboard',[
            'ideas' => $ideas->paginate(3),
            'topUsers' => $topUsers
        ]);
    }
}

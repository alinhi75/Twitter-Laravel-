<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Idea;
class DashboardController extends Controller
{
    public function index() {
        $ideas = Idea::orderby('created_at','DESC');

        if (request()->has('search')) {
            $ideas = $ideas->where('content', 'like', '%' . request()->get('search','').'%') ;
        }

        return view('dashboard',[
            'ideas' => $ideas->paginate(3),
        ]);
    }
}

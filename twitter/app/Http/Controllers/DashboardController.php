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
            $ideas = $ideas->search(request('search', ''));
        }


        return view('dashboard',[
            'ideas' => $ideas->paginate(3),
        ]);
    }
}

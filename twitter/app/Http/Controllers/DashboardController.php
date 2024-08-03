<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Idea;
class DashboardController extends Controller
{
    public function index() {

        $idea = new Idea([
            'content' => 'Hello this is my first idea',
            'likes' => 0
        ]);
        $idea->save();

        dump(Idea::all());
        return view('dashboard',[
            'ideas' => Idea::orderBy('created_at','DESC')->get()
        ]);
    }
}




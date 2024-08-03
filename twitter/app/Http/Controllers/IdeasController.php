<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class IdeasController extends Controller
{
    public function store(){
        $idea = Idea::create([
            'content' => request()->get('idea','')
        ]);
        return redirect() -> route('dashboard');
    }
}

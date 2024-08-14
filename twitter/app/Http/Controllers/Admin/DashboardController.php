<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if(!auth()->user()->is_admin){
            abort(403,'You are not allowed to access this page');
        }
        return view('admin.dashboard');
    }
}

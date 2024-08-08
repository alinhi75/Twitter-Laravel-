<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(){

        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:40|confirmed',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);


        return redirect()->route('dashboard') -> with('success', 'Your account has been created successfully');



    }
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(){

        // dd(request()->all());

        $validated = request()->validate(
            [

            'email' => 'required|email',
            'password' => 'required|min:8|max:40',
        ]
    );

    if(auth()->attempt($validated)){

        request()->session()->regenerate();

        return redirect()->route('dashboard') -> with('success', 'You have been logged in successfully');
    }


    return redirect()->route('login') -> witherror([
        'email' => 'Your provided credentials could not be matched'
    ]);

    }
    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect()->route('dashboard') -> with('success', 'You have been logged out successfully');
    }

}

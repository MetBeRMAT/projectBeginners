<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function store(){
        $validated = request()->validate([
            'name' =>'required|min:3|max:255',
            'email' =>'required|email|unique:users,email',
            'password' =>'required|min:8|confirmed',
        ]);

        User::create($validated);

        return redirect()->route('home');
    }

    public function login(){
        return view('auth.login');
    }

    public function authenticate(){
        $validated = request()->validate([
            'email' =>'required|email',
            'password' =>'required|min:8',
        ]);

        auth()->attempt($validated);

        return redirect()->route('home')->with('success', 'You are now logged in!');
    }

    public function logout(){
        auth()->logout();

        return redirect()->route('home')->with('success', 'You are now logged out!');
    }
}

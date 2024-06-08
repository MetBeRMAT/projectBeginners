<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return view('components.auth.register');
    }

    public function store()
    {
        $validate = request()->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create($validate);

        return redirect()->route('dashboard')->with('success', 'Welcome!');
    }

    public function login()
    {
        return view('components.auth.login');
    }

    public function authentication()
    {
        $validate = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (auth()->attempt($validate)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'Login successfully!');
        }

        return redirect()->back()->with('error', 'Authentication failed');
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('dashboard')->with('success', 'Logout successfully!');
    }
}

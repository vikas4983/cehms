<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function home()
    {
        $user = auth()->user();

        if ($user && $user->hasRole('admin')) {
            return redirect()->route('dashboard');
        }
        if ($user && $user->hasRole('user')) {
            return redirect()->route('user.dashboard');
        }

        return view('frontends.home');
    }
    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }
}

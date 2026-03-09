<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return redirect()->route('user.dashboard');
    }
    public function userDashboard()
    {
        $user = auth()->user();
        unset($user->password, $user->email, $user->mobile);
        return view('welcome', compact('user'));
    }
    public function adminDashboard()
    {
        return view('dashboard');
    }
}

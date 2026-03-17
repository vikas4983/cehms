<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Permission;
use App\Models\User;
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
        $todayStudents = User::todayStudents()->take(7)->get();
        $weeklyStudents = User::weeklyStudents()->take(7)->get();
        $books = Book::active()->take(7)->get();
     

        return view('dashboard',compact('todayStudents', 'weeklyStudents','books'));
    }
}

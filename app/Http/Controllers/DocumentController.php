<?php

namespace App\Http\Controllers;

use GuzzleHttp\Middleware;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public static function middleware(): array
    {
        return [new Middleware('permission:view document', only: ['index', 'show'])];
    }

    public function view(Request $request, $path)
    {
        if (Storage::disk('public')->exists($path)) {
            return response()->file(storage_path('app/public/' . $path));
        }

        return redirect()->back()->with('error', 'Something went wrong');
    }
}

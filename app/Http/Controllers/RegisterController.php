<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStudentRequest;
use App\Models\Testimonial;
use App\Models\User;
use App\traits\AssignRoleOrPermission;
use App\traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    use UploadTrait;
    use AssignRoleOrPermission;
    public function register()
    {
        if (!auth()->check()) {
            return view('register');
        }
        return 'User Dashboard';
    }

    public function storeStudent(RegisterStudentRequest $request)
    {
        $validatedData = $request->validated();
        DB::beginTransaction();
        try {
            if ($request->hasFile('image')) {
                $validatedData['image'] = $this->upload($request->file('image'));
            }
            if ($request->hasFile('10th_marksheet')) {
                $validatedData['10th_marksheet'] = $request->file('10th_marksheet')->store('marksheets/tenth', 'public');
            }
            if ($request->hasFile('12th_marksheet')) {
                $validatedData['12th_marksheet'] = $request->file('12th_marksheet')->store('marksheets/twelfth', 'public');
            }
            $user = User::create($validatedData);
            $this->assignRole($user);
            $this->assignPermissionForUser($user);
            Auth::login($user);
            DB::commit();
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            Log::error('Student creation failed', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            DB::rollback();
            return redirect()->back()->with('error', 'Something went wrong');
        }

        return redirect()->route('dashboard');
    }

    public function admissionForm($path)
    {
        if (Storage::disk('public')->exists($path)) {
            return response()->file(storage_path('app/public/' . $path));
        }
      return redirect()->back()->with('error', 'Something went wrong');
      
    }

    public function testimonial(Request $request)
    {
        $testimonials = Testimonial::ActiveTetimonials()->paginate(20);
        return view('testimonial', compact('testimonials'));
    }
}

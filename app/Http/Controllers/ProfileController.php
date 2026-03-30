<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterStudentRequest;
use App\Http\Requests\StudentCreateRequest;
use App\Models\User;
use App\traits\UploadTrait;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public static function middleware(): array
    {
        return [new Middleware('permission:view-student', ['only' => ['myProfile']]), new Middleware('permission:edit-student', ['only' => ['editProfile']]), new Middleware('permission:edit-student', ['only' => ['updateProfile']])];
    }
    use UploadTrait;
    public function myProfile(Request $request)
    {
        $student = auth()->user();
        if (!$student) {
            return redirect()->route('login');
        }
        return view('students.show', compact('student'));
    }

    public function editProfile(Request $request)
    {
        $student = Auth()->user();
        if (!$student) {
            return redirect()->route('login');
        }
        return view('students.edit', compact('student'));
    }
    public function updateProfile(RegisterStudentRequest $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        $validatedData = $request->validated();
        $user = User::findOrFail(auth()->user()->id);

        if ($request->hasFile('image')) {
            if ($user && $user->image) {
                $this->imageExist($user->image);
            }
            $validatedData['image'] = $this->upload($request->file('image'));
        }

        if ($request->hasFile('10th_marksheet')) {
            if ($user && $user->{'10th_marksheet'}) {
                $this->imageExist($user->{'10th_marksheet'});
            }
            $validatedData['10th_marksheet'] = $request->file('10th_marksheet')->store('marksheets/tenth', 'public');
        }

        if ($request->hasFile('12th_marksheet')) {
            if ($user && $user->{'12th_marksheet'}) {
                $this->imageExist($user->{'12th_marksheet'});
            }
            $validatedData['12th_marksheet'] = $request->file('12th_marksheet')->store('marksheets/twelfth', 'public');
        }

        $user->update($validatedData);
        return redirect()->route('my.profile')->with('success', 'Student has been updated successfully');
    }
}

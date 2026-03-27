<?php

namespace App\Http\Controllers;

use App\Http\Requests\OldStudentCreateRequest;
use App\Models\OldStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OldStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $oldStudents = OldStudent::allStudents()->paginate(20);

        return view('oldStudents.index', compact('oldStudents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OldStudentCreateRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['registration_no'] = OldStudent::LastRegistrationNo();
        OldStudent::create($validatedData);
        return redirect()->back()->with('success', 'Student has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(OldStudent $oldStudent)
    {
        return view('oldStudents.show', compact('oldStudent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OldStudent $oldStudent)
    {
        return view('oldStudents.edit', compact('oldStudent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OldStudentCreateRequest $request, OldStudent $oldStudent)
    {
        $validatedData = $request->validated();
        $oldStudent->update($validatedData);
        return redirect()->route('oldStudents.index')->with('success', 'Student has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OldStudent $oldStudent)
    {
        $oldStudent->delete();
        return redirect()->back()->with('error', 'Student has been deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnquiryCreateRequest;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enquiries = Enquiry::allEnquiries()->paginate(20);
        return view('enquiries.index', compact('enquiries'));
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
    public function store(EnquiryCreateRequest $request)
    {
        $validatedData = $request->all();
        Enquiry::firstOrCreate(
            [
                'email' => $validatedData['email'],
                'mobile' => $validatedData['mobile'],
            ],
            $validatedData,
        );
        return redirect()->back()->with('success', 'Enquiry has been placed.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enquiry $enquiry)
    {
        return view('enquiries.edit', compact('enquiry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EnquiryCreateRequest $request, Enquiry $enquiry)
    {
        $validatedData = $request->validated();
        $enquiry->update($validatedData);
        return redirect()->route('enquiries.index')->with('success', 'Enquiry has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();
        return redirect()->back()->with('error', 'Enquiry has been deleted successfully.');
    }
}

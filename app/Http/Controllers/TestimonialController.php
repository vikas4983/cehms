<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialCreateRequest;
use App\Models\Testimonial;
use App\traits\UploadTrait;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [new Middleware('permission:view-testimonial', ['only' => ['index', 'show']]), new Middleware('permission:create-testimonial', ['only' => ['create', 'store']]), new Middleware('permission:edit-testimonial', ['only' => ['edit', 'update']]), new Middleware('permission:delete-testimonial', ['only' => ['destroy']])];
    }
    public function index()
    {
        $testimonials = Testimonial::allTestimonials()->get();
        return view('testimonials.index', compact('testimonials'));
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
    public function store(TestimonialCreateRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->upload($request->file('image'));
        }
        Testimonial::create($validatedData);
        return redirect()->back()->with('success', 'Testimonial has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialCreateRequest $request, Testimonial $testimonial)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $this->imageExist($testimonial->image);

            $validatedData['image'] = $this->upload($request->file('image'));
        }
        $testimonial->update($validatedData);
        return redirect()->back()->with('success', 'Testimonial has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image) {
            $this->imageExist($testimonial->image);
        }
        $testimonial->delete();
        return redirect()->back()->with('error', 'Testimonial has been deleted successfully.');
    }
}

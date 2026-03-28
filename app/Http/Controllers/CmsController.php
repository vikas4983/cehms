<?php

namespace App\Http\Controllers;

use App\Http\Requests\CmsCreateRequest;
use App\Models\Cms;
use App\traits\UploadTrait;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CmsController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [new Middleware('permission:view-cms', ['only' => ['index']]), new Middleware('permission:create-cms', ['only' => ['store']]), new Middleware('permission:edit-cms', ['only' => ['update']]), new Middleware('permission:delete-cms', ['only' => ['destroy']])];
    }
    public function index()
    {
        $cmsPages = Cms::allCms()->get();
        return view('cms.index', compact('cmsPages'));
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
    public function store(CmsCreateRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('image')) {
            $validatedData['image'] = $this->upload($request->file('image'));
        }
        $validatedData['slug'] = Str::slug($validatedData['title']);
        Cms::firstOrCreate(['slug' => $validatedData['slug']], $validatedData);
        return redirect()->back()->with('success', 'Cms page added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cms $cms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cms $cms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CmsCreateRequest $request, $id)
    {
        $validatedData = $request->validated();
        $cms = Cms::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($cms->image) {
                $this->imageExist($cms->image);
            }
            $validatedData['image'] = $this->upload($request->file($request->file('image')));
        }
        $validatedData['slug'] = Str::slug($validatedData['title']);
        $cms->update($validatedData);
        return redirect()->back()->with('success', ' Cms page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cms = Cms::find($id);
        if (!$cms) {
            return redirect()->back()->with('error', ' Something went wrong.');
        }
        $cms->delete();
        return redirect()->back()->with('success', ' Cms page deleted successfully.');
    }
}

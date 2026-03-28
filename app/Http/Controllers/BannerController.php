<?php

namespace App\Http\Controllers;

use App\Http\Requests\BannerCreateRequest;
use App\Models\Banner;
use App\traits\UploadTrait;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [new Middleware('permission:view-banner', ['only' => ['index', 'show']]), new Middleware('permission:create-banner', ['only' => ['create', 'store']]), new Middleware('permission:edit-banner', ['only' => ['edit', 'update']]), new Middleware('permission:delete-banner', ['only' => ['destroy']]), new Middleware('permission:change-banner-status', ['only' => ['bannerStatus']])];
    }
    public function index()
    {
        $banners = Banner::allBanners()->get();
        return view('banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerCreateRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('banner')) {
            $validatedData['banner'] = $this->upload($request->file('banner'));
        }
        Banner::create($validatedData);
        return redirect()->back()->with('success', 'Banner has been added succefully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerCreateRequest $request, Banner $banner)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('banner')) {
            if ($banner && $banner->banner) {
                $this->imageExist($banner->banner);
            }
            $validatedData['banner'] = $this->upload($request->file('banner'));
        }
        $banner->update($validatedData);
        return redirect()->route('banners.index')->with('success', 'Banners has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner, Request $request)
    {
        if ($banner && $banner->banner) {
            $this->imageExist($banner->banner);
            $banner->delete();
        }
        return redirect()->back()->with('error', 'Banner has been deleted successfully');
    }
    public function bannerStatus(Request $request)
    {
        $banner = Banner::findOrFail($request->bannerId);
        $banner->update([
            'status' => $banner->status ? 0 : 1,
        ]);
        return redirect()->back()->with('success', 'Banner has been updated successfully');
    }
}

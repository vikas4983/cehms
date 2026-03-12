<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use App\traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = SiteSetting::first();
        return view('siteSettings.index', compact('setting'));
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
    public function store(Request $request)
    {
        $data = $request->all();
        $setting = SiteSetting::first();
        if ($request->hasFile('logo')) {
            if ($setting && $setting->logo) {
                $this->imageExist($setting->logo);
            }
            $data['logo'] = $this->upload($request->file('logo'));
        }
        if ($request->hasFile('admission_form')) {
            if ($setting->admission_form) {
                $this->imageExist($setting->admission_form);
            }
            $data['admission_form'] = $request->file('admission_form')->store('admissionForms', 'public');
        }
        if ($request->hasFile('favicon')) {
            if ($setting && $setting->favicon) {
                $this->imageExist($setting->favicon);
            }
            $data['favicon'] = $this->upload($request->file('favicon'));
        }
        if ($setting) {
            $setting->update($data);
        } else {
            SiteSetting::create($data);
        }
        return redirect()->back()->with('success', 'Site setting has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteSetting $siteSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteSetting $siteSetting)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\SiteSetting;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [new Middleware('permission:view-menu', ['only' => ['index', 'show']]), new Middleware('permission:create-menu', ['only' => ['create', 'store']]), new Middleware('permission:edit-menu', ['only' => ['edit', 'update']]), new Middleware('permission:delete-menu', ['only' => ['destroy']])];
    }
    public function index()
    {
        $headers = Menu::header()->orderByDesc('status')->get();
        $footers = Menu::footer()->orderByDesc('status')->get();
        $menus = Menu::with('children.children')->whereNull('parent_id')->get();

        return view('menus.index', compact('headers', 'footers', 'menus'));
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
        Menu::create($request->all());
        return redirect()->back()->with('success', 'Menu has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $menu = Menu::findOrFail($menu->id);
        $oldParentId = $menu->parent_id;
        $menu->update($request->all());
        if (is_null($oldParentId) && !is_null($menu->parent_id)) {
            Menu::where('parent_id', $menu->id)->delete();
        }

        return redirect()->back()->with('success', 'Menu has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        if (is_null($menu->parent_id)) {
            Menu::where('parent_id', $menu->id)->delete();
            $menu->delete();
            return redirect()->back()->with('success', 'Parent & Child menu has been deleted');
        }
        $menu->delete();
        return redirect()->back()->with('success', 'Menu has been deleted');
    }
}

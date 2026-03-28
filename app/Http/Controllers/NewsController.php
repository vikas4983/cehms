<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewsCreateRequest;
use App\Models\News;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public static function middleware(): array
    {
        return [new Middleware('permission:view-news', ['only' => ['index', 'show']]), new Middleware('permission:create-news', ['only' => ['create', 'store']]), new Middleware('permission:edit-news', ['only' => ['edit', 'update']]), new Middleware('permission:delete-news', ['only' => ['destroy']])];
    }

    public function index()
    {
        $news = News::allNews()->latest()->get();
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsCreateRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('news', 'public');
            $validatedData['file'] = $path;
        }
        News::firstOrCreate(['title' => $validatedData['title']], $validatedData);
        return redirect()->back()->with('success', 'News has been added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsCreateRequest $request, News $news)
    {
        $validatedData = $request->validated();
        if ($request->hasFile('file')) {
            if ($news && $news->file) {
                Storage::disk('public')->delete($news->file);
            }
            $file = $request->file('file');
            $path = $file->store('news', 'public');
            $validatedData['file'] = $path;
        }
        $news->update($validatedData);
        return redirect()->route('news.index')->with('success', 'News has been updated ');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, News $news)
    {
        if ($news && $news->file) {
            Storage::disk('public')->delete($news->file);
        }

        $news->delete();
        return redirect()->route('news.index')->with('success', 'News has been deleted ');
    }
}

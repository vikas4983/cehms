<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookCreateRequest;
use App\Models\Book;
use App\traits\UploadTrait;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    use UploadTrait;
    /**
     * Display a listing of the resource.
     */
    public static function middleware(): array
    {
        return [new Middleware('permission:view-book', ['only' => ['index', 'show']]), new Middleware('permission:create-book', ['only' => ['create', 'store']]), new Middleware('permission:edit-book', ['only' => ['edit', 'update']]), new Middleware('permission:delete-book', ['only' => ['destroy']]), new Middleware('permission:change-book-status ', ['only' => ['bookStatus']]), new Middleware('permission:download-book', ['only' => ['viewBook']])];
    }
    public function index()
    {
        $books = Book::allBook()->paginate(20);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookCreateRequest $request)
    {
        $validatedData = $request->validated();

        DB::beginTransaction();
        try {
            if ($request->hasFile('pdf')) {
                $validatedData['pdf'] = $request->file('pdf')->store('books', 'public');
            }
            if ($request->hasFile('image')) {
                $validatedData['image'] = $request->file('image')->store('books', 'public');
            }

            Book::firstOrCreate(['name' => $validatedData['name']], $validatedData);
            DB::commit();
            return redirect()->back()->with('success', 'Book has been added successfully');
        } catch (\Throwable $e) {
            Log::error('Book creation failed', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookCreateRequest $request, Book $book)
    {
        $validatedData = $request->validated();
        DB::beginTransaction();
        try {
            if ($request->hasFile('pdf')) {
                if ($book && $book->pdf) {
                    $this->imageExist($book->pdf);
                }
                $validatedData['pdf'] = $request->file('pdf')->store('books', 'public');
            }
            if ($request->hasFile('image')) {
                if ($book && $book->image) {
                    $this->imageExist($book->image);
                }
                $validatedData['image'] = $request->file('image')->store('books', 'public');
            }
            $book->update($validatedData);
            DB::commit();
            return redirect()->route('books.index')->with('success', 'Book has been added successfully');
        } catch (\Throwable $e) {
            Log::error('Book creation failed', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong');
        }
        $book->update($validatedData);
        return redirect()->route('books.index')->with('success', 'Book has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->pdf) {
            $this->imageExist($book->pdf);
        }
        if ($book->pdf) {
            $this->imageExist($book->image);
        }
        $book->delete();
        return redirect()->back()->with('error', 'Book has been deleted successfully.');
    }
    public function bookStatus(Request $request)
    {
        $books = Book::inactive()->latest()->paginate(20);
        return view('books.inactive', compact('books'));
    }
    public function viewBook($path)
    {
        if (Storage::disk('public')->exists($path)) {
            return response()->file(storage_path('app/public/' . $path));
        }

        return redirect()->back()->with('error', 'Something went wrong');
    }
}

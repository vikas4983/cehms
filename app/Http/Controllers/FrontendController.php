<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cms;
use App\Models\Medicine;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontends.home');
    }

    public function books()
    {
        return 'Books list';
    }
    public function medicine()
    {
        return 'Medicine list';
    }
    public function aboutUs()
    {
        return 'About us';
    }
    public function update()
    {
        return 'News';
    }
    public function practitioner()
    {
        return 'Practitioner';
    }
    public function contact()
    {
        return 'Contact';
    }
    public function applyFor()
    {
        return 'Aply for';
    }
    public function page($slug)
    {
        $page = Cms::where('slug', $slug)->first();
        $content = $page->content ?? '';
        if ($slug == 'book') {
            $books = Book::active()->get();
            $table = view('partials.bookTable', compact('books'))->render();
            $content = str_replace('{{ books_table }}', $table, $content);
        }
        if ($slug == 'medicine') {
            $medicines = Medicine::activeMedicine()->get();
            $table = view('partials.medicineTable', compact('medicines'))->render();
            $content = str_replace('{{ medicines_table }}', $table, $content);
        }
        if ($slug == 'update') {
            $news = News::active()->get();
            $table = view('partials.newsTable', compact('news'))->render();
            $content = str_replace('{{ news_table }}', $table, $content);
        }
        if ($slug == 'practitioner') {
            $table = view('partials.practitioner')->render();
            $content = str_replace('{{ practitioner }}', $table, $content);
        }
        return view('frontends.page', compact('page', 'content'));
    }

    public function download($path)
    {
        if (Storage::disk('public')->exists($path)) {
            return response()->file(storage_path('app/public/' . $path));
        }

        return redirect()->back()->with('error', 'Something went wrong');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cms;
use App\Models\Medicine;
use App\Models\News;
use App\Models\OldStudent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FrontendController extends Controller
{
    
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

    public function searchPractitioner(Request $request)
    {
        $input = $request->input ?? '';
        if (!$input) {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Enter input value',
                    ],
                    422,
                );
            }
            return view('searchPractitioner')->with('error', 'Enter practitioner id.');
        }
        $student = OldStudent::select('registration_no', 'registration_date', 'first_name', 'last_name', 'father_name', 'address', 'course')->where('registration_no', $input)->first();
        if (!empty($student)) {
            if ($request->wantsJson() || $request->ajax()) {
                $result = view('frontends.result', compact('student'))->render();
                return response()->json([
                    'status' => true,
                    'message' => 'Record successfully retreived.',
                    'data' => $result,
                ]);
            } else {
                return view('searchPractitioner', compact('student'))->with('success', 'Record found successfully.');
            }
        } else {
            if ($request->wantsJson() || $request->ajax()) {
                return response()->json(
                    [
                        'status' => false,
                        'message' => 'Record not found.',
                    ],
                    422,
                );
            } else {
                return view('searchPractitioner')->with('error', 'Record not found.');
            }
        }
    }
}

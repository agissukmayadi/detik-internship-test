<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = "Book";
        $data['categories'] = Category::all();
        $books = Book::with('category');

        if ($request->has('title') && !empty($request->title)) {
            $books->where('title', 'like', '%' . $request->title . '%');
        }
        if ($request->has('category') && !empty($request->category)) {
            $books->whereHas('category', function (Builder $builder) use ($request) {
                $builder->whereIn('id', $request->category);
            });
        }

        $data['books'] = $books->paginate(5)->withQueryString();
        return view('home.index', $data);
    }

    public function bookDetail(string $slug, Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = "Detail Book";
        $data['book'] = Book::with('uploaded_by')->where('slug', $slug)->first();
        if ($data['book'] == null) {
            return abort(404);
        }
        return view('home.detail-book', $data);
    }

}
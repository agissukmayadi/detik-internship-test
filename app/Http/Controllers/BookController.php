<?php
namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['user'] = Auth::user();
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

        if ($data['user']->role == 'admin') {
            $data['books'] = $books->paginate(10)->withQueryString();
            $data['title'] = "Book";
            return view('admin.book', $data);
        } else {
            $data['title'] = "My Books";
            $data['books'] = $books->where('user_id', $data['user']->id)->paginate(10)->withQueryString();
            return view('user.book', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = "Create Book";
        $data['categories'] = Category::all();
        if ($data['user']->role == 'admin') {
            return view('admin.create-book', $data);
        } else {
            return view('user.create-book', $data);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();

        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $filePath = $file->storeAs('file/books', $fileName, 'public');
            $data['file'] = $fileName;
        }

        if ($request->file('image')) {
            $fileImage = $request->file('image');
            $fileImageName = time() . '_' . $fileImage->getClientOriginalName();

            $fileImagePath = $fileImage->storeAs('img/books', $fileImageName, 'public');
            $data['image'] = $fileImageName;
        }

        $result = $user->books()->create($data);
        if ($user->role == 'admin') {
            return redirect()->route('admin.book')->with('success', 'Book created successfully');
        } else {
            return redirect()->route('user.book')->with('success', 'Book created successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug, Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = "Detail Book";
        $data['book'] = Book::with('uploaded_by')->where('slug', $slug)->first();

        if ($data['book'] == null) {
            return abort(404);
        }

        if ($data['user']->role == 'admin') {
            return view('admin.show-book', $data);
        } else {
            return view('user.show-book', $data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug, Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = "Detail Book";
        $data['categories'] = Category::all();
        $data['book'] = Book::with('uploaded_by')->where('slug', $slug)->first();

        if ($data['book'] == null) {
            return abort(404);
        }

        if ($data['user']->role == 'admin') {
            return view('admin.edit-book', $data);
        } else {
            return view('user.edit-book', $data);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, string $slug)
    {
        $data = $request->validated();
        $user = Auth::user();
        $book = Book::where('slug', $slug)->first();
        if ($book == null) {
            return abort(404);
        }
        if ($request->file('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();

            $filePath = $file->storeAs('file/books', $fileName, 'public');
            $data['file'] = $fileName;

            if (Storage::disk('public')->exists('file/books/' . $book->file)) {
                Storage::disk('public')->delete('file/books/' . $book->file);
            }
        }

        if ($request->file('image')) {
            $fileImage = $request->file('image');
            $fileImageName = time() . '_' . $fileImage->getClientOriginalName();

            $fileImagePath = $fileImage->storeAs('img/books', $fileImageName, 'public');
            $data['image'] = $fileImageName;

            if (Storage::disk('public')->exists('img/books/' . $book->image)) {
                Storage::disk('public')->delete('img/books/' . $book->image);
            }
        }

        $result = $book->update($data);
        if ($user->role == 'admin') {
            return redirect()->route('admin.book')->with('success', 'Book updated successfully');
        } else {
            return redirect()->route('user.book')->with('success', 'Book updated successfully');
        }
    }

    public function export(Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = "Export Book";
        $data['books'] = Book::with(['uploaded_by', 'category'])->get();
        $pdf = Pdf::loadView('admin.export-book', $data)->setPaper('a4', 'landscape');
        return $pdf->download('book-report.pdf');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $slug)
    {
        $user = Auth::user();
        $book = Book::where('slug', $slug)->first();

        if ($book == null) {
            return abort(404);
        }

        if (Storage::disk('public')->exists('file/books/' . $book->file)) {
            Storage::disk('public')->delete('file/books/' . $book->file);
        }

        if (Storage::disk('public')->exists('img/books/' . $book->image)) {
            Storage::disk('public')->delete('img/books/' . $book->image);
        }
        $book->delete();
        if ($user->role == 'admin') {
            return redirect()->route('admin.book')->with('success', 'Book deleted successfully');
        } else {
            return redirect()->route('user.book')->with('success', 'Book deleted successfully');
        }
    }
}
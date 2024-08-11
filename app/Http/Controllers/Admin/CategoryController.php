<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = "Category";

        $query = Category::query();

        // Check if search parameter is present
        if ($request->has('name') && !empty($request->name)) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Paginate the results and preserve query string
        $data['categories'] = $query->paginate(10)->withQueryString();

        return view('admin.category', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = "Create Category";

        return view('admin.create-category', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        $category = Category::create([
            'name' => $data['name']
        ]);

        return redirect()->route('admin.category')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id, Request $request)
    {
        $data['user'] = Auth::user();
        $data['category'] = Category::findOrFail($id);
        $data['title'] = "Edit Category";
        return view('admin.edit-category', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $data['name']
        ]);
        return redirect()->route('admin.category')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('admin.category')->with('success', 'Category deleted successfully');
    }
}

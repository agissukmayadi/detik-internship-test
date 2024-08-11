<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $data['user'] = Auth::user();
        $data['title'] = "Dashboard";
        return view('admin.dashboard', $data);
    }

    public function category(Request $request)
    {
        $data['user'] = Auth::user();
        $data['categories'] = Category::all();
        $data['title'] = "Category";
        return view('admin.category', $data);
    }

}

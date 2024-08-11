<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => __('auth.failed'),
        ]);
    }
}

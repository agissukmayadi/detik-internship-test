<?php

namespace App\Http\Middleware;

use App\Models\Book;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckBookOwrnership
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('slug');

        $book = Book::where('slug', $slug)->first();

        if ($book && $book->user_id === Auth::id()) {
            return $next($request);
        }

        return redirect()->route('home')->with('error', 'You are not owner of the book.');
    }
}
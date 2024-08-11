<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/book-detail/{slug}', [HomeController::class, 'bookDetail'])->name('book.detail');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.action');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.action');
});

Route::middleware('auth')->group(function () {
    Route::middleware('isRole:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

        Route::get('/admin/category', [CategoryController::class, 'index'])->name('admin.category');
        Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
        Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('/admin/category/destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

        Route::get('/admin/book', [BookController::class, 'index'])->name('admin.book');
        Route::get('/admin/book/show/{slug}', [BookController::class, 'show'])->name('admin.book.show');
        Route::get('/admin/book/create', [BookController::class, 'create'])->name('admin.book.create');
        Route::post('/admin/book/store', [BookController::class, 'store'])->name('admin.book.store');
        Route::get('/admin/book/edit/{slug}', [BookController::class, 'edit'])->name('admin.book.edit');
        Route::post('/admin/book/update/{slug}', [BookController::class, 'update'])->name('admin.book.update');
        Route::get('/admin/book/destroy/{slug}', [BookController::class, 'destroy'])->name('admin.book.destroy');
        Route::get('/admin/book/export', [BookController::class, 'export'])->name('admin.book.export');
    });
    Route::middleware('isRole:user')->group(function () {
        Route::get('/book', [BookController::class, 'index'])->name('user.book');
        Route::get('/book/create', [BookController::class, 'create'])->name('user.book.create');
        Route::post('/book/store', [BookController::class, 'store'])->name('user.book.store');

        Route::middleware('isBookOwner')->group(function () {
            Route::get('/book/show/{slug}', [BookController::class, 'show'])->name('user.book.show');
            Route::get('/book/edit/{slug}', [BookController::class, 'edit'])->name('user.book.edit');
            Route::post('/book/update/{slug}', [BookController::class, 'update'])->name('user.book.update');
            Route::get('/book/destroy/{slug}', [BookController::class, 'destroy'])->name('user.book.destroy');
        });

    });
});

Route::get('/logout', function (Request $request) {
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
})->name('logout');

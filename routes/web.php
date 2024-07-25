<?php

use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Start route dashboard
Route::get('/dashboard/', function () {
    return view('dashboard.overview');
})->middleware('auth');
Route::resource('/dashboard/articles', DashboardArticleController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoriesController::class)->except('show')->middleware('admin');

Route::get('/dashboard/users', function () {
    return view('dashboard.users');
})->middleware('admin');

Route::get('/authors', function () {
    return view('profile', ['title' => 'Author']);
});
// End route dashboard

// Route news
Route::get('/', [NewsController::class, 'index']);
Route::get('/news/{article:slug}', [NewsController::class, 'article']);
Route::get('/authors/{user:username}', [NewsController::class, 'articleByAuthor']);
Route::get('/categories/{category:slug}', [NewsController::class, 'articleByCategory']);
Route::get('/profile', function () {
    return view('profile', ['title' => 'Profile']);
})->middleware('auth');
// End route news
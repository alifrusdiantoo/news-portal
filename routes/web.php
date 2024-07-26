<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardUsersController;
use App\Http\Controllers\AdminCategoriesController;
use App\Http\Controllers\DashboardArticleController;

// Route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Start route dashboard
Route::get('/dashboard', [DashboardController::class, 'overview'])->middleware('auth');
Route::resource('/dashboard/articles', DashboardArticleController::class)->middleware('auth');
Route::resource('/dashboard/categories', AdminCategoriesController::class)->except('show')->middleware('admin');
Route::resource('/dashboard/users', DashboardUsersController::class)->middleware('admin');
// End route dashboard

// Route news
Route::get('/', [NewsController::class, 'index']);
Route::get('/news/{article:slug}', [NewsController::class, 'article']);
Route::get('/authors/{user:username}', [NewsController::class, 'articleByAuthor']);
Route::get('/categories/{category:slug}', [NewsController::class, 'articleByCategory']);
// End route news

// Users route
Route::get('/profile/{user:username}', [UsersController::class, 'index']);
Route::get('/profile/{user:username}/edit', [UsersController::class, 'edit'])->middleware('auth');
Route::post('/profile/{user:username}', [UsersController::class, 'update'])->middleware('auth');

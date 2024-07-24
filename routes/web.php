<?php

use App\Http\Controllers\DashboardArticleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
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

// Route untuk melakukan CRUD
Route::resource('/dashboard/articles', DashboardArticleController::class)->middleware('auth');

Route::get('/dashboard/categories', function () {
    return view('dashboard.categories');
})->middleware('auth');

Route::get('/dashboard/users', function () {
    return view('dashboard.users');
})->middleware('auth');

Route::get('/authors', function () {
    return view('profile', ['title' => 'Author']);
});

Route::get('/dashboard/form', function () {
    return view('dashboard.form');
})->middleware('auth');
// End route dashboard

// Route news
Route::get('/', function () {
    $highlight = Article::latest()->first();

    return view('news', ['title' => 'News', 'highlight' => $highlight, 'articles' => Article::filter(request(['search']))->latest()->paginate(8)->withQueryString()]);
});

Route::get('/news/{article:slug}', function (Article $article) {
    return view('article', ['article' => $article]);
});

Route::get('/authors/{user:username}', function (User $user) {
    $sum = count($user->articlesPosted);
    $title = "$sum " . Str::plural('article', $sum) . " posted by {$user->name}";
    $search = implode(request(['search', '']));

    $articles = Article::filter(['search' => $search, 'author' =>  $user->username])->latest()->paginate(12)->withQueryString();

    return view('page', ['title' => $title, 'articles' => $articles]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
    $sum = count($category->article);
    $title = "$sum " . Str::plural('article', $sum) . " in {$category->name}";

    $search = implode(request(['search', '']));

    $articles = Article::filter(['search' => $search, 'category' =>  $category->slug])->latest()->paginate(12)->withQueryString();

    return view('page', ['title' => $title, 'articles' => $articles]);
});

Route::get('/profile', function () {
    return view('profile', ['title' => 'Profile']);
})->middleware('auth');
// End route news
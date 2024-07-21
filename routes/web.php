<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

Route::get('/login', fn () => view('login'));

Route::get('/dashboard', fn () => view('overview'));

// News routing
Route::get('/', function () {
    $highlight = Article::latest()->first();

    return view('news', ['title' => 'News', 'highlight' => $highlight, 'articles' => Article::filter(request(['search']))->latest()->paginate(12)->withQueryString()]);
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

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

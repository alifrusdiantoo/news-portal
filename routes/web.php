<?php

use App\Models\User;
use App\Models\Article;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/news', function () {
    $highlight = Article::latest()->first();
    $articles = Article::all()->sortByDesc('created_at');
    return view('news', ['title' => 'News', 'highlight' => $highlight, 'articles' => $articles]);
});

Route::get('/news/{article:slug}', function (Article $article) {
    return view('article', ['article' => $article]);
});

Route::get('/authors/{user}', function (User $user) {
    return view('page', ['title' => 'Article posted by ' . $user->name, 'articles' => $user->articlesPosted]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

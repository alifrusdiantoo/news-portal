<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['title' => 'About']);
});

Route::get('/news', function () {
    return view('news', ['title' => 'News']);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});

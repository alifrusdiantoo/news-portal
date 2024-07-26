<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function overview()
    {
        $articleCount = Article::count();
        $authorCount = User::count();
        $categoryCount = Category::count();

        return view('dashboard.overview', compact('articleCount', 'authorCount', 'categoryCount'));
    }
}

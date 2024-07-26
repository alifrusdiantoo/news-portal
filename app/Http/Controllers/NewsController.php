<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NewsController extends Controller
{

    public function __construct()
    {
        $categories = Category::all();
        View::share('categories', $categories);
    }

    public function index()
    {
        $categories = Category::all();
        $highlight = Article::latest()->first();
        $articles = Article::filter(request(['search']))->latest()->paginate(8)->withQueryString();
        return view('news.index', [
            'categories' => $categories,
            'highlight' => $highlight,
            'articles' => $articles
        ]);
    }

    public function article(Article $article)
    {
        return view('news.article', [
            'article' => $article
        ]);
    }

    public function articleByAuthor(User $user)
    {
        $sum = count($user->articlesPosted);
        $title = "$sum " . Str::plural('article', $sum) . " posted by {$user->name}";
        $search = implode(request(['search', '']));

        $articles = Article::filter(['search' => $search, 'author' =>  $user->username])->latest()->paginate(12)->withQueryString();

        return view('news.articles', ['title' => $title, 'articles' => $articles]);
    }

    public function articleByCategory(Category $category)
    {
        $sum = count($category->article);
        $title = "$sum " . "Artikel pada kategori {$category->name}";

        $search = implode(request(['search', '']));

        $articles = Article::filter(['search' => $search, 'category' =>  $category->slug])->latest()->paginate(12)->withQueryString();

        return view('news.articles', ['title' => $title, 'articles' => $articles]);
    }
}

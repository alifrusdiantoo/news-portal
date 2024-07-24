<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $highlight = Article::latest()->first();
        $articles = Article::filter(request(['search']))->latest()->paginate(8)->withQueryString();
        return view('news.index')->with([
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
        $title = "$sum " . Str::plural('article', $sum) . " in {$category->name}";

        $search = implode(request(['search', '']));

        $articles = Article::filter(['search' => $search, 'category' =>  $category->slug])->latest()->paginate(12)->withQueryString();

        return view('news.articles', ['title' => $title, 'articles' => $articles]);
    }
}

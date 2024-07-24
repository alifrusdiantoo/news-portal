<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Ramsey\Collection\Sort;

class DashboardArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('author_id', auth()->user()->id)->orderByDesc('created_at')->get();

        return view('dashboard.articles.index', [
            'articles' => $articles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.articles.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['title']);

        $validatedData = $request->validate([
            'title' => 'required|min:50|max:255',
            'slug' => 'required|unique:articles',
            'category_id' => 'required',
            'content' => 'required'
        ]);
        $validatedData['author_id'] = auth()->user()->id;
        $validatedData['img'] = 'https://dummyimage.com/600x400/eee/2020.png&text=x';

        Article::create($validatedData);

        return redirect('/dashboard/articles')->with('success', 'New article has been published');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('dashboard.articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::where('author_id', auth()->user()->id)->latest()->paginate(10)->withQueryString();

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
            'img' => 'image|file|max:1024',
            'content' => 'required'
        ]);
        $validatedData['author_id'] = auth()->user()->id;
        $validatedData['img'] = $request->file('img')->store('img/article');

        Article::create($validatedData);

        return redirect('/dashboard/articles')->with('success', 'New article has been published');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        if ($article->author->id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.articles.show', [
            'article' => $article
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        if ($article->author->id !== auth()->user()->id) {
            abort(403);
        }

        return view('dashboard.articles.edit', [
            'article' => $article,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        $request['slug'] = Str::slug($request['title']);

        $rules = [
            'title' => 'required|min:50|max:255',
            'category_id' => 'required',
            'img' => 'image|file|max:1024',
            'content' => 'required'
        ];

        // Validate slug
        if ($request->slug != $article->slug) {
            $rules['slug'] = 'required|unique:articles';
        }

        $validatedData = $request->validate($rules);

        // Validate image
        if ($request->file('img')) {
            // Delete previous image
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['img'] = $request->file('img')->store('img/article');
        }

        $validatedData['author_id'] = auth()->user()->id;
        Article::where('id', $article->id)->update($validatedData);

        return redirect('/dashboard/articles')->with('success', 'Article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        // Delete image
        if ($article->img) {
            Storage::delete($article->img);
        }
        Article::destroy($article->id);
        return redirect('/dashboard/articles')->with('success', 'Article has been deleted');
    }
}

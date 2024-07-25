<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories = Category::query()->orderBy('id')->get();

        return view('dashboard.categories.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request['slug'] = Str::slug($request['name']);

        $validatedData = $request->validate([
            'name' => 'required',
            'slug' => 'required'
        ]);

        Category::create($validatedData);

        return redirect('/dashboard/categories')->with('success', 'New category has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request['slug'] = Str::slug($request['name']);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string'
        ]);

        Category::where('id', $category->id)->update($validatedData);

        return redirect('/dashboard/categories')->with('success', 'Category has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect('/dashboard/categories')->with('success', 'Category has been deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        View::share('categories', $categories);
    }

    public function index(User $user)
    {
        return view('users.index', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        if ($user->id !== auth()->user()->id) {
            abort(403);
        }

        return view('users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        if ($user->author->id !== auth()->user()->id) {
            abort(403);
        }

        $rules = [
            'name' => 'required|max:255',
            'img' => 'image|file|max:1024',
        ];

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:5|max:15|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:rfc,dns|unique:users';
        }

        $validatedData = $request->validate($rules);

        // Validate image
        if ($request->file('img')) {
            // Delete previous image
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['img'] = $request->file('img')->store('img/users');
        }

        User::where('id', $user->id)->update($validatedData);

        return redirect('/profile/' . auth()->user()->username)->with('success', 'User has been updated');
    }
}

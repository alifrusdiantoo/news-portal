<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('roles', '!=', 'admin')->orderBy('id', 'desc')->paginate(10)->withQueryString();

        return view('dashboard.users.index', [
            'users' => $users
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashboard.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
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

        return redirect('/dashboard/users')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete image
        if ($user->img) {
            Storage::delete($user->img);
        }
        User::destroy($user->id);
        return redirect('/dashboard/users')->with('success', 'User has been deleted');
    }
}

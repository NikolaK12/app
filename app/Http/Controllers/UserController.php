<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);

        User::create($request->all());

        return redirect('/users')->with('stored', 'User created successfully.');
    }



    public function show(User $user)
    {


        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'unique:users,email,',

        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);


        return redirect('/users')->with('updated', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('deleted', 'User deleted successfully.');
    }
}

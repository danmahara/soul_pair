<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('website.users.index', compact('users'));
    }

    public function create()
    {
        return view('website.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($request->all());
        return redirect()->route('website.users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('website.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('website.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $user->update($request->all());
        return redirect()->route('website.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('website.users.index')->with('success', 'User deleted successfully.');
    }
}

<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{

    public function dashboard(){
        return view('website.dashboard.dashboard');
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

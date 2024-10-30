<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Validator;

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

    // public function store(UserRequest $userRequest)
    // {
    //     // dd($userRequest->all());
    //     $data = $userRequest->validated();

    //     // Create a slug using first and last name
    //     $data['username'] = createSlug($data['first_name'], $data['last_name']);

    //     // Hash the password before storing
    //     $data['password'] = bcrypt($data['password']);

    //     // Create the user
    //     try {
    //         User::create($data);
    //         // Redirect with success message
    //         return redirect()->route('website.home')->with('success', 'User created successfully.');
    //     } catch (Exception $e) {
    //         // Handle any exceptions that occur during user creation
    //         return redirect()->back()->withErrors(['error' => $e->getMessage()]); // Store the error message
    //     }
    // }


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

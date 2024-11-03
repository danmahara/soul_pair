<?php
namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Faker\Provider\ar_EG\Company;
use Illuminate\Http\Request;
use Validator;
use Carbon\Carbon;

class UserController extends Controller
{

    protected $user;

    public function __construct(User $model)
    {
        $this->user = $model;
    }

    public function dashboard()
    {

        $users = $this->getUsers();
        return view('website.dashboard.dashboard',compact('users'));
    }

    public function getUsers()
    {
        $users = $this->user->inRandomOrder()->get(); // Retrieve users in random order

        // Calculate age for each user
        $users = $users->map(function ($user) {
            $dob = $user->date_of_birth; // Get the date of birth
            $user->age = Carbon::parse($dob)->age; // Calculate and assign age to the user object
            return $user; // Return the modified user object
        });

        return view('website.dashboard.dashboard', compact('users'));
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

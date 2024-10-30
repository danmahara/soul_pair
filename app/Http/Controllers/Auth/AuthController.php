<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Auth;
use Exception;
use Request;
use Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $data = $validator->validate();

        if (Auth::attempt($data)) {
            return redirect()->route('website.home');
        } else {
            // Return back with an error if authentication fails
            return redirect()->back()->withErrors(['login' => 'Invalid email or password'])->withInput();
        }

    }
    public function store(UserRequest $userRequest)
    {
        $data = $userRequest->validated();

        // Create a slug using first and last name
        $data['username'] = createSlug($data['first_name'], $data['last_name']);

        // Hash the password before storing
        $data['password'] = bcrypt($data['password']);

        // Create the user
        try {
            User::create($data);
            // Redirect with success message
            return redirect()->route('website.home')->with('success', 'User created successfully.');
        } catch (Exception $e) {
            // Handle any exceptions that occur during user creation
            return redirect()->back()->withErrors(['error' => $e->getMessage()]); // Store the error message
        }
    }


    public function passwordReset()
    {

    }


}

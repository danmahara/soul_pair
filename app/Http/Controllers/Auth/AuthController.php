<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Auth;
use Exception;
use Validator;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('website.auth.login');
    }


    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Get only the necessary fields for authentication
        $credentials = $request->only(['email', 'password']); // Use array format

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with(['success'=>"Logged in successfully."]);
        } else {
            // Return back with an error if authentication fails
            return redirect()->back()->withErrors(['login' => 'Invalid email or password'])->withInput();
        }
    }




    public function showRegisterForm()
    {
        return view('website.auth.signup');
    }

    public function register(UserRequest $userRequest)
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
            return redirect()->route('login')->with('success', 'User created successfully.');
        } catch (Exception $e) {
            // Handle any exceptions that occur during user creation
            return redirect()->back()->withErrors(['error' => $e->getMessage()]); // Store the error message
        }
    }


    public function passwordReset()
    {

    }

    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token
        $request->session()->regenerateToken();

        // Redirect to the login page or a specific route with a success message
        return redirect()->route('login')->with('success', 'Successfully logged out.');
    }

}

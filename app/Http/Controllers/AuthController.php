<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Handle user login.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validate the incoming request data for login
        $credentials = $request->validate([
            'username' => ['required', 'string'], //
            'password' => ['required', 'string'], //
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials, $request->boolean('remember'))) { //
            // Regenerate the session to prevent session fixation attacks
            $request->session()->regenerate(); //

            // Redirect the user to their intended URL or the dashboard
            return redirect()->intended('/dashboard')->with('success', 'Logged in successfully!'); //
        }

        // If authentication fails, throw a validation exception with a generic error message
        throw ValidationException::withMessages([
            'username' => __('auth.failed'), //
        ]);
    }

    /**
     * Handle user registration.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Validate the incoming request data for registration
        $request->validate([
            'username' => 'required|string|max:255|unique:users', //
            'email' => 'required|string|email|max:255|unique:users', // Ensure email is required and unique
            'password' => 'required|string|min:8|confirmed', // Password must be confirmed
        ]);

        // Find the 'User' role to assign to the new user
        $defaultRole = Role::where('name', 'User')->first(); //

        // If the 'User' role does not exist, create it (useful for development)
        if (!$defaultRole) { //
            $defaultRole = Role::create(['name' => 'User']); //
        }

        // Create the new user record in the database
        $user = User::create([
            'username' => $request->username, //
            'email' => $request->email, //
            'password' => Hash::make($request->password), // Hash the password securely
            'role_id' => $defaultRole->id, // Assign the default role ID
        ]);

        // Log the newly registered user in immediately
        Auth::login($user); //

        // Redirect to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Registration successful! Welcome!'); //
    }

    /**
     * Log the user out of the application.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Log out the authenticated user
        Auth::logout(); //

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate(); //
        $request->session()->regenerateToken(); //

        // Redirect to the home page with a success message
        return redirect('/')->with('success', 'You have been logged out.'); //
    }
}
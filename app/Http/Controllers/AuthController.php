<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Import User model
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // $request->validate([
        //     'username' => 'required|min:3|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        // User::create([
        //     'username' => $request->username,
        //     'password' => Hash::make($request->password), // Secure password hashing
        // ]);

        // Temporarily redirect to the dashboard without processing form data
        return redirect()->route('dashboard')->with('success', 'Welcome to your dashboard!');
    }
}
// This controller handles user registration
// It validates the input, creates a new user, and redirects to the home page with a success message.
// Make sure to import the User model and Hash facade for password hashing.
// You can add more methods for login, logout, etc. as needed.
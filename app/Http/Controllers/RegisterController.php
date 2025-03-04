<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display the registration form.
     *  
     */
    public function register(): View
    {
        return view('auth.register');
    }

    /**
     * Store user in database.
     * 
     */

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email:filter|max:100|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash the password

        $validatedData['password'] = Hash::make($validatedData['password']);

        // Create user

        $user = User::create($validatedData);

        return redirect()->route('user.login')->with('success', 'Registration successful!');
    }
}

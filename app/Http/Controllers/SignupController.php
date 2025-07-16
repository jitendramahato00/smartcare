<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{
   public function showSignupForm()
{
    return view('frontend.signup');
}

public function signup(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        
        'password' => 'required|confirmed|min:8',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
       
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Signup successful! Please login.');
}

}

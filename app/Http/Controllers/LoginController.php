<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.login'); // Make sure this blade file exists
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8|max:16',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            switch ($user->role) {
                case 'admin':
                    return redirect()->intended(route('backend.dashboard'));
                default:
                    return redirect()->intended(route('frontend.index'));
            }
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
}

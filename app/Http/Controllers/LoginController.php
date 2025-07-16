<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('frontend.login'); // Make sure this blade file exists
    }

    public  function login(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();
        //dd($user);
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                switch ($user->role) {
                    case 'admin':
                      //  dd('Admin logged in successfully');
                        return redirect()->intended(route('backend.dashboard')); // Redirect to admin dashboard
                    case 'doctor':
                        dd('doctor successfully');
                        return redirect()->intended(route('backend.doctor.dashboard')); // Redirect to user home page
                    default:
                  //  dd('User logged in successfully');
                        return redirect()->intended(route('frontend.index')); // Default redirect
                }
                
    }
}
        return redirect()->back()->with('login_error', 'Invalid email or password.');
    }
    public function dashboard()
    {
       dd('test');
    }
}
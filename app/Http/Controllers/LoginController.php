<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Mail\ResetPassword;
// use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    
    public function showLoginForm()
    {
        return view('frontend.login');
    }

    public function login(Request $request)
    {
        // Server-side validation
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                 session()->regenerate();
                 
                switch ($user->role) {
                    case 'admin':
                        return redirect()->intended(route('backend.dashboard'));
                    case 'doctor':
                        return redirect()->intended(route('doctors.doctor'));
                    default:
                        return redirect()->intended(route('frontend.index'));
                }
            }
        }

        // Agar user nahi mila ya password galat hai to wapas message bhejo
        return redirect()->back();
    }

    public function dashboard()
    {
        dd('Dashboard accessed successfully!');
        
}
    public function logout()
    {
      if(Auth::check()){
        Auth::logout();
        return redirect()->route('frontend.index');
      }
      Auth::logout();
        return redirect()->route('frontend.index')->with('message', 'You have been logged out successfully.'); 
}

    public function passwordreset(Request $request){
      $request->validate([
         'email' => 'required|email'
      ]);
      
      
      $user = User::where('email', $request->email)->first();
      if($user){
        $token = Str::random(64);

      DB::table('password_resets')->updateOrInsert(
        ['email' => $user->email],
        [
            'token' => Hash::make($token),
            'created_at' => now()
        ]
        );

        Mail::to($user->email)->send(new ResetPasswordManil($token));
        return back()->with('status', 'We have emailed your password reset link!');
       }
        return back()->withErrors(['email' => 'Email address not Found.']);
    }

    public function showResetForm($token){
        if(!$token){
            return redirect()->back();
        }
        return view('frontend.pasword', compact('token'));
    }

    public function updatePaassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $reset = DB::table('password_resets')->where('email', $request->email)->first();
        if(!$reset || !Hash::check($request->token, $reset->token)) {
            return back()->withErrors(['token' => 'Invalid or Expired token']);
        }
    }
}
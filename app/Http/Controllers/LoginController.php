<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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

// public function passwordreset(Request $request){
//       $request->validate([
//          'email' => 'required|email'
//       ]);
      
      
//       $user = User::where('email', $request->email)->first();
//       if($user)
//         $token = Str::random(64);
//          $affected = DB::update('update password_reset set token = $token name = ?', ['Deepak']);
// }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\adminhospital; // Aapka Doctor model

class WelcomeController extends Controller
{
    /**
     * Yeh method public website (homepage) par doctors ki list dikhayega.
     */
    public function index()
    {
        // Database se sirf active doctors ko fetch karein
        $hospitals = adminhospital::where('status', true)->latest()->get();

        // Data ko aapki main frontend file mein pass karein
        return view('frontend.hospitals.index', compact('hospitals'));
    }

    /**
     * Frontend par single doctor ki profile dikhayega.
     */
    public function showProfile($id)
    {
        // ID se doctor ko dhoondein, agar na mile to 404 error dega
        $hospital = adminhospital::findOrFail($id);

        // Data ko doctor-profile view mein pass karein
        // Note: Aapko 'doctor-profile.blade.php' naam ki ek view file banani hogi
        return view('frontend.hospitals.sections.doctor-profile', compact('hospital'));
    }


//     public function showProfile($id)
// {
//     $hospital = adminhospital::findOrFail($id);
    
//     // View ka path 'doctor-profile' kar dein
//     return view('frontend.hospitals.doctor-profile', compact('hospital'));
// }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location; // Apne model ke namespace ke hisaab se adjust kar lena
use App\Hospital; // Apne model ke namespace ke hisaab se adjust kar lena

class HomeController extends Controller
{
    public function showHome()
    {
        // Database se saare locations fetch karo
        $locations = Location::all();

        // Database se saare hospitals fetch karo, unki associated location ke saath
        $hospitals = Hospital::with('location')->get();

        // Data ko view (frontend.index) ko bhejo
        return view('frontend.index', [
            'title' => 'Home',
            'locations' => $locations, // Locations data pass kiya
            'hospitals' => $hospitals,   // Hospitals data pass kiya
        ]);
    }

    // Yeh ek optional API endpoint hai dynamic filtering ke liye (AJAX use karte waqt kaam aayega)
    // Aapne pichhle conversation mein isko FrontendController mein rakha tha.
    // Agar aap isko HomeController mein rakhna chahte hain toh yahan add kar sakte hain.
    // Agar aapka app bada hai, toh isko ek alag 'ApiController' ya 'SearchController' mein rakhna behtar ho sakta hai.
    public function filterHospitals(Request $request)
    {
        $location = $request->input('location');
        $disease = $request->input('disease');

        $query = Hospital::query();

        if ($location) {
            // Hum locations table mein 'name' column ke through search kar rahe hain
            $query->whereHas('location', function ($q) use ($location) {
                $q->where('name', 'like', '%' . $location . '%');
            });
        }

        if ($disease) {
            // **Important:** Hospitals table mein 'specialization' column hona chahiye
            // Ya fir aap hospital ke 'name' mein bhi disease/specialization search kar sakte ho
            $query->where('specialization', 'like', '%' . $disease . '%')
                  ->orWhere('name', 'like', '%' . $disease . '%');
        }

        $filteredHospitals = $query->with('location')->get(); // Agar location bhi chahiye toh

        return response()->json($filteredHospitals);
    }
}
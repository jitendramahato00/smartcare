<?php

// HomeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Laravel 8+ me usually models yahan hote hain:
use App\Location;
use App\Hospital;

class HomeController extends Controller
{
    // 👉 NEW
    public function index()
    {
        // Purana code touch nahi kar rahe, bas yahan se call kar rahe hain
        return $this->showHome();
    }

    public function showHome()
    {
        $locations = Location::all();
        $hospitals = Hospital::with('location')->get();

        return view('frontend.index', [
            'title' => 'Home',
            'locations' => $locations,
            'hospitals' => $hospitals,
        ]);
    }

    public function filterHospitals(Request $request)
    {
        $location = $request->input('location');
        $disease  = $request->input('disease');

        $query = Hospital::query();

        if ($location) {
            $query->whereHas('location', function ($q) use ($location) {
                $q->where('name', 'like', '%'.$location.'%');
            });
        }

        if ($disease) {
            $query->where(function ($q) use ($disease) {
                $q->where('specialization', 'like', '%'.$disease.'%')
                  ->orWhere('name', 'like', '%'.$disease.'%');
            });
        }

        return response()->json($query->with('location')->get());
    }
}

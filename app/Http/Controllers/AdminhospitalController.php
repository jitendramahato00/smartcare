<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Adminhospital;
use Illuminate\Support\Facades\Storage;

class AdminhospitalController extends Controller
{
    public function index()
    {
        $hospitals = Adminhospital::latest()->get();
        return view('doctors.forms.index', compact('hospitals'));
    }

    public function create()
    {
        return view('doctors.forms.add-doctor');
    }

    /**
     * Store function (Create New)
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:adminhospitals,username',
            'email'    => 'required|email|unique:adminhospitals,email',
            'first_name' => 'required|string|max:255',

           'duty_start_time' => 'nullable|date_format:H:i',
           'duty_end_time'   => 'nullable|date_format:H:i|after:duty_start_time',
       
        ]);

        // Form se saara data le lo
        $data = $request->except(['_token', '_method']);
        
        // ==========================================================
        // YEH HAI ERROR KA SOLUTION
        // Hum yahan array waale fields ko overwrite karke unka pehla item le rahe hain.
        // ==========================================================
        $data['degree'] = $request->input('degree.0');
        $data['college'] = $request->input('college.0');
        $data['year_of_completion'] = $request->input('year_of_completion.0');
        $data['hospital_name'] = $request->input('hospital_name.0');
        $data['experience_from'] = $request->input('experience_from.0');
        $data['experience_to'] = $request->input('experience_to.0');
        $data['designation'] = $request->input('designation.0');
        $data['award'] = $request->input('award.0');
        $data['award_year'] = $request->input('award_year.0');
        $data['memberships'] = $request->input('memberships.0'); // Yeh bhi single hi save hoga
        $data['registration_number'] = $request->input('registration_number.0');
        $data['registration_year'] = $request->input('registration_year.0');

        // Handle the photo upload
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('admin_photos', 'public');
        }

        Adminhospital::create($data); // Ab $data mein koi array nahi hai

        return redirect()->route('forms.index')->with('success', 'Doctor created successfully.');
    }

    public function edit($id)
    {
        $hospital = Adminhospital::findOrFail($id);
        return view('doctors.forms.edit', compact('hospital'));
    }

    /**
     * YEH NAYA AUR BILKUL SAHI 'UPDATE' FUNCTION HAI
     */
    public function update(Request $request, $id)
    {
        $hospital = Adminhospital::findOrFail($id);

        $request->validate([
            'email' => 'required|email|unique:adminhospitals,email,' . $hospital->id,
            'first_name' => 'required|string|max:255',
            'duty_start_time' => 'nullable|date_format:H:i',
           'duty_end_time'   => 'nullable|date_format:H:i|after:duty_start_time',
        ]);

        // Form se aaye saare data ko le lo (token aur method ko chhodkar)
        $data = $request->except(['_token', '_method']);

        // Agar nayi photo upload hui hai toh use handle karo
        if ($request->hasFile('photo')) {
            // Purani photo delete karo agar hai toh
            if ($hospital->photo) {
                Storage::disk('public')->delete($hospital->photo);
            }
            // Nayi photo store karo aur uska path data mein daal do
            $data['photo'] = $request->file('photo')->store('admin_photos', 'public');
        }

        // Eloquent ko bolo ki is saare data se hospital ko update kar de
        $hospital->update($data);

        // Aapka redirect route yahan galat tha, ise 'doctors.index' hona chahiye
        return redirect()->route('forms.index')->with('success', 'Doctor updated successfully.');
    }





    
    public function destroy($id)
    {
        $hospital = Adminhospital::findOrFail($id);
        if ($hospital->photo) {
            Storage::disk('public')->delete($hospital->photo);
        }
        $hospital->delete();
        // Aapka redirect route yahan galat tha, ise 'doctors.index' hona chahiye
        return redirect()->route('forms.index')->with('success', 'Doctor deleted successfully.');
    }

    public function book($id) {
        // Doctor ko ID se database mein dhundo
        $hospital = Adminhospital::find($id);

        // Agar doctor nahi mila, toh user ko home page par redirect kar do
        // ya 404 error dikhao. Yeh bahut zaroori hai!
        if (!$hospital) {
            // Option 1: Redirect to home page with an error message
            return redirect()->route('home')->with('error', 'Sorry, the doctor you are looking for was not found.');
            // Option 2: Show a 404 Not Found page
            // abort(404, 'Doctor not found.');
        }

        // Agar doctor mil gaya, toh uski details 'book' view mein bhej do
        // Make sure 'frontend.hospitals.appointments.book' is the correct path to your blade file
        return view('frontend.hospitals.appointments.book', compact('hospital'));
    }
}


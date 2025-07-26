<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;

class HospitalController extends Controller
{
    public function index()
    {
    $hospitals = Hospital::paginate(10);
    return view('backend.hospitals.index', compact('hospitals'));
    }


    public function create()
    {
    return view('backend.hospitals.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required',
        'phone' => 'required|string|max:20',
        'logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $logoPath = $request->file('logo')->store('logos', 'public');

    Hospital::create([
        'name' => $request->name,
        'address' => $request->address,
        'phone' => $request->phone,
        'logo' => $logoPath,
    ]);

    return redirect()->route('backend.hospitals.index')->with('success', 'Hospital created successfully.');
    }

    public function edit(Hospital $hospital)
    {
        return view('backend.hospitals.edit', compact('hospital'));
    }

    public function update(Request $request, Hospital $hospital)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'phone' => 'required|string|max:20',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $hospital->logo = $logoPath;
        }

        $hospital->update([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'logo' => $hospital->logo,
        ]);

        return redirect()->route('backend.hospitals.index')->with('success', 'Hospital updated successfully.');
    }
    public function destroy(Hospital $hospital)
    {
    $hospital->delete();
    return redirect()->route('backend.hospitals.index')->with('success', 'Hospital deleted successfully.');
 }


    public function show($id)
    {
        $hospital = Hospital::with('location')->findOrFail($id);

        return view('frontend.hospitals.show', compact('hospital'));
    } 
}

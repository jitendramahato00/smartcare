<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $locations = Location::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%$search%")
                         ->orWhere('district', 'like', "%$search%")
                         ->orWhere('province', 'like', "%$search%");
        })->orderBy('id', 'desc')->paginate(10);

        return view('backend.locations.index', compact('locations', 'search'));
    }

    public function create()
    {
        return view('backend.locations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
        ]);

        Location::create($request->only(['name', 'district', 'province']));

        return redirect()->route('backend.locations.index')->with('success', 'Location created successfully.');
    }

    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('backend.locations.edit', compact('location'));
    }

    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'province' => 'required|string|max:255',
        ]);

        $location->update($request->only(['name', 'district', 'province']));

        return redirect()->route('backend.locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        Location::destroy($id);
        return redirect()->route('backend.locations.index')->with('success', 'Location deleted successfully.');
    }
}





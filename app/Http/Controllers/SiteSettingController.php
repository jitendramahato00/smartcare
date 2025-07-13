<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteSetting;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    public function index() {
        $setting = SiteSetting::pluck('value', 'key')->toArray();
        return view('backend.settings.form', compact('setting'));
    }

    public function update(Request $request) {
        $request->validate([
            'sitename' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'address' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'opening_hours' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time().'_'.$logo->getClientOriginalName();
            $logoPath = $logo->storeAs('public/logos', $logoName);
            $logourl = 'storage/logos/'.$logoName;

            $existingLogo = SiteSetting::where('key', 'logo')->value('value');
            if ($existingLogo && Storage::exists(str_replace('storage/', 'public/', $existingLogo))) {
                Storage::delete(str_replace('storage/', 'public/', $existingLogo));
            }

            SiteSetting::updateOrCreate(['key' => 'logo'], ['value' => $logourl]);
        }

        foreach($request->except('_token', 'logo') as $key => $value){
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}

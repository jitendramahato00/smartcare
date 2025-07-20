<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SiteSettingController;

use Illuminate\Http\Request;
use App\SiteSetting;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
     public function index(){
        $setting = SiteSetting::pluck('key', 'value')->toArray();
        dd($setting);
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
              
            if($request->logo && $request->hasFile('logo')){
               $file = $request->logo;
               $filename = time().'_'. rand(10,11111111111111) .$file->getClientOriginalName();
               $path = public_path().'/settings';
               $file->move($path,$filename);

               $file_exist = SiteSetting::where('key','logo')->first();
             //    dd($file_exist);
               if($file_exist){
                $filepath = public_path() .'/'.("settings/$file_exist->value");
                // dd($filepath);
                if(file_exists($filepath)){
                    unlink($filepath);
                }
              }

               SiteSetting::updateOrCreate(['key' => 'logo'], ['key' => 'logo', 'value' => $filename]);
            }

        

        foreach($request->except('_token', 'logo') as $key => $value){
            SiteSetting::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}

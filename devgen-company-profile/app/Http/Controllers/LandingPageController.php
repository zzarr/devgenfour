<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Models\Project;
use App\Models\Services;
use App\Models\Partners;
use App\Models\Team;
use App\Models\AboutUs; // Pastikan AboutUs diimport

class LandingPageController extends Controller
{
    public function index()
    {
        $appSetting = AppSetting::first();
        $projects = Project::all();
        $aboutUs = AboutUs::first(); 
        $services = Services::all();
        $partners = Partners::all();
        $team = Team::all();
        $numbers = AppSetting::all(); 

        return view('home', compact('appSetting', 'projects', 'aboutUs', 'services', 'partners', 'team', 'numbers'));
    }

    public function about()
    {
        $aboutUs = AboutUs::first();
        $appSetting = AppSetting::first();
        $numbers = AppSetting::all();
        

        return view('AboutUs', compact('aboutUs', 'appSetting', 'numbers')); // Nama view harus sesuai dengan nama file view
    }

    public function edit($id)
    {
        $settings = AppSetting::find($id);

        return view('admin.app_setting', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $settings = AppSetting::find($id);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $settings->logo = $filename;
        }

        $settings->update($request->all());

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Models\Project;
use App\Models\AboutUs;

class LandingPageController extends Controller
{
    public function index()
    {
        $appSetting = AppSetting::first();
        $projects = Project::all();
        $aboutUs = AboutUs::first(); 
        return view('home', compact('appSetting', 'projects', 'aboutUs'));
    }

    public function about()
    {
        $aboutUs = AboutUs::first(); 
        return view('about', compact('aboutUs'));
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

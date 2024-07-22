<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\AppSetting;
use Illuminate\Http\Request;


class LandingPageController extends Controller
{
    public function index()
    {
        $appSetting = AppSetting::first();
        $services = Services::first();
        return view('home', compact('appSetting','services'));
    }

    public function edit($id)
    {

        return view('admin.app_setting', compact('settings'));
    }

    public function update(Request $request, $id)
    {
        $settings = AppSetting::find($id);

        // Handle file upload
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);
            $settings->logo = $filename;
        }

        $settings->update($request->all());

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}

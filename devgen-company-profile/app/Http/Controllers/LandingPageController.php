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
        $numbers = AppSetting::all();
        $projects = Project::all();
        $aboutUs = AboutUs::first();

        return view('home', compact('appSetting', 'projects', 'aboutUs', 'numbers'));
    }

    public function about()
    {
        return view('AboutUs');
    }
}

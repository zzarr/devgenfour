<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Models\Project;
use App\Models\Services;
use App\Models\Partners;
use App\Models\Team;



class LandingPageController extends Controller
{
    public function index()
    {
        $appSetting = AppSetting::first();
        $services = Services::first();
        $projects = Project::all();
        $partners = Partners::all();
        $team = Team::all();
        return view('home', compact('appSetting', 'projects','services','partners','team'));
    }

    public function edit($id)
    {

        return view('admin.app_setting', compact('settings'));
    }

    public function about()
    {
        return view('AboutUs');
    }
}

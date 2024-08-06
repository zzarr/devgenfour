<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppSetting;
use App\Models\Project;
use App\Models\Services;
use App\Models\Partners;
use App\Models\Team;
use App\Models\AboutUs; // Pastikan AboutUs diimport
use App\Models\Choose;

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
        $choose = Choose::all();


        return view('home', compact('appSetting', 'projects', 'services', 'partners', 'team', 'numbers', 'aboutUs', 'choose'));
    }




    public function about()
    {
        $aboutUs = AboutUs::first();
        $appSetting = AppSetting::first();
        $numbers = AppSetting::all();


        return view('AboutUs', compact('aboutUs', 'appSetting', 'numbers')); // Nama view harus sesuai dengan nama file view
    }


    public function services()
    {
        $aboutUs = AboutUs::first();
        $appSetting = AppSetting::first();
        return view('Services', compact('aboutUs', 'appSetting'));
    }

    public function contact()
    {
        $aboutUs = AboutUs::first();
        $appSetting = AppSetting::first();
        return view('Contact', compact('aboutUs', 'appSetting'));
    }

    public function project()
    {
        $aboutUs = AboutUs::first();
        $appSetting = AppSetting::first();
        $projects = Project::all();
        return view('Project-galery', compact('projects', 'aboutUs', 'appSetting'));
    }

    public function services_detail($id)
    {
        $appSetting = AppSetting::first();
        $services = Services::find($id);
        $project = Project::find($id);

        return view('services-detail', compact('services', 'appSetting', 'project'));
    }
}

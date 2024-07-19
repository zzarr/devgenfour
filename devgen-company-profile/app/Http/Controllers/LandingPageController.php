<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppSetting;

use App\Http\Controllers\Controller;

class LandingpageController extends Controller
{
    public function index()
    {
        $appSetting = AppSetting::first();
        return view('home', compact('appSetting'));
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
    public function index()
    {
        return view('Admin.dashboard');
    }
}

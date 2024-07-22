<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
    public function index()
    {
        $visitorCount = \App\Models\Visitor::count();
        return view('Admin.dashboard', compact('visitorCount'));
    }
}

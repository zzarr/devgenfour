<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCounter;
use App\Models\DetailProjectCounter;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
    public function index()
    {
        $visitorCount = \App\Models\Visitor::count();
        $projectCounter = ProjectCounter::first();
        $projectCount = $projectCounter ? $projectCounter->count : 0;
        
        $detailProjectCounter = DetailProjectCounter::first();
        $detailProjectCount = $detailProjectCounter ? $detailProjectCounter->count : 0;
        
        return view('Admin.dashboard', compact('visitorCount', 'projectCount', 'detailProjectCount'));
    }
}

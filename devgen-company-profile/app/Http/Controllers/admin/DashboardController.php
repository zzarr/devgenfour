<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCounter;
use App\Models\DetailProjectCounter;
use App\Models\Visitor;
use App\Models\AboutUsCounter;
use Illuminate\Http\Request;
use Spatie\FlareClient\View;

class DashboardController extends Controller
{
    public function index()
    {
        $visitorCount = Visitor::count();
        $projectCounter = ProjectCounter::first();
        $aboutUsCount = AboutUsCounter::count();
        $projectCount = $projectCounter ? $projectCounter->count : 0;

        $detailProjectCount = DetailProjectCounter::count();


        return view('Admin.dashboard', compact('visitorCount', 'projectCount', 'detailProjectCount', 'aboutUsCount'));
    }
}

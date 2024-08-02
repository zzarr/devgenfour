<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\ProjectCounter;
use App\Models\AppSetting;
use App\Models\ProjectImg;
use Illuminate\Http\Request;

class ProjectCounterController extends Controller
{
    public function increment(Request $request)
    {
        $projectCounter = new ProjectCounter();
        $projectCounter->ip_address = $request->ip_address;
        $projectCounter->visited_at = now();
        $projectCounter->save();

        return response()->json(['success' => true]);
    }

}

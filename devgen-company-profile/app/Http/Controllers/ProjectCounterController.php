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
        $counter = ProjectCounter::firstOrCreate(['id' => 1]);
        $counter->count += 1;
        $counter->save();

        return response()->json(['count' => $counter->count]);
    }

}

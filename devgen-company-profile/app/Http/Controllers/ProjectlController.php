<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\AppSetting;
use App\Models\ProjectImg;
use Illuminate\Http\Request;

class ProjectlController extends Controller
{
    public function show($id)
    {

        // $project = $this->projects[$id];
        // return view('project', compact('project'));
        $appSetting = AppSetting::first();
        $numbers = AppSetting::all();
        $project = Project::where('id', $id)->first();
        // dd($project);
        $projects = Project::all();
        $projectimg = ProjectImg::where('id_project', $id)->get();
        return view('project', compact('appSetting', 'project', 'projects', 'projectimg', 'numbers'));
    }
}

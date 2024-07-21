<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\AppSetting;
use App\Models\ProjectImg;
use Illuminate\Http\Request;

class ProjectlController extends Controller
{
    public function show($id_project)
    {

        // $project = $this->projects[$id_project];
        // return view('project', compact('project'));
        $appSetting = AppSetting::first();
        $project = Project::where('id_project',$id_project)->first();
        // dd($project);
        $projects = Project::all();
        $projectimg = ProjectImg::where('id_project',$id_project)->get(); 
        return view('project', compact('appSetting', 'project', 'projects', 'projectimg'));
    }
}

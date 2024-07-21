<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectlController extends Controller
{
    private $projects = [
        1 => [
            'title' => 'Project 1',
            'description' => '(1) Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incidiunt labore et dolore magna
                        aliqua. Quis ipsum suspendisse ultrices gravida',
            'client' => 'Client 1',
            'category' => 'Category 1',
            'date' => '2024-02-28',
            'image1' => 'https://phantran.net/wp-content/uploads/2019/08/startup.jpg',
            'image2' => 'https://wpadmin.uk2.net/app/uploads/sites/3/2017/09/startup-scaled-1.jpg'
        ],
        2 => [
            'title' => 'Project 2',
            'description' => '(2)Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                        sed do eiusmod tempor incidiunt labore et dolore magna
                        aliqua. Quis ipsum suspendisse ultrices gravida.',
            'client' => 'Client 2',
            'category' => 'Category 2',
            'date' => '2024-03-01',
            'image1' => 'https://www.skillslab.io/app/uploads/2019/08/cropped-Best-Start-Pages.jpeg',
            'image2' => 'https://www.val-chris.com/wp-content/uploads/2013/06/website-launch.jpg'
        ],
        // Tambahkan proyek lainnya jika diperlukan
    ];

    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }

    public function show($id_project)
    {

        // $project = $this->projects[$id_project];
        // return view('project', compact('project'));
        $project = Project::findOrFail($id_project);
        return view('project', compact('project'));
    }
}

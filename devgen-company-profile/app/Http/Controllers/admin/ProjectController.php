<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImg;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class ProjectController extends Controller
{
    public function index()
    {
        return view('Admin.project');
    }

    public function datatable(Request $request)
    {
        $projects = Project::query();

        return DataTables::of($projects)
            ->addColumn('thumbnail', function ($projects) {
                return '<img src="' . asset('project/thumbnail/' . $projects->thumbnail) . '" alt="Thumbnail" width="100">';
            })
            ->addColumn('action', function ($projects) {
                return '<a href="' . route('editproject_admin', $projects->id) . '" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                        <a data-target="#modal-hapus" href="' . route('deleteproject_admin', $projects->id) . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>';
            })
            ->rawColumns(['thumbnail', 'action'])
            ->make(true);
    }

    public function create()
    {
        return view('Admin.projectadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'thumbnail', 'images']);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('project/thumbnail'), $filename);
            $data['thumbnail'] = $filename;
        } else {
            $data['thumbnail'] = null;
        }

        // Insert project using Eloquent
        $project = Project::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'thumbnail' => $data['thumbnail'],
        ]);

        // Debug: Check the ID of the created project
        Log::info('Created project ID: ' . $project->id);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('project/image'), $filename);

                // Use Eloquent to create project images
                ProjectImg::create([
                    'id_project' => $project->id,
                    'image_name' => $filename,
                ]);
            }
        }

        return redirect()->route('project_admin')->with('success', 'Project berhasil ditambahkan');
    }

    public function edit($id)
    {
        $projects = Project::findOrFail($id);
        $images = ProjectImg::where('id_project', $id)->get(); // Corrected condition here
        return view('Admin.projectedit', compact('projects', 'images'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'thumbnail', 'images']);
        $project = Project::findOrFail($id);

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('project/thumbnail'), $filename);
            $data['thumbnail'] = $filename;
        } else {
            $data['thumbnail'] = $project->thumbnail;
        }

        $project->update($data);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('project/image'), $filename);

                ProjectImg::create([
                    'id_project' => $id,
                    'image_name' => $filename,
                ]);
            }
        }

        return redirect()->route('project_admin')->with('success', 'Project berhasil diperbarui');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        // Delete related images
        ProjectImg::where('id_project', $id)->delete();

        return redirect()->route('project_admin')->with('success', 'Project berhasil dihapus');
    }
}

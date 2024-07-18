<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectImg;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

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
                return '<a href="' . route('editproject_admin', $projects->id_project) . '" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                        <button data-toggle="modal" data-target="#modal-hapus' . $projects->id_project . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>';
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
        $data['id_project'] = (string) Str::uuid();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('project/thumbnail'), $filename);
            $data['thumbnail'] = $filename;
        } else {
            $data['thumbnail'] = null;
        }

        Project::create($data);

        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('project/image'), $filename);

                \App\Models\ProjectImg::create([
                    'id_project' => $data['id_project'],
                    'image_name' => $filename,
                ]);
            }
        }

        return redirect()->route('project_admin')->with('success', 'Project berhasil ditambahkan');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        $images = \App\Models\ProjectImg::where('id_project', $id)->get();
        return view('Admin.projectedit', compact('project', 'images'));
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

                \App\Models\ProjectImg::create([
                    'id_project' => $id,
                    'image_name' => $filename,
                ]);
            }
        }

        return redirect()->route('project_admin')->with('success', 'Project berhasil diperbarui');
    }

    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        \App\Models\ProjectImg::where('id_project', $id)->delete();

        return redirect()->route('project_admin')->with('success', 'Project berhasil dihapus');
    }
}

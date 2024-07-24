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
                return '<a href="' . route('editproject_admin', $projects->id) . '" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                        <a  data-target="#modal-hapus" href="' . route('deleteproject_admin', $projects->id) . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>';
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
        $data['id'] = (string) Str::uuid();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('project/thumbnail'), $filename);
            $data['thumbnail'] = $filename;
        } else {
            $data['thumbnail'] = null;
        }

        DB::table('projects')->insert([
            'id' => $data['id'],
            'title' => $data['title'],
            'description' => $data['description'],
            'thumbnail' => $data['thumbnail'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('project/image'), $filename);

                ProjectImg::create([
                    'id' => $data['id'],
                    'image_name' => $filename,
                ]);
            }
        }

        return redirect()->route('project_admin')->with('success', 'Project berhasil ditambahkan');
    }

    public function edit($id)
    {
        $projects = Project::findOrFail($id);
        $images = ProjectImg::where('id', $id)->get();
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

                \App\Models\ProjectImg::create([
                    'id' => $id,
                    'image_name' => $filename,
                ]);
            }
        }

        return redirect()->route('project_admin')->with('success', 'Project berhasil diperbarui');
    }

    public function destroy($id)
    {
        Project::findOrFail($id)->delete();
        \App\Models\ProjectImg::where('id', $id)->delete();

        return redirect()->route('project_admin')->with('success', 'Project berhasil dihapus');
    }
}

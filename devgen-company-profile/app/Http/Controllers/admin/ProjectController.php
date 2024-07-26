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
            $projects = Project::all();
    foreach ($projects as $project) {
        // Hapus tag <p> dan </p>
        $project->description = str_replace(['<p>', '</p>'], '', $project->description);
    }
        return view('Admin.project', compact('projects')); // inisiasi fungsi untuk menghilangkan tag
    }

    public function datatable(Request $request)
    {
        $data = Project::query();
        return datatables()
        ->of($data)
        ->editColumn('description', function ($project) {
            return strip_tags($project->description, '<b><i><u>'); // Menghilangkan <p> tag
        })
        ->toJson();
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

    // Handle thumbnail update
    if ($request->hasFile('thumbnail')) {
        // Delete old thumbnail if exists
        if ($project->thumbnail) {
            $oldThumbnailPath = public_path('project/thumbnail/' . $project->thumbnail);
            if (file_exists($oldThumbnailPath)) {
                unlink($oldThumbnailPath);
            }
        }

        // Upload new thumbnail
        $file = $request->file('thumbnail');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('project/thumbnail'), $filename);
        $data['thumbnail'] = $filename;
    } else {
        $data['thumbnail'] = $project->thumbnail; // Preserve existing thumbnail if no new one is provided
    }

    $project->update($data);

    // Handle project images update
    if ($request->hasFile('images')) {
        // Delete all existing images
        $existingImages = ProjectImg::where('id_project', $id)->get();
        foreach ($existingImages as $image) {
            $imagePath = public_path('project/image/' . $image->image_name);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }

        // Upload new images
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
    
        // Delete related images from filesystem
        $projectImages = ProjectImg::where('id_project', $id)->get();
        foreach ($projectImages as $image) {
            if (!empty($image->filename)) {
                $imagePath = public_path('project/image/' . $image->filename);
                $thumbnailPath = public_path('project/thumbnail/' . $image->filename);
    
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
    
                if (file_exists($thumbnailPath) && is_file($thumbnailPath)) {
                    unlink($thumbnailPath);
                }
            }
        }
    
        // Delete related images from database
        ProjectImg::where('id_project', $id)->delete();
    
        // Delete the project
        $project->delete();
    
        return response()->json(['success' => 'Project berhasil dihapus.']);
    }
    
    public function deleteImage(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');
    
        if ($type == 'thumbnail') {
            $project = Project::findOrFail($id);
            $thumbnailPath = public_path('project/thumbnail/' . $project->thumbnail);
            if (file_exists($thumbnailPath)) {
                unlink($thumbnailPath);
            }
            $project->thumbnail = null;
            $project->save();
        } elseif ($type == 'image') {
            $image = ProjectImg::findOrFail($id);
            $imagePath = public_path('project/image/' . $image->image_name);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $image->delete();
        }
    
        return response()->json(['success' => 'Image deleted successfully']);
    }

}

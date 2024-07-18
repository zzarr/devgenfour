<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.project');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.projectadd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input untuk memastikan data yang dimasukkan sesuai dengan harapan
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'thumbnail', 'images']);
        $data['id_project'] = (string) Str::uuid();

        // Mengelola upload file thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = $request->title . '_' . $file->getClientOriginalName();
            $file->move(public_path('project/thumbnail'), $filename);
            $data['thumbnail'] = $filename;
        }

        // Insert data ke tabel projects
        DB::table('projects')->insert([
            'id_project' => $data['id_project'],
            'title' => $data['title'],
            'description' => $data['description'],
            'thumbnail' => $data['thumbnail'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Mengelola upload file gambar tambahan
        if ($request->hasFile('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('project/image'), $filename);

                DB::table('project_imgs')->insert([

                    'id_project' => $data['id_project'],
                    'image_name' => $filename,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('project_admin')->with('success', 'Project berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('Admin.projectedit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

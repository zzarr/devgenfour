<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Choose;
use Yajra\DataTables\Facades\DataTables;

class ChooseController extends Controller
{
    public function index()
    {
        $chooseItems = Choose::all();
    foreach ($chooseItems as $choose) {
        // Hapus semua tag HTML
        $choose->description = strip_tags($choose->description);
    }
    return view('Admin.choose', compact('chooseItems')); // inisiasi fungsi untuk menghilangkan <html> tag
    }

    public function datatable(Request $request)

    {
        $data = Choose::query();
        return datatables()
        ->of($data)
        ->editColumn('description', function ($choose) {
            $description = strip_tags($choose->description); // Menghilangkan <p> tag
            if (strlen($description) > 100) {
                $description = substr($description, 0, 80) . '...';
            }
            return $description;
        })
        ->toJson();
    }

    public function create()
    {
        return view('Admin.chooseadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        // Ensure the directory exists
        if (!file_exists(public_path('choose'))) {
            mkdir(public_path('choose'), 0755, true);
        }
    
        // Handle file upload
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('choose'), $filename);
        } else {
            return redirect()->route('choose_admin')->with('error', 'File upload failed.');
        }
    
        // Create the service
        Choose::create([
            'icon' => $filename,
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        return redirect()->route('choose_admin')->with('success', 'Choose berhasil ditambahkan');
    }

    public function show($id) // If you're using resource routes, this method needs to be defined
    {
        $choose = Choose::findOrFail($id);
        return view('Admin.choose_show', compact('choose'));
    }

    public function edit($id)
    {
        $choose = Choose::findOrFail($id);
        return view('Admin.chooseedit', compact('choose'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input untuk memastikan data yang dimasukkan sesuai dengan harapan
        $request->validate([
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
    
        $data = $request->except(['_token', '_method', 'icon']);
    
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('choose'), $filename);
            $data['icon'] = $filename;
        } else {
            $data['icon'] = Choose::where('id', $id)->value('icon');
        }
    
        Choose::where('id', $id)->update($data);

        return redirect()->route('choose_admin')->with('success', 'Choose berhasil diubah');
    }

    public function destroy($id)
    {
        $choose = Choose::findOrFail($id);
    
        $imagePath = public_path('choose/' . $choose->icon);
    
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        $choose->delete();
    
        return response()->json(['success' => 'Item deleted successfully.']);
    }
}
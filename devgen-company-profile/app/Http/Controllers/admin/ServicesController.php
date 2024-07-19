<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.services');
    }

    /**
     * Get data for DataTables.
     */
    public function datatable(Request $request)
    {
        $data = Services::query();
        return DataTables::of($data)->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.servicesadd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string|max:255',
        ]);
    
        // Ensure the directory exists
        if (!file_exists(public_path('services'))) {
            mkdir(public_path('services'), 0755, true);
        }
    
        // Handle file upload
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('services'), $filename);
        } else {
            return redirect()->route('services_admin')->with('error', 'File upload failed.');
        }
    
        // Create the service
        Services::create([
            'icon' => $filename,
            'title' => $request->title,
        ]);
    
        return redirect()->route('services_admin')->with('success', 'Service berhasil ditambahkan');
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Services::findOrFail($id);
        return view('Admin.servicesedit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         // Validasi input untuk memastikan data yang dimasukkan sesuai dengan harapan
         $request->validate([
             'title' => 'required|string|max:255',
             'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
         ]);
     
         // Mengumpulkan data dari request, kecuali field '_token', '_method', dan 'icon'
         $data = $request->except(['_token', '_method', 'icon']);
     
         // Jika ada file icon yang diunggah, kelola unggah file
         if ($request->hasFile('icon')) {
             $file = $request->file('icon');
             $filename = "icon." . $file->getClientOriginalExtension();
            //  $filename = time() . '.' . $file->getClientOriginalExtension();
             $file->move(public_path('services'), $filename);
     
             // Tambahkan nama file ke array data
             $data['icon'] = $filename;
         } else {
             // Jika tidak ada icon yang diunggah, tetap gunakan icon yang sudah ada
             $data['icon'] = Services::where('id_services', $id)->value('icon');
         }
     
         // Perbarui data di database
        DB::table('services')->where('id_services', $id)->update($data);
        //  Services::where('id_services', $id)->update($data);
     
         // Redirect ke route 'services_admin' dengan pesan sukses
         return redirect()->route('services_admin')->with('success', 'Service berhasil diubah');
     }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the service record
        $service = Services::findOrFail($id);
    
        // Get the path to the image file
        $imagePath = public_path('services/' . $service->icon);
    
        // Delete the image file if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    
        // Delete the service record
        $service->delete();
    
        // Return a success response
        return response()->json(['success' => 'Item deleted successfully.']);
    }
    
}

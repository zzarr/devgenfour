<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;


class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serviceItems = Services::all();
        foreach ($serviceItems as $service) {
            // Hapus semua tag HTML
            $service->description = strip_tags($service->description);
        }
        return view('Admin.services', compact('serviceItems')); // inisiasi fungsi untuk menghilangkan <html> tag
    }

    /**
     * Get data for DataTables.
     */
    public function datatable(Request $request)
    {
        $data = Services::query();
        return datatables()
            ->of($data)
            ->editColumn('description', function ($service) {
                $description = strip_tags($service->description); // Menghilangkan <p> tag
                if (strlen($description) > 100) {
                    $description = substr($description, 0, 80) . '...';
                }
                return $description;
            })
            ->toJson();
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
            'description' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'long_description' => 'nullable|string',
        ]);

        // Ensure the directory exists
        if (!file_exists(public_path('services'))) {
            mkdir(public_path('services'), 0755, true);
        }

        // Handle file upload
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = '/services/icon' . $request->title . '_' . $file->getClientOriginalName();
            $file->move(public_path('services'), $filename);
        } else {
            return redirect()->route('services_admin')->with('error', 'File upload failed.');
        }

        if ($request->hasFile('gambar')) {
            $imageFile = $request->file('gambar');
            $imageFilename = '/services/gambar' . $request->title . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('services'), $imageFilename);
        } else {
            $imageFilename = null;
        }

        Services::create([
            'icon' => $filename,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
            'long_description' => $request->long_description,


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
            'description' => 'nullable|string',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'long_description' => 'nullable|string',
        ]);

        // Mengumpulkan data dari request, kecuali field '_token', '_method', 'icon', dan 'gambar'
        $data = $request->except(['_token', '_method', 'icon', 'gambar']);

        // Jika ada file icon yang diunggah, kelola unggah file
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $filename = '/services/icon' . $request->title . '_' . $file->getClientOriginalName();
            $file->move(public_path('services'), $filename);

            // Tambahkan nama file ke array data
            $data['icon'] = $filename;
        } else {
            // Jika tidak ada icon yang diunggah, tetap gunakan icon yang sudah ada
            $data['icon'] = Services::where('id', $id)->value('icon');
        }

        // Jika ada file gambar yang diunggah, kelola unggah file
        if ($request->hasFile('gambar')) {
            $imageFile = $request->file('gambar');
            $imageFilename = '/services/gambar' . $request->title . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path('services'), $imageFilename);

            // Tambahkan nama file ke array data
            $data['image'] = $imageFilename;
        } else {
            // Jika tidak ada gambar yang diunggah, tetap gunakan gambar yang sudah ada
            $data['image'] = Services::where('id', $id)->value('image');
        }

        // Perbarui data di database
        $service = Services::find($id);

        if ($service) {
            $service->update($data);

            // Redirect ke route 'services_admin' dengan pesan sukses
            return redirect()->route('services_admin')->with('success', 'Service berhasil diubah');
        }

        // Redirect ke route 'services_admin' dengan pesan error jika service tidak ditemukan
        return redirect()->route('services_admin')->with('error', 'Service tidak ditemukan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Services::findOrFail($id);

        if ($service->icon) {
            $iconPath = public_path('services/' . $service->icon);
            if (file_exists($iconPath)) {
                unlink($iconPath);
            }
        }

        if ($service->image) {
            $imagePath = public_path('services/' . $service->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $service->delete();

        return response()->json(['success' => 'Item deleted successfully.']);
    }

    public function deleteImage(Request $request)
    {
        $id = $request->input('id');
        $type = $request->input('type');

        $service = Services::findOrFail($id);

        if ($type == 'icon') {
            $iconPath = public_path('services' . $service->icon);
            if (file_exists($iconPath)) {
                unlink($iconPath);
            }
            $service->icon = null; // Menghapus path dari database
            $service->save();
        } elseif ($type == 'image') {
            $imagePath = public_path('services' . $service->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            $service->image = null; // Menghapus path dari database
            $service->save();
        }

        return response()->json(['success' => 'Image deleted successfully']);
    }
}

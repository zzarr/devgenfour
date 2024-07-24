<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = AboutUs::first();
        return view('Admin.about', compact('about'));
    }

    public function update(Request $request, $id)
    {
        // Mengumpulkan data dari request, kecuali field '_token', '_method', dan 'gambar'
        $data = $request->except(['_token', '_method', 'gambar']);

        $aboutUs = AboutUs::findOrFail($id);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = "about/gambar." . $file->getClientOriginalExtension();
            $file->move(public_path('about'), $filename);

            // Tambahkan nama file ke array data
            $data['gambar'] = $filename;
        } else {
            // Jika tidak ada gambar yang diunggah, tetap gunakan gambar yang sudah ada
            $data['gambar'] = $aboutUs->image;
        }

        // Update data di database
        $aboutUs->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['gambar'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke route 'about_admin' dengan pesan sukses
        return redirect()->route('about_admin')->with('success', 'Data berhasil diubah');
    }
}

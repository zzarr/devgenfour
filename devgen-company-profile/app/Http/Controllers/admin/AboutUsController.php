<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutUsController extends Controller
{
    public function index()
    {
        $about = DB::table('about_us')->first();
        return view('Admin.about', compact('about'));
    }

    public function update(Request $request, $id)
    {
        // Mengumpulkan data dari request, kecuali field '_token', '_method', dan 'logo'
        $data = $request->except(['_token', '_method', 'gambar']);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = "about/gambar." . $file->getClientOriginalExtension();
            $file->move(public_path('about'), $filename);

            // Tambahkan nama file ke array data
            $data['gambar'] = $filename;
        } else {
            // Jika tidak ada gambar yang diunggah, tetap gunakan gambar yang sudah ada
            $data['gambar'] = DB::table('about_us')->where('id_about_us', $id)->value('gambar');
        }

        // Update data di database
        DB::table('about_us')->where('id_about_us', $id)->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'image' => $data['gambar'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke route 'app_setting_admin' dengan pesan sukses
        return redirect()->route('about_admin')->with('success', 'Data berhasil diubah');
    }
}

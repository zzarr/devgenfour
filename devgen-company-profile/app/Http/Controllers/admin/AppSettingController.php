<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = DB::table('app_settings')->first();;
        return view('Admin.app_setting', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input untuk memastikan data yang dimasukkan sesuai dengan harapan
        $request->validate([
            'name_app' => 'required|string|max:255',
            'desc' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'no_contact' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'instagram' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'gmaap_coordinat' => 'nullable|string',
        ]);

        // Mengumpulkan data dari request, kecuali field '_token', '_method', dan 'logo'
        $data = $request->except(['_token', '_method', 'logo']);

        // Jika ada file logo yang diunggah, kelola upload file
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = "logo." . $file->getClientOriginalExtension();
            $file->move(public_path('img'), $filename);

            // Tambahkan nama file ke array data
            $data['logo'] = $filename;
        } else {
            // Jika tidak ada logo yang diunggah, tetap gunakan logo yang sudah ada
            $data['logo'] = DB::table('app_settings')->where('id_setting', $id)->value('logo');
        }

        // Update data di database
        DB::table('app_settings')->where('id_setting', $id)->update($data);

        // Redirect ke route 'app_setting_admin' dengan pesan sukses
        return redirect()->route('app_setting_admin')->with('success', 'Data berhasil diubah');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

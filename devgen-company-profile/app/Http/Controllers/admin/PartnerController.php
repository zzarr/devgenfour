<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = DB::table('partners')->get();
        return view('Admin.partner', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.partneradd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'image']);

        // Mengelola upload file image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('partners'), $filename);
            $data['image'] = $filename;
        }

        DB::table('partners')->insert([
            'image' => $data['image'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('partner_admin')->with('success', 'Partner berhasil ditambahkan');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $partner = DB::table('partners')->where('id', $id)->first();
        return view('Admin.partneredit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->except(['_token', '_method', 'image']);

        // Mengelola upload file image
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('partners'), $filename);
            $data['image'] = $filename;
        } else {
            $data['image'] = DB::table('partners')->where('id', $id)->value('image');
        }

        DB::table('partners')->where('id', $id)->update([
            'image' => $data['image'],
            'updated_at' => now(),
        ]);

        return redirect()->route('partner_admin')->with('success', 'Partner berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Menghapus data partner dari tabel partners
        $partner = DB::table('partners')->where('id', $id)->first();

        if ($partner) {
            // Menghapus file image dari direktori public
            $image_path = public_path('partners') . '/' . $partner->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            // Menghapus data dari tabel partners
            DB::table('partners')->where('id', $id)->delete();
        }

        return redirect()->route('partner_admin')->with('success', 'Partner berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.partner');
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
        $data = $request->except(['_token', '_method',  'image']);
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('Admin.partneredit');
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

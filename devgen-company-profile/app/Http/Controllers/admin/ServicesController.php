<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'Services';
        return view('Admin.services', compact('page'));
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
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        DB::table('services')->insert([
            'icon' => $request->icon,
            'title' => $request->title,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('services.index')->with('success', 'Service berhasil ditambahkan');
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = DB::table('services')->where('id_services', $id)->first();
        return view('Admin.servicesedit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        DB::table('services')->where('id_services', $id)->update([
            'icon' => $request->icon,
            'title' => $request->title,
            'updated_at' => now(),
        ]);

        return redirect()->route('services.index')->with('success', 'Service berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('services')->where('id_services', $id)->delete();
        return redirect()->route('services.index')->with('success', 'Service berhasil dihapus');
    }
}

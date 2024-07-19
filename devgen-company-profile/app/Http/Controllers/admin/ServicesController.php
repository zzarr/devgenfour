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
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        Services::create([
            'icon' => $request->icon,
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
        $request->validate([
            'icon' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        $service = Services::findOrFail($id);
        $service->update([
            'icon' => $request->icon,
            'title' => $request->title,
        ]);

        return redirect()->route('services_admin')->with('success', 'Service berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $service = Services::findOrFail($id);
        $service->delete();
        return redirect()->route('services_admin')->with('success', 'Service berhasil dihapus');
    }
}

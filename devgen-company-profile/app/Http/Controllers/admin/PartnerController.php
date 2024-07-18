<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partners;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class PartnerController extends Controller
{
    public function index()
    {
        return view('Admin.partner');
    }

    public function datatable(Request $request)
    {
        $data = Partners::query();
        return DataTables::of($data)
            ->addColumn('image', function($row) {
                return asset('partners/'.$row->image);
            })
            ->addColumn('action', function($row) {
                $editUrl = route('editpartner_admin', $row->id_partner);
                $deleteUrl = route('deletepartner_admin', $row->id_partner);
                return '<a href="'.$editUrl.'" class="btn btn-outline-info btn-icon-circle btn-icon-circle-sm"><i class="ti ti-pencil"></i></a>
                        <button data-url="'.$deleteUrl.'" class="btn btn-outline-danger btn-icon-circle btn-icon-circle-sm btn-delete"><i class="ti ti-trash"></i></button>';
            })
            ->rawColumns(['image', 'action'])
            ->make(true);
    }
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
    public function edit($id)
    {
        $partner = Partners::findOrFail($id);
        return view('Admin.partneredit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $partner = Partners::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('partners'), $filename);
            $data['image'] = $filename;
        }

        $partner->update($data);

        return redirect()->route('partner_admin')
            ->with('success', 'Partner updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $partner = Partners::findOrFail($id);
        if (file_exists(public_path('partners/'.$partner->image))) {
            unlink(public_path('partners/'.$partner->image));
        }
        $partner->delete();

        return redirect()->route('partner_admin')
            ->with('success', 'Partner deleted successfully.');
    }
}

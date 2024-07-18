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
                return '<a href="'.$editUrl.'" class="btn btn-outline-info btn-icon-circle btn-icon-circle-sm"><i class="ti ti-pencil"></i></a>';
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

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partners;
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
        return DataTables::of($data)->make(true);
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
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Ensure the directory exists
        if (!file_exists(public_path('partners'))) {
            mkdir(public_path('partners'), 0755, true);
        }

        // Handle file upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = '/partners/' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('partners'), $filename);
        } else {
            return redirect()->route('partner_admin')->with('error', 'File upload failed.');
        }

        // Create the service
        Partners::create([
            'name' => $request->name,
            'image' => $filename,
        ]);

        return redirect()->route('partner_admin')->with('success', 'partnerF berhasil ditambahkan');
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
            'name' => 'required|string|max:255',
            'image' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $partner = Partners::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = '/' . 'partners/' . time() . '_' . $file->getClientOriginalName();
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

        $imagePath = public_path('partners/' . $partner->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $partner->delete();

        return response()->json(['success' => 'Item deleted successfully.']);
    }
}

<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Choose;
use Yajra\DataTables\Facades\DataTables;

class ChooseController extends Controller
{
    public function index()
    {
        return view('Admin.choose');
    }

    public function datatable(Request $request)

    {
        $data = Choose::query();
        return DataTables::of($data)->make();
    }

    public function create()
    {
        return view('Admin.chooseadd');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Choose::create($request->all());

        return redirect()->route('choose_admin')
            ->with('success', 'Choose created successfully.');
    }

    public function show($id) // If you're using resource routes, this method needs to be defined
    {
        $choose = Choose::findOrFail($id);
        return view('Admin.choose_show', compact('choose'));
    }

    public function edit($id)
    {
        $choose = Choose::findOrFail($id);
        return view('Admin.chooseedit', compact('choose'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $choose = Choose::findOrFail($id);
        $choose->update($request->all());

        return redirect()->route('choose_admin')
            ->with('success', 'Choose updated successfully');
    }

    public function destroy($id)
    {
        $choose = Choose::findOrFail($id);
        $choose->delete();

        return response()->json(['success' => 'Item deleted successfully.']);
    }
}
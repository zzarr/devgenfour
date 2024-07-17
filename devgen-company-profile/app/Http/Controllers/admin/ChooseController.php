<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Choose;
use Yajra\DataTables\Facades\DataTables;

class ChooseController extends Controller
{
    public function index(Request $request)
    {
        // Debug log
        \Log::info('ChooseController@index called');
    
        if ($request->ajax()) {
            $choose = Choose::all();
            return DataTables::of($choose)
                ->addColumn('action', function($row) {
                    $btn = '<a href="'.route('choose.edit', $row->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<form action="'.route('choose.destroy', $row->id).'" method="POST" style="display:inline;">
                            '.csrf_field().'
                            '.method_field("DELETE").'
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('Admin.choose');
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

        choose::create($request->all());

        return redirect()->route('choose.index')
            ->with('success', 'Choose created successfully.');
    }

    public function edit(Choose $choose)
    {
        return view('Admin.chooseedit');
    }

    public function update(Request $request, Choose $choose)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $choose->update($request->all());

        return redirect()->route('choose.index')
            ->with('success', 'Choose updated successfully');
    }

    public function destroy(Choose $choose)
    {
        $choose->delete();

        return redirect()->route('choose.index')
            ->with('success', 'Choose deleted successfully');
    }
}

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

    public function datatable(Request $request){
        $data = Choose::all();
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

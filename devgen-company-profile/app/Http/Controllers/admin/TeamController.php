<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        return view('Admin.team');
    }

    public function datatable(Request $request)
    {
        $data = Team::query();
        return DataTables::of($data)->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.teamadd');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input untuk memastikan data yang dimasukkan sesuai dengan harapan
        $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ]);

        // Mengumpulkan data dari request, kecuali field '_token', '_method', dan 'foto'
        $data = $request->except(['_token', '_method', 'foto']);

        // Jika ada file foto yang diunggah, kelola upload file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'team/' . $request->nama . "_" . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('team'), $filename);

            // Tambahkan nama file ke array data
            $data['foto'] = $filename;
        } else {
            $data['foto'] = null;
        }


        $data['created_at'] = now();
        $data['updated_at'] = now();

        Team::create([
            'name' => $data['name'],
            'jabatan' => $data['jabatan'],
            'foto' => $data['foto'],
            'facebook' => $request->facebook,
            'instagram' => $data['instagram'],
            'linkedin' => $data['linkedin'],
            'created_at' => $data['created_at'],
            'updated_at' => $data['updated_at'],
        ]);


        // Redirect ke route 'team_admin' dengan pesan sukses
        return redirect()->route('team_admin')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    // Implementasi detail team jika diperlukan

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $team = DB::table('teams')->where('id', $id)->first();
        return view('Admin.teamedit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input untuk memastikan data yang dimasukkan sesuai dengan harapan
        $request->validate([
            'name' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengumpulkan data dari request, kecuali field '_token', '_method', dan 'foto'
        $data = $request->except(['_token', '_method', 'foto']);

        // Jika ada file foto yang diunggah, kelola upload file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = 'team/' . $request->nama . "_" . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('team'), $filename);

            // Tambahkan nama file ke array data
            $data['foto'] = $filename;
        } else {
            // Jika tidak ada foto baru, ambil foto yang lama
            $data['foto'] = Team::find($id)->foto;
        }

        $data['updated_at'] = now();
        $team = Team::find($id);

        $team->name = $data['name'];
        $team->jabatan = $data['jabatan'];
        $team->foto = $data['foto'];
        $team->facebook = $request->facebook;
        $team->instagram = $data['instagram'];
        $team->linkedin = $data['linkedin'];
        $team->updated_at = $data['updated_at'];

        $team->save();

        // Redirect ke route 'team_admin' dengan pesan sukses
        return redirect()->route('team_admin')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data dari tabel 'teams'
        $team = Team::findOrFail($id);

        // Get the path to the image file
        $imagePath = public_path('team/' . $team->foto);

        // Delete the image file if it exists
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Delete the service record
        $team->delete();

        // Return a success response
        return response()->json(['success' => 'Item deleted successfully.']);
    }
}

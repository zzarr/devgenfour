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
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengumpulkan data dari request, kecuali field '_token', '_method', dan 'foto'
        $data = $request->except(['_token', '_method', 'foto']);

        // Jika ada file foto yang diunggah, kelola upload file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->nama . "_" . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('team'), $filename);

            // Tambahkan nama file ke array data
            $data['foto'] = $filename;
        } else {
            $data['foto'] = null;
        }

        $data['id_team'] = Str::uuid()->toString();
        $data['created_at'] = now();
        $data['updated_at'] = now();

        // Menambahkan data ke tabel 'teams'
        DB::table('teams')->insert($data);

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
        $team = DB::table('teams')->where('id_team', $id)->first();
        return view('Admin.teamedit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input untuk memastikan data yang dimasukkan sesuai dengan harapan
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mengumpulkan data dari request, kecuali field '_token', '_method', dan 'foto'
        $data = $request->except(['_token', '_method', 'foto']);

        // Jika ada file foto yang diunggah, kelola upload file
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = $request->nama . "_" . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('team'), $filename);

            // Tambahkan nama file ke array data
            $data['foto'] = $filename;
        } else {
            // Jika tidak ada foto baru, ambil foto yang lama
            $data['foto'] = DB::table('teams')->where('id_team', $id)->value('foto');
        }

        $data['updated_at'] = now();

        // Update data ke tabel 'teams'
        DB::table('teams')->where('id_team', $id)->update([
            'name' => $data['nama'],
            'jabatan' => $data['jabatan'],
            'foto' => $data['foto'],
            'updated_at' => $data['updated_at'],
        ]);

        // Redirect ke route 'team_admin' dengan pesan sukses
        return redirect()->route('team_admin')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Hapus data dari tabel 'teams'
        DB::table('teams')->where('id_team', $id)->delete();

        // Redirect ke route 'team_admin' dengan pesan sukses
        return redirect()->route('team_admin')->with('success', 'Data berhasil dihapus');
    }
}

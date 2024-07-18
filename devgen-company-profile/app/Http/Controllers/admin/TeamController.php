<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = DB::table('teams')->get();
        return view('Admin.team', compact('teams'));
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
            $filename = $request->nama . "." . $file->getClientOriginalExtension();
            $file->move(public_path('team'), $filename);

            // Tambahkan nama file ke array data
            $data['foto'] = $filename;
        }

        $data['id_team'] = Str::uuid()->toString();
        $data['created_at'] = now();
        $data['updated_at'] = now();

        // Menambahkan data ke tabel 'team'
        DB::table('teams')->insert(
            [
                'id_team' => $data['id_team'],
                'name' => $data['nama'],
                'jabatan' => $data['jabatan'],
                'foto' => $data['foto'],
                'created_at' => $data['created_at'],
                'updated_at' => $data['updated_at'],
            ]
        );

        // Redirect ke route 'team_admin' dengan pesan sukses
        return redirect()->route('team_admin')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view('Admin.teamedit');
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

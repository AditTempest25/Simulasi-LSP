<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterKota; // Import model MasterKota

class MasterKotaController extends Controller
{
    public function index()
    {
        $kota = MasterKota::all(); // Menampilkan data kota
        return view('admin.master-kota', compact('kota'));
    }

    public function create()
    {
        return view('admin.kota.create-kota');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_kota' => 'required|unique:master_kotas,nama_kota',
        ], [
            'nama_kota.unique' => 'Nama kota sudah ada, silakan gunakan nama lain.',
        ]);

        MasterKota::create([
            'nama_kota' => $request->nama_kota,
        ]);

        return redirect()->route('admin.master-kota')->with('success', 'Kota berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kota = MasterKota::find($id);
        return view('admin.kota.edit-kota', compact('kota'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kota' => 'required|unique:master_kotas,nama_kota,' . $id,
        ], [
            'nama_kota.unique' => 'Nama kota sudah ada, silakan gunakan nama lain.',
        ]);

        $kota = MasterKota::findOrFail($id);
        $kota->nama_kota = $request->nama_kota;
        $kota->save();

        return redirect()->route('admin.master-kota')->with('success', 'Kota berhasil diupdate');
    }


    public function destroy($id)
    {
        $kota = MasterKota::findOrFail($id);
        $kota->delete();
        return redirect()->route('admin.master-kota')->with('success', 'Kota berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maskapai;

class MaskapaiController extends Controller
{
    // Menampilkan daftar maskapai
    public function index()
    {
        $maskapai = Maskapai::all();
        return view('admin.maskapai', compact('maskapai'));
    }

    // Menampilkan form tambah maskapai
    public function create()
    {
        return view('admin.maskapai.create-maskapai');
    }

    // Menyimpan data maskapai baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_maskapai' => 'required|string|max:255',
            'logo_maskapai' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kelas' => 'required|in:Ekonomi,Bisnis,Eksekutif,Luxury',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        // Upload foto jika ada
        $path = null;
        if ($request->hasFile('logo_maskapai')) {
            $path = $request->file('logo_maskapai')->store('maskapai', 'public');
        }

        // Simpan data ke database
        // Simpan data ke database
        $maskapai = Maskapai::create([
            'nama_maskapai' => $request->nama_maskapai,
            'logo_maskapai' => $path,
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.maskapai')->with('success', 'Maskapai berhasil ditambahkan!');

        return redirect()->route('admin.maskapai')->with('success', 'Maskapai berhasil ditambahkan!');
    }


    // Menampilkan form edit maskapai
    public function edit($id)
    {
        $maskapai = Maskapai::findOrFail($id);
        return view('admin.maskapai.edit-maskapai', compact('maskapai'));
        
    }

    // Memperbarui data maskapai
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_maskapai' => 'required|string|max:255',
            'logo_maskapai' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'kelas' => 'required|in:Ekonomi,Bisnis,Eksekutif,Luxury',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $maskapai = Maskapai::findOrFail($id);

        if ($request->hasFile('logo_maskapai'   )) {
            $logo = $request->file('logo_maskapai')->store('logos', 'public');
            $maskapai->logo_maskapai = $logo;
        }

        $maskapai->update([
            'nama_maskapai' => $request->nama_maskapai,
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.maskapai')->with('success', 'Maskapai berhasil diperbarui.');
    }

    // Menghapus data maskapai
    public function destroy($id)
    {
        $maskapai = Maskapai::findOrFail($id);
        $maskapai->delete();
        return redirect()->route('admin.maskapai')->with('success', 'Maskapai berhasil dihapus.');
    }
}

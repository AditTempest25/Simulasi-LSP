<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalMaskapai;
use App\Models\Rute;
use Illuminate\Contracts\Pagination\Paginator;

class JadwalMaskapaiController extends Controller
{
    // Tampilkan daftar jadwal penerbangan
    public function index(Request $request)
    {
    
        $query = JadwalMaskapai::with('rute.maskapai', 'rute.kotaAsal', 'rute.kotaTujuan');

        if ($request->has('q') && !empty($request->q)) {
            $query->whereHas('rute.maskapai', function ($q) use ($request) {
                $q->where('nama_maskapai', 'LIKE', '%' . $request->q . '%');
            });
        }
    
        $jadwal = $query->paginate(5)->appends($request->query());
        return view('admin.jadwal-maskapai', compact('jadwal'));
        
    }

    // Tampilkan form tambah jadwal penerbangan
    public function create()
    {
        // Ambil daftar rute untuk dipilih (asumsikan rute sudah ada)
        $rute = Rute::all();
        return view('admin.jadwal.create-jadwal', compact('rute'));
    }

    // Simpan data jadwal penerbangan baru
    public function store(Request $request)
    {
        $request->validate([
            'id_rute'         => 'required|exists:rute,id_rute',
            'waktu_berangkat' => 'required|date_format:H:i',
            'waktu_tiba'      => 'required|date_format:H:i',
            'harga'           => 'required|integer|min:0',
            'kapasitas'       => 'required|integer|min:1',
        ], [
            'id_rute.exists' => 'Rute tidak ditemukan.',
            'waktu_berangkat.date_format' => 'Format waktu berangkat harus HH:MM.',
            'waktu_tiba.date_format'      => 'Format waktu tiba harus HH:MM.',
        ]);

        JadwalMaskapai::create($request->all());
        return redirect()->route('admin.jadwal-maskapai')->with('success', 'Jadwal penerbangan berhasil ditambahkan.');
    }

    // Tampilkan form edit jadwal penerbangan
    public function edit($id)
    {
        $jadwal = JadwalMaskapai::findOrFail($id);
        $rute = Rute::all();
        return view('admin.jadwal.edit-jadwal', compact('jadwal', 'rute'));
    }

    // Update data jadwal penerbangan
    public function update(Request $request, $id)
    {
        $jadwal = JadwalMaskapai::findOrFail($id);
        $request->validate([
            'id_rute'         => 'required|exists:rute,id_rute',
            'waktu_berangkat' => 'required|date_format:H:i',
            'waktu_tiba'      => 'required|date_format:H:i',
            'harga'           => 'required|integer|min:0',
            'kapasitas'       => 'required|integer|min:1',
        ]);
        
        $jadwal->update([
            'id_rute'         => $request->id_rute,
            'waktu_berangkat' => $request->waktu_berangkat,
            'waktu_tiba'      => $request->waktu_tiba,
            'harga'           => $request->harga,
            'kapasitas'       => $request->kapasitas,
        ]);
        return redirect()->route('admin.jadwal-maskapai')
                        ->with('success', 'Jadwal penerbangan berhasil diperbarui.');
    }
            
    // Hapus jadwal penerbangan
    public function destroy($id)
    {
        $jadwal = JadwalMaskapai::findOrFail($id);  
        $jadwal->delete();
        return redirect()->route('admin.jadwal-maskapai')->with('success', 'Jadwal penerbangan berhasil dihapus.');
    }
}

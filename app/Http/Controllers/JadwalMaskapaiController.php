<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalMaskapai;
use App\Models\Rute;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class JadwalMaskapaiController extends Controller
{
    public function index(Request $request)
    {

        $query = JadwalMaskapai::with('rute.maskapai', 'rute.kotaAsal', 'rute.kotaTujuan');

        if ($request->has('q') && !empty($request->q)) {
            $query->whereHas('rute.maskapai', function ($q) use ($request) {
                $q->where('nama_maskapai', 'LIKE', '%' . $request->q . '%');
            });
        }

        $jadwal = $query->paginate(5)->appends($request->query());
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.jadwal-maskapai', compact('jadwal'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.jadwal-maskapai', compact('jadwal'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function create()
    {
        $rute = Rute::all();
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.jadwal.create-jadwal', compact('rute'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.jadwal.create-jadwal', compact('rute'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
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
            'kapasitas.integer'           => 'kapasitas minimal 1.',
        ]);

        $rute = Rute::with('maskapai')->find($request->id_rute);
        if (!$rute) {
            return redirect()->back()->withErrors('Rute tidak ditemukan.');
        }

        $data = $request->all();
        $data['id_maskapai'] = $rute->maskapai->id_maskapai;

        JadwalMaskapai::create($data);

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.jadwal-maskapai')->with('success', 'Jadwal penerbangan berhasil ditambahkan.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.jadwal-maskapai')->with('success', 'Jadwal penerbangan berhasil ditambahkan.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    public function edit($id)
    {
        $jadwal = JadwalMaskapai::findOrFail($id);
        $rute = Rute::all();
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.jadwal.edit-jadwal', compact('jadwal', 'rute'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.jadwal.edit-jadwal', compact('jadwal', 'rute'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function update(Request $request, $id)
    {
        $jadwal = JadwalMaskapai::findOrFail($id);

        $request->validate([
            'id_rute'         => 'required|exists:rute,id_rute',
            'waktu_berangkat' => 'required|date_format:H:i',
            'waktu_tiba'      => 'required|date_format:H:i',
            'harga'           => 'required|integer|min:0',
            'kapasitas'       => 'required|integer|min:1',
        ], [
            'id_rute.exists'         => 'Rute tidak ditemukan.',
            'waktu_berangkat.date_format' => 'Format waktu berangkat harus HH:MM.',
            'waktu_tiba.date_format'      => 'Format waktu tiba harus HH:MM.',
            'kapasitas.integer'           => 'Kapasitas minimal 1.',
        ]);

        $rute = Rute::with('maskapai')->find($request->id_rute);
        if (!$rute) {
            return redirect()->back()->withErrors('Rute tidak ditemukan.');
        }

        $data = [
            'id_rute'         => $request->id_rute,
            'id_maskapai'     => $rute->maskapai->id_maskapai, 
            'waktu_berangkat' => $request->waktu_berangkat,
            'waktu_tiba'      => $request->waktu_tiba,
            'harga'           => $request->harga,
            'kapasitas'       => $request->kapasitas,
        ];

        $jadwal->update($data);

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.jadwal-maskapai')
                ->with('success', 'Jadwal penerbangan berhasil diperbarui.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.jadwal-maskapai')
                ->with('success', 'Jadwal penerbangan berhasil diperbarui.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }


    public function destroy($id)
    {
        $jadwal = JadwalMaskapai::findOrFail($id);
        $jadwal->delete();
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.jadwal-maskapai')->with('success', 'Jadwal penerbangan berhasil dihapus.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.jadwal-maskapai')->with('success', 'Jadwal penerbangan berhasil dihapus.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}

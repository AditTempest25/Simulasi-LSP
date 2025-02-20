<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Rute;
use App\Models\Maskapai;
use App\Models\MasterKota;

class RuteController extends Controller
{
    public function index(Request $request)
    {
        $query = Rute::with(['maskapai', 'kotaAsal', 'kotaTujuan']);
        if ($request->has('q') && !empty($request->q)) {
            $query->whereHas('kotaAsal', function ($q) use ($request) {
                $q->where('nama_kota', 'LIKE', '%' . $request->q . '%');
            })->orWhereHas('kotaTujuan', function ($q) use ($request) {
                $q->where('nama_kota', 'LIKE', '%' . $request->q . '%');
            });
        }
        $rute = $query->paginate(7)->appends($request->query());
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.rute', compact('rute'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.rute', compact('rute'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function create()
    {
        $maskapai = Maskapai::where('status', 'aktif')->get(); 
        $kota = MasterKota::all();
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.rute.create-rute', compact('maskapai', 'kota'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.rute.create-rute', compact('maskapai', 'kota'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'id_maskapai' => 'required|exists:maskapai,id_maskapai',
            'kota_asal' => 'required|exists:master_kotas,id',
            'kota_tujuan' => 'required|exists:master_kotas,id|different:kota_asal',
            'tanggal_pergi' => 'required|date|after_or_equal:today',
        ], [
            'tanggal_pergi.after_or_equal' => 'Tanggal keberangkatan tidak bisa diisi dengan tanggal yang sudah lewat.',
            'kota_tujuan.different' => 'Kota tujuan tidak boleh sama dengan kota asal.',
        ]);
 
        Rute::create([
            'id_maskapai' => $request->id_maskapai, 
            'kota_asal' => $request->kota_asal,
            'kota_tujuan' => $request->kota_tujuan,
            'tanggal_pergi' => $request->tanggal_pergi,
        ]);
    
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.rute')->with('success', 'Rute berhasil ditambahkan.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.rute')->with('success', 'Rute berhasil ditambahkan.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function edit($id)
    {
        $rute = Rute::findOrFail($id);
        $maskapai = Maskapai::all();
        $kota = MasterKota::all();

        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.rute.edit-rute', compact('rute','maskapai', 'kota'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.rute.edit-rute', compact('rute','maskapai', 'kota'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function update(Request $request, $id)
    {
        $rute = Rute::findOrFail($id);

        $request->validate([
            'id_maskapai' => 'required|exists:maskapai,id_maskapai',
            'kota_asal' => 'required|exists:master_kotas,id',
            'kota_tujuan' => 'required|exists:master_kotas,id|different:kota_asal',
            'tanggal_pergi' => 'required|date|after_or_equal:today',
        ], [
            'tanggal_pergi.after_or_equal' => 'Tanggal keberangkatan tidak bisa diisi dengan tanggal yang sudah lewat.',
            'kota_tujuan.different' => 'Kota tujuan tidak boleh sama dengan kota asal.',
        ]);

        $rute->update($request->all());
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.rute')->with('success', 'Rute berhasil diubah.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.rute')->with('success', 'Rute berhasil diubah.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function destroy($id)
    {
        $rute = Rute::findOrFail($id);
        $rute->delete();

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.rute')->with('success', 'Rute berhasil dihapus.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.rute')->with('success', 'Rute berhasil dihapus.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}

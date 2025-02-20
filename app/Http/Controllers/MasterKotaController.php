<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterKota;
use Illuminate\Support\Facades\Auth;

class MasterKotaController extends Controller
{
    public function index(Request $request)
    {
        $query = MasterKota::query();
        if ($request->has('q') && !empty($request->q)) {
            $query->where('nama_kota', 'LIKE', '%' . $request->q . '%');
        }

        $kota = $query->paginate(7)->appends($request->query());

        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.master-kota', compact('kota'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.master-kota', compact('kota'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function create()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.kota.create-kota');
        } elseif ($user->role === 'petugas') {
            return view('petugas.kota.create-kota');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
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

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.master-kota')->with('success', 'Kota berhasil ditambahkan');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.master-kota')->with('success', 'Kota berhasil ditambahkan');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function edit($id)
    {
        $kota = MasterKota::find($id);
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.kota.edit-kota', compact('kota'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.kota.edit-kota', compact('kota'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
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
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.master-kota')->with('success', 'Kota berhasil diupdate');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.master-kota')->with('success', 'Kota berhasil diupdate');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function destroy($id)
    {
        $kota = MasterKota::findOrFail($id);
        $kota->delete();
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.master-kota')->with('success', 'Kota berhasil dihapus');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.master-kota')->with('success', 'Kota berhasil dihapus');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maskapai;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class MaskapaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Maskapai::query();
        if ($request->has('q') && !empty($request->q)) {
            $query->where('nama_maskapai', 'LIKE', '%' . $request->q . '%');
        }
        $maskapai = $query->paginate(5)->appends($request->query());

        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.maskapai', compact('maskapai'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.maskapai', compact('maskapai'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function create()
    {
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.maskapai.create-maskapai');
        } elseif ($user->role === 'petugas') {
            return view('petugas.maskapai.create-maskapai');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_maskapai' => 'required|string|max:255',
            'logo_maskapai' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kelas' => 'required|in:Ekonomi,Bisnis,Eksekutif,Luxury',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $path = null;
        if ($request->hasFile('logo_maskapai')) {
            $path = $request->file('logo_maskapai')->store('maskapai', 'public');
        }

        $maskapai = Maskapai::create([
            'nama_maskapai' => $request->nama_maskapai,
            'logo_maskapai' => $path,
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.maskapai')->with('success', 'Maskapai berhasil ditambahkan!');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.maskapai')->with('success', 'Maskapai berhasil ditambahkan!');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }


    public function edit($id)
    {
        $maskapai = Maskapai::findOrFail($id);
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.maskapai.edit-maskapai', compact('maskapai'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.maskapai.edit-maskapai', compact('maskapai'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_maskapai' => 'required|string|max:255',
            'logo_maskapai' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'kelas' => 'required|in:Ekonomi,Bisnis,Eksekutif,Luxury',
            'status' => 'required|in:Aktif,Tidak Aktif',
        ]);

        $maskapai = Maskapai::findOrFail($id);

        if ($request->hasFile('logo_maskapai')) {
            $logo = $request->file('logo_maskapai')->store('logos', 'public');
            $maskapai->logo_maskapai = $logo;
        }

        $maskapai->update([
            'nama_maskapai' => $request->nama_maskapai,
            'kelas' => $request->kelas,
            'status' => $request->status,
        ]);

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.maskapai')->with('success', 'Maskapai berhasil diperbarui.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.maskapai')->with('success', 'Maskapai berhasil diperbarui.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function destroy($id)
    {
        $maskapai = Maskapai::findOrFail($id);
        $maskapai->delete();

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.maskapai')->with('success', 'Maskapai berhasil dihapus.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.maskapai')->with('success', 'Maskapai berhasil dihapus.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}

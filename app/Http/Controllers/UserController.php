<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'penumpang');
        if ($request->has('q') && !empty($request->q)) {
            $query->where('name', 'LIKE', '%' . $request->q . '%');
        }

        $penumpang = $query->paginate(10)->appends($request->query());

        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.data-pengguna', compact('penumpang'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.data-pengguna', compact('penumpang'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    public function create()
    {
        $password = '123456789';

        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.pengguna.create-pengguna', compact('password'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.pengguna.create-pengguna', compact('password'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ], [
            'email.unique' => 'Email ini sudah ada, silakan gunakan email lain.',
        ]);

        $password = '123456789';

        $pengguna = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'role' => 'penumpang',
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.data-pengguna')->with('success', 'penumpang berhasil ditambahkan');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.data-pengguna')->with('success', 'penumpang berhasil ditambahkan');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }

    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('admin.pengguna.edit-pengguna', compact('pengguna'));
        } elseif ($user->role === 'petugas') {
            return view('petugas.pengguna.edit-pengguna', compact('pengguna'));
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function update(Request $request, $id)
    {
        $pengguna = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        $pengguna->tanggal_lahir = $request->tanggal_lahir;
        $pengguna->jenis_kelamin = $request->jenis_kelamin;
        $pengguna->alamat = $request->alamat;
        $pengguna->save();

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.data-pengguna')->with('success', 'penumpang berhasil diupdate.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.data-pengguna')->with('success', 'penumpang berhasil diupdate.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
    public function destroy($id)
    {
        $penumpang = User::findOrFail($id);
        $penumpang->delete();
        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.data-pengguna')->with('success', 'Penumpang berhasil dihapus.');
        } elseif ($user->role === 'petugas') {
            return redirect()->route('petugas.data-pengguna')->with('success', 'Penumpang berhasil dihapus.');
        } else {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
    }
}

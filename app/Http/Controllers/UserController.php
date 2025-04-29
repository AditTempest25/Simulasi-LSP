<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'penumpang');
        if ($request->has('q') && !empty($request->q)) {
            $query->where('name', 'LIKE', '%' . $request->q . '%');
        }

        $penumpang = $query->paginate(10)->appends($request->query());

        return view('admin.data-pengguna', compact('penumpang'));
    }

    public function create()
    {
        $password = '123456789';
        return view('admin.pengguna.create-pengguna', compact('password'));
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

        return redirect()->route('admin.data-pengguna')->with('success', 'penumpang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $pengguna = User::findOrFail($id);
        return view('admin.pengguna.edit-pengguna', compact('pengguna'));
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

        return redirect()->route('admin.data-pengguna')->with('success', 'penumpang berhasil diupdate');
    }
    public function destroy($id)
    {
        $penumpang = User::findOrFail($id);
        $penumpang->delete();
        return redirect()->route('admin.data-pengguna')->with('success', 'Penumpang berhasil dihapus');
    }
}

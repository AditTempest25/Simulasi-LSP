<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PetugasController extends Controller
{
    public function index(Request $request)
    {

        $query = User::where('role', 'petugas');
        if ($request->has('q') && !empty($request->q)) {
            $query->where('name', 'LIKE', '%' . $request->q . '%');
        }

        $petugas = $query->get();
        return view('admin.data-petugas', compact('petugas'));
    }
    public function create()
    {
        $password = '123456789';
        return view('admin.petugas.create-petugas', compact('password'));
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

        $petugas = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($password),
            'role' => 'petugas',
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('admin.data-petugas')->with('success', 'Petugas berhasil ditambahkan');
    }
    public function edit($id)
    {
        $petugas = User::findOrFail($id);
        return view('admin.petugas.edit-petugas', compact('petugas'));
    }
    public function update(Request $request, $id)
    {
        $petugas = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
        ]);

        $petugas->name = $request->name;
        $petugas->email = $request->email;
        $petugas->tanggal_lahir = $request->tanggal_lahir;
        $petugas->jenis_kelamin = $request->jenis_kelamin;
        $petugas->alamat = $request->alamat;
        $petugas->save();

        return redirect()->route('admin.data-petugas')->with('success', 'Petugas berhasil diupdate');
    }
    public function destroy($id)
    {
        $petugas = User::findOrFail($id);
        $petugas->delete();
        return redirect()->route('admin.data-petugas')->with('success', 'Petugas berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pakai model User

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('role', 'penumpang');

        // Jika ada parameter pencarian (q) dan tidak kosong
        if ($request->has('q') && !empty($request->q)) {
            $query->where('name', 'LIKE', '%' . $request->q . '%');
        }

        $penumpang = $query->get();

        // Ambil user dengan role 'pengguna'
        // $penumpang = User::where('role', 'penumpang')->get();

        return view('admin.data-pengguna', compact('penumpang'));
    }

    public function destroy($id)
    {
        $penumpang = User::findOrFail($id);
        $penumpang->delete();
        return redirect()->route('admin.data-pengguna')->with('success', 'Penumpang berhasil dihapus');
    }
}

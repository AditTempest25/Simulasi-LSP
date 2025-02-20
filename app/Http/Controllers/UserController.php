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
    public function destroy($id)
    {
        $penumpang = User::findOrFail($id);
        $penumpang->delete();
        return redirect()->route('admin.data-pengguna')->with('success', 'Penumpang berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Maskapai;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); // Ambil user yang login

        // Jika admin, tampilkan dashboard admin + statistik
        if ($user->role === 'admin') {
            return view('admin.dashboard', [
                'totalPesawat' => Maskapai::count(),
                'totalPengguna' => User::where('role', 'penumpang')->count(),
                'totalPetugas' => User::where('role', 'petugas')->count(),
            ]);
        }

        // Jika petugas, arahkan ke dashboard petugas
        if ($user->role === 'petugas') {
            return view('petugas.dashboard');
        }

        // Default untuk user biasa (penumpang)
        return view('dashboard');
    }
}

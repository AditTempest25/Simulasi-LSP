<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Maskapai;
use App\Models\JadwalMaskapai;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return view('admin.dashboard', [
                'totalPesawat' => Maskapai::count(),
                'totalJadwal' => JadwalMaskapai::count(),
                'totalPengguna' => User::where('role', 'penumpang')->count(),
                'totalPetugas' => User::where('role', 'petugas')->count(),
            ]);
        }

        if ($user->role === 'petugas') {
            $date = request('date') ? Carbon::parse(request('date')) : Carbon::today();

            $jadwal = JadwalMaskapai::whereHas('rute', function ($query) use ($date) {
                $query->whereDate('tanggal_pergi', $date);
            })->paginate(5);

            return view('petugas.dashboard', [
                'jadwal' => $jadwal,
            ]);
        }

        return view('dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Maskapai;
use App\Models\JadwalMaskapai;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\OrderDetail;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $orderDetails = OrderDetail::with([
                'ordertiket.jadwalMaskapai.rute.kotaAsal',
                'ordertiket.jadwalMaskapai.rute.kotaTujuan',
                'ordertiket.jadwalMaskapai.rute.maskapai',
                'ordertiket.users'
            ]) // Eager load biar ga N+1
                ->orderBy('created_at', 'desc')
                ->take(5) // Ambil 5 transaksi terbaru
                ->get();

            return view('admin.dashboard', [
                'totalPesawat' => Maskapai::count(),
                'totalJadwal' => JadwalMaskapai::count(),
                'totalPengguna' => User::where('role', 'penumpang')->count(),
                'totalPetugas' => User::where('role', 'petugas')->count(),
                'totalPemesanan' => OrderDetail::count(),
                'totalPendapatan' => OrderDetail::sum('total_harga'),
                'orderDetails' => $orderDetails,
            ]);
        }

        if ($user->role === 'petugas') {
            $date = request('date') ? Carbon::parse(request('date')) : Carbon::today();

            $jadwal = JadwalMaskapai::whereHas('rute', function ($query) use ($date) {
                $query->whereDate('tanggal_pergi', $date);
            })->paginate(5, ['*'], 'jadwal_page');

            $history = OrderDetail::with([
                'ordertiket.jadwalMaskapai.rute.kotaAsal',
                'ordertiket.jadwalMaskapai.rute.kotaTujuan',
                'ordertiket.jadwalMaskapai.rute.maskapai',
                'ordertiket.users'
            ])->orderBy('created_at', 'desc')
                ->paginate(5, ['*'], 'history_page');

            return view('petugas.dashboard', [
                'jadwal' => $jadwal,
                'history' => $history,
            ]);
        }


        if ($user->role === 'penumpang') {
            $jadwal = JadwalMaskapai::with('rute', 'maskapai')->paginate(5);
            return view('dashboard', compact('jadwal'));
        }
    }
}

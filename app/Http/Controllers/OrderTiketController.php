<?php

namespace App\Http\Controllers;

use App\Models\JadwalMaskapai;
use App\Models\OrderTiket;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderTiketController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id_jadwal' => 'required|exists:jadwal_maskapai,id_jadwal',
            'total_tiket' => 'required|integer|min:1',
        ]);

        $idJadwal = $request->id_jadwal;
        $jadwal = JadwalMaskapai::with('rute.maskapai')->findOrFail($idJadwal);
        // dd($jadwal->rute->maskapai);

        if (!$jadwal->rute) {
            return response()->json(['message' => 'Data rute tidak ditemukan untuk jadwal ini'], 422);
        }
        
        $idMaskapai = $jadwal->rute->maskapai->id_maskapai;
        // dd($jadwal->toArray());
        if (!$jadwal->rute->maskapai) {
            return response()->json(['message' => 'Data maskapai tidak ditemukan untuk rute ini'], 422);
        }

        $order = OrderTiket::create([
            'id_user' => Auth::id(),
            'id_jadwal' => $idJadwal,
            'id_maskapai' => $idMaskapai, // Ambil dari rute
            'total_tiket' => $request->total_tiket,
            'tanggal_transaksi' => Carbon::now(),
            'status_verifikasi' => 'pending',
            'no_struk' => OrderTiket::generateNoStruk(),
        ]);

        return redirect()->route('travel')->with('success','Tiket berhasil dibuat');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:verified,rejected',
        ]);

        $order = OrderTiket::findOrFail($id);
        $order->update(['status_verifikasi' => $request->status_verifikasi]);

        return response()->json(['message' => 'Status verifikasi diperbarui', 'order' => $order]);
    }
}

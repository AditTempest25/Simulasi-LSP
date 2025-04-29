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
            'id_maskapai' => $idMaskapai,
            'total_tiket' => $request->total_tiket,
            'tanggal_transaksi' => Carbon::now(), // biar semua waktu disimpan pakai UTC
            'status_verifikasi' => 'pending',
            'no_struk' => OrderTiket::generateNoStruk(),
        ]);

        return redirect()->route('travel')->with('success', 'Tiket berhasil dibuat');
    }

    public function updateStatus(Request $request, $id)
    {
        $order = OrderTiket::findOrFail($id);

        $statusLama = $order->status_verifikasi;
        $statusBaru = $request->status_verifikasi;

        $order->status_verifikasi = $statusBaru;
        $order->save();

        return redirect()->back()->with('success', 'Status verifikasi berhasil diupdate.');
    }


    public function myTicket()
    {
        $tickets = OrderTiket::where('id_user', Auth::id())
            ->with(['jadwalMaskapai.rute.kotaAsal', 'jadwalMaskapai.rute.kotaTujuan', 'jadwalMaskapai.rute.maskapai'])
            ->orderBy('tanggal_transaksi', 'desc')
            ->paginate(10);

        return view('myticket', compact('tickets'));
    }
}

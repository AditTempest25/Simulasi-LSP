<?php

namespace App\Http\Controllers;

use App\Models\OrderTiket;
use Illuminate\Http\Request;
use App\Models\OrderDetail;

class VerifikasiTiket extends Controller
{
    public function index()
    {
        $orderTiket = OrderTiket::orderByRaw("FIELD(status_verifikasi, 'pending', 'verified', 'rejected')")
        ->orderByDesc('tanggal_transaksi') 
        ->paginate(10);
            return view('admin.verifikasi', compact('orderTiket'));
    }

    public function approve($id)
    {
        $orderTiket = OrderTiket::with([
            'jadwalMaskapai.rute.kotaAsal',
            'jadwalMaskapai.rute.kotaTujuan',
            'jadwalMaskapai.maskapai',
            'users'
        ])->findOrFail($id);

        if ($orderTiket->status_verifikasi !== 'pending') {
            return back()->with('error', 'Tiket sudah diverifikasi, tidak bisa diubah lagi.');
        }

        $orderTiket->update(['status_verifikasi' => 'verified']);

        $jadwal = $orderTiket->jadwalMaskapai;
        if ($jadwal) {
            $jadwal->kapasitas -= $orderTiket->total_tiket;
            $jadwal->save();
        }

        if (!OrderDetail::where('id_order', $orderTiket->id_order)->exists()) {
            $detailData = [
                'id_order' => $orderTiket->id_order,
                'id_user' => $orderTiket->id_user,
                'name' => $orderTiket->users->name ?? 'Unknown',
                'total_tiket' => $orderTiket->total_tiket,
                'tanggal_transaksi' => $orderTiket->tanggal_transaksi,
            ];

            if ($jadwal) {
                $detailData['nama_maskapai'] = $jadwal->maskapai->nama_maskapai ?? 'Unknown';
                $detailData['waktu_berangkat'] = $jadwal->waktu_berangkat;
                $detailData['waktu_tiba'] = $jadwal->waktu_tiba;

                if ($jadwal->rute) {
                    $detailData['kota_asal'] = $jadwal->rute->kotaAsal->nama_kota ?? 'Unknown';
                    $detailData['kota_tujuan'] = $jadwal->rute->kotaTujuan->nama_kota ?? 'Unknown';
                } else {
                    $detailData['kota_asal'] = 'Unknown';
                    $detailData['kota_tujuan'] = 'Unknown';
                }

                $detailData['total_harga'] = $orderTiket->total_tiket * $jadwal->harga;
            } else {
                $detailData['nama_maskapai'] = 'Unknown';
                $detailData['waktu_berangkat'] = now();
                $detailData['waktu_tiba'] = now();
                $detailData['kota_asal'] = 'Unknown';
                $detailData['kota_tujuan'] = 'Unknown';
                $detailData['total_harga'] = 0;
            }

            OrderDetail::create($detailData);
        }

        return back()->with('success', 'Tiket berhasil di-approve.');
    }

    public function reject($id)
    {
        $orderTiket = OrderTiket::findOrFail($id);

        if ($orderTiket->status_verifikasi !== 'pending') {
            return back()->with('error', 'Tiket sudah reject, tidak bisa diubah lagi.');
        }

        $orderTiket->update([
            'status_verifikasi' => 'rejected',
        ]);

        return back()->with('success', 'Tiket berhasil di-reject.');
    }
}

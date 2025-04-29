<?php

namespace App\Http\Controllers;

use App\Models\OrderTiket;
use Illuminate\Http\Request;

class VerifikasiTiket extends Controller
{
    public function index()
    {
        $orderTiket = OrderTiket::paginate(10); // 10 data per halaman
        return view('admin.verifikasi', compact('orderTiket'));
    }

    public function approve($id)
    {
        $orderTiket = OrderTiket::findOrFail($id);

        if ($orderTiket->status_verifikasi !== 'pending') {
            return back()->with('error', 'Tiket sudah diverifikasi, tidak bisa diubah lagi.');
        }

        $orderTiket->update([
            'status_verifikasi' => 'verified',
        ]);

        $jadwal = $orderTiket->jadwalMaskapai; // relasi
        if ($jadwal) {
            $jadwal->kapasitas -= $orderTiket->total_tiket;
            $jadwal->save();
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

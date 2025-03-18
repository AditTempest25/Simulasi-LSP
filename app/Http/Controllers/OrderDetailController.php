<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\OrderTiket;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    public function index()
    {
        $orderDetails = OrderDetail::all();
        return view('order_detail.index', compact('orderDetails'));
    }

    public function show($id)
    {
        $orderDetail = OrderDetail::findOrFail($id);
        return view('order_detail.show', compact('orderDetail'));
    }

    public function store($id_order)
    {
        // Ambil data order tiket berdasarkan ID
        $orderTiket = OrderTiket::findOrFail($id_order);

        // Cek apakah order_detail untuk order ini sudah ada, biar nggak double insert
        if (OrderDetail::where('id_order', $id_order)->exists()) {
            return response()->json(['message' => 'Order Detail sudah ada'], 400);
        }

        // Simpan OrderDetail berdasarkan data dari OrderTiket
        $orderDetail = OrderDetail::create([
            'id_order'      => $orderTiket->id_order,
            'id_user'       => $orderTiket->id_user,
            'nama_maskapai' => $orderTiket->jadwal->rute->maskapai->nama_maskapai, // Ambil dari relasi
            'waktu_berangkat' => $orderTiket->jadwal->waktu_berangkat,
            'waktu_tiba'    => $orderTiket->jadwal->waktu_tiba,
            'kota_asal'     => $orderTiket->jadwal->rute->kota_asal,
            'kota_tujuan'   => $orderTiket->jadwal->rute->kota_tujuan,
            'total_tiket'   => $orderTiket->total_tiket,
            'total_harga'   => $orderTiket->total_tiket * $orderTiket->jadwal->harga, // Total harga = tiket x harga
            'tanggal_transaksi' => $orderTiket->tanggal_transaksi,
        ]);

        return response()->json(['message' => 'Order Detail berhasil dibuat', 'data' => $orderDetail]);
    }
}

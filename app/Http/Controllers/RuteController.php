<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rute;
use App\Models\Maskapai;
use App\Models\MasterKota;

class RuteController extends Controller
{
    public function index(Request $request)
    {
        $query = Rute::with(['kereta', 'kotaAsal', 'kotaTujuan']);

        if ($request->has('q') && !empty($request->q)) {
            $query->whereHas('kotaAsal', function ($q) use ($request) {
                $q->where('nama_kota', 'LIKE', '%' . $request->q . '%');
            })->orWhereHas('kotaTujuan', function ($q) use ($request) {
                $q->where('nama_kota', 'LIKE', '%' . $request->q . '%');
            });
        }

        $rute = $query->get();
        return view('admin.rute', compact('rute'));
    }

    public function create()
    {
        $maskapai = Maskapai::all();
        $kota = MasterKota::all();
        return view('admin.rute.create-rute', compact('maskapai', 'kota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_maskapai' => 'required|exists:maskapai,id_maskapai',
            'kota_asal' => 'required|exists:master_kotas,id',
            'kota_tujuan' => 'required|exists:master_kotas,id|different:kota_asal',
            'tanggal_pergi' => 'required|date',
        ], [
            'kota_tujuan.different' => 'Kota tujuan tidak boleh sama dengan kota asal.',
        ]);
 
        Rute::create([
            'id_maskapai' => $request->id_maskapai, 
            'kota_asal' => $request->kota_asal,
            'kota_tujuan' => $request->kota_tujuan,
            'tanggal_pergi' => $request->tanggal_pergi,
        ]);
    
        return redirect()->route('admin.rute')->with('success', 'Rute berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $rute = Rute::findOrFail($id);
        $maskapai = Maskapai::all();
        $kota = MasterKota::all();
        return view('admin.rute.edit-rute', compact('rute', 'maskapai', 'kota'));
    }

    public function update(Request $request, $id)
    {
        $rute = Rute::findOrFail($id);

        $request->validate([
            'id_maskapai' => 'required|exists:maskapai,id_maskapai',
            'kota_asal' => 'required|exists:master_kotas,id',
            'kota_tujuan' => 'required|exists:master_kotas,id|different:kota_asal',
            'tanggal_pergi' => 'required|date',
        ], [
            'kota_tujuan.different' => 'Kota tujuan tidak boleh sama dengan kota asal.',
        ]);

        $rute->update($request->all());
        return redirect()->route('admin.rute')->with('success', 'Rute berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $rute = Rute::findOrFail($id);
        $rute->delete();
        return redirect()->route('admin.rute')->with('success', 'Rute berhasil dihapus.');
    }
}

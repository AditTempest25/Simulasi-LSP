<?php

namespace App\Http\Controllers;

use App\Models\JadwalMaskapai;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DetailController extends Controller
{
    public function show($id)
    {
        $detail = JadwalMaskapai::findOrFail($id);
        $detail->waktu_berangkat = Carbon::parse($detail->waktu_berangkat)->format('H:i');
        $detail->waktu_tiba = Carbon::parse($detail->waktu_tiba)->format('H:i');

        return view('detail', compact('detail'));
    }

}

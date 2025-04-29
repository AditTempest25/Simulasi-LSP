<?php

namespace App\Http\Controllers;

use App\Models\JadwalMaskapai;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $jadwal = JadwalMaskapai::where('kapasitas', '>', 0)->get();
        $termurah = JadwalMaskapai::where('kapasitas', '>', 0)
        ->orderBy('harga', 'asc')
        ->limit(4)
        ->get();  
        return view('travel', compact('jadwal', 'termurah'));
    }

}

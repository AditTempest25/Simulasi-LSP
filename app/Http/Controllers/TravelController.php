<?php

namespace App\Http\Controllers;

use App\Models\JadwalMaskapai;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        // Ambil semua data penerbangan dari database
        $jadwal = JadwalMaskapai::all();

        // Kirim data ke view
        return view('travel', compact('jadwal'));
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\JadwalMaskapai;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index()
    {
        $jadwal = JadwalMaskapai::all();

        return view('travel', compact('jadwal'));
    }

}

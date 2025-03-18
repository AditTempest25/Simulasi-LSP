<?php

namespace App\Http\Controllers;

use App\Models\JadwalMaskapai;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function show($id)
    {
        $detail = JadwalMaskapai::findOrFail($id);

        return view('detail', compact('detail'));
    }

}

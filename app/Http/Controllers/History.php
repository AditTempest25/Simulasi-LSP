<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class History extends Controller
{
    public function index()
    {
        $tickets = OrderDetail::where('id_user', Auth::id())
            ->whereHas('orderTiket', function ($query) {
                $query->where('status_verifikasi', 'verified');
            })
            ->with('orderTiket')
            ->paginate(10); 

        return view('history', compact('tickets'));
    }

    public function generatePdf($id)
    {
        $ticket = OrderDetail::with('orderTiket')
            ->where('id_order_detail', $id)
            ->where('id_user', Auth::id())
            ->firstOrFail();

        $pdf = Pdf::loadView('ticket-pdf', compact('ticket'));

        return $pdf->stream('ticket-' . $ticket->orderTiket->no_struk . '.pdf');
        // Alternatively, to download:
        // return $pdf->download('ticket-'.$ticket->orderTiket->no_struk.'.pdf');
    }
}

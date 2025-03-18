<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class OrderTiket extends Model
{
    use HasFactory;

    protected $primaryKey = "id_order";
    protected $table = 'order_tiket';
    protected $fillable = ['id_user', 'id_jadwal', 'total_tiket', 'tanggal_transaksi', 'status_verifikasi', 'no_struk', 'id_maskapai', 'id_jadwal'];

    public static function generateNoStruk()
    {
        $datePrefix = Carbon::now()->format('Ymd');
        $lastOrder = self::where('no_struk', 'like', "$datePrefix%")
            ->orderBy('no_struk', 'desc')
            ->first();

        $nextNumber = $lastOrder ? ((int) substr($lastOrder->no_struk, -5)) + 1 : 1;
        return $datePrefix . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);
    }


    public function orderDetails()
    {
        return $this->belongsTo(OrderDetail::class, 'id_order');
    }

    public function jadwalMaskapai()
    {
        return $this->belongsTo(JadwalMaskapai::class, 'id_jadwal', 'id_jadwal');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';
    protected $primaryKey = 'id_order_detail';
    public $timestamps = true;

    protected $fillable = [
        'id_order',
        'id_user',
        'name',
        'nama_maskapai',
        'waktu_berangkat',
        'waktu_tiba',
        'kota_asal',
        'kota_tujuan',
        'total_tiket',
        'tanggal_transaksi',
        'total_harga',
    ];

    public function orderTiket()
    {
        return $this->belongsTo(OrderTiket::class, 'id_order', 'id_order');
    }
}

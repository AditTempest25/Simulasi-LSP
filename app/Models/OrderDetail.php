<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';
    protected $fillable = ['id_user', 'id_maskapai', 'id_order', 'jumlah_tiket', 'total_harga'];

    // Setiap order detail dimiliki oleh satu order tiket
    public function orderTiket()
    {
        return $this->belongsTo(OrderTiket::class, 'id_order');
    }

    // Setiap order detail dimiliki oleh satu user  
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Order detail merujuk pada jadwal kereta
    public function jadwalMaskapai()
    {
        return $this->belongsTo(JadwalMaskapai::class, 'id_maskapai');
    }
}

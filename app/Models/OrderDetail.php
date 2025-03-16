<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_detail';
    protected $fillable = ['id_user', 'id_maskapai', 'id_order', 'jumlah_tiket', 'total_harga'];

    public function orderTiket()
    {
        return $this->belongsTo(OrderTiket::class, 'id_order');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function jadwalMaskapai()
    {
        return $this->belongsTo(JadwalMaskapai::class, 'id_maskapai');
    }
}

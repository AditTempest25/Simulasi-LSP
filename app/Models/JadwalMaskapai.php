<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMaskapai extends Model
{
    use HasFactory;

    protected $table = 'jadwal_maskapai';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['id_rute', 'id_maskapai', 'waktu_berangkat', 'waktu_tiba', 'harga', 'kapasitas'];

    public function rute()
    {
        return $this->belongsTo(Rute::class, 'id_rute');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_maskapai');
    }

    public function maskapai()
    {
        return $this->belongsTo(Maskapai::class, 'id_maskapai');
    }
}

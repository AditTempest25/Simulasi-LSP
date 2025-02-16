<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalMaskapai extends Model
{
    use HasFactory;

    protected $table = 'jadwal_maskapai';
    protected $primaryKey = 'id_jadwal';
    protected $fillable = ['id_rute', 'waktu_berangkat', 'waktu_tiba', 'harga', 'kapasitas'];

    // Jadwal maskapai milik satu rute
    public function rute()
    {
        return $this->belongsTo(Rute::class, 'id_rute');
    }

    // Satu jadwal bisa terkait dengan banyak order detail (pemesanannya)
    public function orderDetails()
    {
        // Catatan: Di migration, kolomnya dinamai 'id_maskapai' tetapi sebenarnya merujuk ke jadwal.
        return $this->hasMany(OrderDetail::class, 'id_maskapai');
    }
}

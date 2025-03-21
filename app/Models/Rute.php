<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rute extends Model
{
    use HasFactory;

    protected $table = 'rute';

    protected $primaryKey = 'id_rute';
    protected $fillable = ['id_maskapai', 'kota_asal', 'kota_tujuan', 'tanggal_pergi'];

    public function maskapai()
    {
        return $this->belongsTo(Maskapai::class, 'id_maskapai', 'id_maskapai');
    }

    public function jadwalMaskapai()
    {
        return $this->hasMany(JadwalMaskapai::class, 'id_rute');
    }

    public function kotaAsal()
    {
        return $this->belongsTo(MasterKota::class, 'kota_asal');
    }

    public function kotaTujuan()
    {
        return $this->belongsTo(MasterKota::class, 'kota_tujuan');
    }
}

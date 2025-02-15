<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maskapai extends Model
{
    use HasFactory;

    protected $table = 'maskapai'; 

    // Jika primary key berbeda dari 'id'
    protected $primaryKey = 'id_maskapai';
    protected $fillable = ['logo_maskapai', 'nama_maskapai', 'kelas', 'status'];

    // Satu kereta bisa memiliki banyak rute
    public function rutes()
    {
        return $this->hasMany(Rute::class, 'id_maskapai');
    }
}

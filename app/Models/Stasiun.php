<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stasiun extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_stasiun';
    protected $fillable = ['nama_stasiun'];
}

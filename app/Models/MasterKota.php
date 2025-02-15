<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKota extends Model
{
    use HasFactory;

    protected $table = 'master_kotas';
    protected $fillable = ['nama_kota'];
}

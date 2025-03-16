<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTiket extends Model
{
    use HasFactory;

    protected $table = 'order_tiket';
    protected $primaryKey = 'id_order';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_order', 'tanggal_transaksi', 'struk'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'id_order');
    }
}

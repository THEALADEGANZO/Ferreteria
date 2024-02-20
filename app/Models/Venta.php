<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function cliente()
    {
        return $this->belongsTo(cliente::class, 'id_cliente');
    }

    public function detallesVenta()
    {
        return $this->hasMany(detalle_venta::class, 'id_venta');
    }
}

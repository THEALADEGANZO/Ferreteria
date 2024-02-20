<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'cod_producto',
        'idcategoria',
        'nombre',
        'descripcion',
        'stock',
        'precio_compra',
        'precio_venta',
    ];
    public function categoria()
{
    return $this->belongsTo(categoria::class, 'idcategoria');
}
public function detallesVenta()
    {
        return $this->hasMany(DetalleVenta::class, 'id_producto');
    }

}

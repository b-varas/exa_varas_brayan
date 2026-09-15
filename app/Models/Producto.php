<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'sku',
        'nombre',
        'descripcion corta',
        'descripcion larga',
        'imagen',
        'precio_neto',
        'precio_venta',
        'stock_actual',
        'stock_minimo',
        'stock_bajo',
        'stock_alto'
    ];
}

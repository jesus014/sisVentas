<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleIngreso extends Model
{
    protected $table = 'detalle_ingreso';

    protected $primaryKey = "iddetalle_ingreso";

    public $timestamps = false;

    protected $fillabel = [
                    'idingreso',
                    'idarticulo',
                    'cantidad',
                    'precio_compra',
                    'precio_venta',

    ];

    protected $guarded = [
    ];
}

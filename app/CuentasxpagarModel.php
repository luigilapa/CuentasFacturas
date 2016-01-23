<?php

namespace CuentasFacturas;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CuentasxpagarModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['proveedor_id', 'monto', 'detalle', 'fecha_max_pago'];
}

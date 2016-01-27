<?php

namespace CuentasFacturas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class CuentasxcobrarModel extends Model
{
    use SoftDeletes;

    protected $table = 'cuentasxcobrar';

    protected $fillable = ['cliente_id', 'monto', 'detalle', 'fecha_max_pago'];
}

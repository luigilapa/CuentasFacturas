<?php

namespace CuentasFacturas;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PagosModel extends Model
{
    use SoftDeletes;

    protected $fillable = ['cuentaxpagar_id', 'abono', 'fecha_cobro', 'detalle'];
}

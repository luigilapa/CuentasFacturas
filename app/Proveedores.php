<?php

namespace CuentasFacturas;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['identificacion', 'nombres', 'correo', 'telefono', 'direccion'];
}

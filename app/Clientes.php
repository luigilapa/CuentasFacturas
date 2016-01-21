<?php

namespace CuentasFacturas;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['identificacion', 'nombres', 'apellidos', 'correo', 'telefono', 'direccion'];
}

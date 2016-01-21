<?php

namespace CuentasFacturas\Http\Controllers;

use CuentasFacturas\Proveedores;
use Illuminate\Http\Request;

use CuentasFacturas\Http\Requests;
use CuentasFacturas\Http\Controllers\Controller;

class ProveedoresController extends Controller
{
    public function getList()
    {
        $proveedores = Proveedores::orderBy('nombres')->paginate(10);

        return view('proveedores.lista', compact('proveedores'));
    }
}

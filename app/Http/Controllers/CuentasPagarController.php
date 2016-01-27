<?php

namespace CuentasFacturas\Http\Controllers;

use Illuminate\Http\Request;

use CuentasFacturas\Http\Requests;
use CuentasFacturas\Http\Controllers\Controller;

class CuentasPagarController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRegistro()
    {
        return view('cuentasxpagar.registro');
    }
}

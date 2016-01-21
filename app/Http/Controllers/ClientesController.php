<?php

namespace CuentasFacturas\Http\Controllers;

use CuentasFacturas\Clientes;
use Illuminate\Http\Request;

use CuentasFacturas\Http\Requests;
use CuentasFacturas\Http\Controllers\Controller;

class ClientesController extends Controller
{

    public function getList()
    {
        $clientes = Clientes::orderBy('nombres')->orderBy('apellidos')->paginate(10);

        return view('clientes.lista', compact('clientes'));
    }
}

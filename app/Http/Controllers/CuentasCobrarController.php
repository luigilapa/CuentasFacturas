<?php

namespace CuentasFacturas\Http\Controllers;

use CuentasFacturas\Clientes;
use CuentasFacturas\CuentasxcobrarModel;
use Illuminate\Http\Request;

use CuentasFacturas\Http\Requests;
use CuentasFacturas\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CuentasCobrarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRegistro()
    {
        return view('cuentasxcobrar.registro');
    }

    public function postRegistro(Requests\Cuentas\CtaCobrarRequest $request)
    {
        CuentasxcobrarModel::create($request->all());
        return redirect()->route('registrar_ctaxcobrar')->with('message', 'ok');
    }

    public function getBuscarCliente($identificacion)
    {
        $identificacion = str_replace(' ', '', $identificacion);

        $cliente = Clientes::where('identificacion','=',$identificacion)->first();
        if($cliente != null) {
            return response()->json($cliente->toArray());
        }
    }

    public function getConsulta()
    {
        $ctasxcobrar = CuentasxcobrarModel::where("estado_activo","=",1)
                                            ->join('clientes', 'clientes.id', '=', 'cuentasxcobrar.cliente_id')
                                            ->groupBy('cliente_id')
                                            ->select(DB::raw('count(*) as contador, clientes.nombres, clientes.apellidos, Sum(monto) as monto, cliente_id'))
                                            ->orderby('clientes.nombres')->orderby('clientes.apellidos')
                                            ->paginate(10);
        return view('cuentasxcobrar.consulta',compact('ctasxcobrar'));
    }

    public function getConsultaDetalles($cliente_id)
    {
        $facturas = CuentasxcobrarModel::where('cliente_id','=',$cliente_id)
                                        ->where("estado_activo","=",1)
                                        ->join('clientes', 'clientes.id', '=', 'cuentasxcobrar.cliente_id')
                                        ->select(DB::raw('clientes.identificacion, clientes.nombres, clientes.apellidos, cuentasxcobrar.id, cuentasxcobrar.monto, cuentasxcobrar.detalle, cuentasxcobrar.fecha_max_pago, cuentasxcobrar.created_at, cuentasxcobrar.estado_activo'))
                                        ->paginate(10);
        return view('cuentasxcobrar.consulta_detalles',compact('facturas'));
    }
}

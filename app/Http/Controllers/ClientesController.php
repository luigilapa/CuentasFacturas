<?php

namespace CuentasFacturas\Http\Controllers;

use asoabo\Http\Controllers\Extend\validations;
use CuentasFacturas\Clientes;

use CuentasFacturas\Http\Requests;
use CuentasFacturas\Http\Controllers\Controller;

class ClientesController extends Controller
{

    public function getList()
    {
        $clientes = Clientes::orderBy('nombres')->orderBy('apellidos')->paginate(10);

        return view('clientes.lista', compact('clientes'));
    }

    public function getRegistro()
    {
        return view('clientes.registrar');
    }
    public function postRegistro(Requests\ClienteRegistroRequest $request)
    {
        //$resp = validations::validarCI($request['identificacion']);
        //if ($resp == 'ok') {
        if (true) {
            Clientes::create($request->all());
            return redirect()->route('registrar_cliente')->with('message', 'ok');
        } else {
            $errors = array(
                //"0" => $resp
            );
            return $request->response($errors);
        }
    }

    public function getEditar($id)
    {
        if($id == 0)
        {
            return \Response::view('errors.500');
        }
        $cliente = Clientes::find($id);
        return view('clientes.editar',compact('cliente'));
    }

    public function posteditar(Requests\ClienteEditarRequest $request)
    {
        $cliente = Clientes::find($request['id']);

        $existe = Clientes::where('identificacion','=',$request['identificacion'])->where('id','<>',$request['id'])->get();
        if($existe->count() > 0){
            $errors = array(
                "0" => "Identificación ya existe!"
            );
            return $request->response($errors);
        }

        $cliente->fill($request->all());
        $cliente->save();
        return redirect()->route('lista_clientes')->with('message', 'editok');
    }

    public  function getAnular($id)
    {
        $cliente = Clientes::find($id);
        $cliente->delete();
        return response()->json([
            "mensaje" => 'ok',
        ]);
        //return redirect()->route('lista_clientes')->with('message', 'anularok');
    }

    public  function  getAnulados()
    {
        $clientes = Clientes::onlyTrashed()->orderBy('nombres')->orderBy('apellidos')->paginate(10);
        return view('clientes.anulados',compact('clientes'));
    }

    public function getRestaurar($id)
    {
        $cliente = Clientes::withTrashed()->find($id);
        $cliente->restore();
        return response()->json([
            "mensaje" => 'ok',
        ]);
    }

    public function getEliminar($id)
    {
        $cliente = Clientes::withTrashed()->find($id);
        $cliente->forceDelete();
        return response()->json([
            "mensaje" => 'ok',
        ]);
    }
}

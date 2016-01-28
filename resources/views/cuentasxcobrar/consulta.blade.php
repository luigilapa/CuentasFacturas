@extends('layout/master')
<?php $title='Consultar Cuentas Por Cobrar' ?>

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Cliente</th>
                <th>Facturas</th>
                <th>Total</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach( $ctasxcobrar as $item)
                <tr>
                    <td>{{$item->nombres." ".$item->apellidos}}</td>
                    <td>{{$item->contador}}</td>
                    <td>{{$item->monto}}</td>
                    <td>
                        <small><a href="{{route('detalle_ctaxcobrar',$item->cliente_id)}}" class="btn btn-info glyphicon glyphicon-eye-open btn-xs" title="Ver Detalles"></a></small>
                    </td>
                    <td>
                        <small><a href="{{route('editar_cliente',$item->cliente_id)}}" class="btn btn-warning glyphicon glyphicon glyphicon-usd btn-xs" title="Ir a pagos"></a></small>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
@section('content_extend')
    {!! $ctasxcobrar->render() !!}
@endsection
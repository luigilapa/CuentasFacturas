@extends('layout/master')
<?php $title='Detalles de facturas' ?>

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Fecha registro</th>
                <th>Código</th>
                <th>Monto</th>
                <th>Detalle</th>
                <th>Fecha Max. Pago</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $facturas as $item)
                <tr>
                    <th>{{$item->created_at}}</th>
                    <th>{{$item->id}}</th>
                    <th>{{$item->monto}}</th>
                    <th>{{$item->detalle}}</th>
                    <th>{{$item->fecha_max_pago}}</th>
                    <th>{{$item->estado_activo}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
@section('content_extend')
    {!! $facturas->render() !!}
@endsection
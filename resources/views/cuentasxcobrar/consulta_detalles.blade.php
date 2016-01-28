@extends('layout/master')
<?php $title='Detalles de facturas' ?>

@section('content')
    <div class="row">
        <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 ">
            <small><a href="{{route('consulta_ctaxcobrar')}}" class="btn btn-info glyphicon glyphicon-arrow-left btn-sm" title="Volver"></a></small>
        </div>
    </div>
    <hr/>
    <div class="row">
        <div class="form-group col-sm-6 col-md-6 col-lg-3 ">
            {!! Form::label('identificacion', 'C&#233;dula/RUC') !!}
            {!! Form::text('identificacion', $facturas[0]->identificacion, ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
    </div>

    <div class="row">
        <div class="form-group col-sm-6 col-md-4 col-lg-4">
            {!! Form::label('nombres','Nombres') !!}
            {!! Form::text('nombres', $facturas[0]->nombres, ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
        <div class="form-group col-sm-6 col-md-4 col-lg-4">
            {!! Form::label('apellidos','Apellidos') !!}
            {!! Form::text('apellidos', $facturas[0]->apellidos, ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
    </div>
    <hr/>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Fecha registro</th>
                <th>Detalle</th>
                <th>Monto</th>
                <th>Fecha Max. Pago</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $facturas as $item)
                <tr>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->detalle}}</td>
                    <td>{{$item->monto}}</td>
                    <td>{{$item->fecha_max_pago}}</td>
                    <td>{{$item->estado_activo==1?'Pendiente':'Pagado'}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
@section('content_extend')
    {!! $facturas->render() !!}
@endsection
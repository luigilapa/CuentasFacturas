@extends('layout/master')
<?php $title='Registrar Cuenta Por Cobrar' ?>
<?php $message=Session::get('message') ?>
@if($message == 'ok')
@section('script')
    <script>
        var n = noty({text: 'Cuenta por cobrar registrada correctamente.', type: 'success'});
    </script>
@endsection
@endif
@section('content')
    @include('alerts.request')
    {!! Form::open(['route' => 'registrar_ctaxcobrar', 'class' => 'form']) !!}

    <div class="row">
        <div class="col-sm-6 col-md-3 col-lg-3">
            <label class="required" for="txtIdentification">Buscar Cliente</label>
            <div class="input-group">
                {!! Form::text('txtIdentification','',['class'=> 'form-control', 'type'=>'number', 'id'=>'txtIdentification', 'placeholder'=>'Ingrese C&#233;dula/RUC...']) !!}
               <span class="input-group-btn">
                    <button class="btn btn-primary glyphicon glyphicon-search" type="button" onclick="Buscar()" data-toggle="tooltip" data-placement="bottom" title="Buscar"></button>
               </span>
            </div>
        </div>
        <div class="form-group col-sm-6 col-md-4 col-lg-4">
            {!! Form::label('nombres','Nombres ') !!}
            {!! Form::text('nombres', '', ['class'=> 'form-control', 'ReadOnly'=>'true']) !!}
        </div>
    </div>
    <hr/>

        <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
        {!! Form::hidden('cliente_id', '', ['id'=> 'cliente_id']) !!}

        <div class="row">
            <div class="form-group col-sm-4 col-md-2 col-lg-2">
                {!! Form::label('monto','Monto',['class'=>'required']) !!}
                {!! Form::text('monto', '', ['class'=> 'form-control', 'placeholder'=>'0000.00']) !!}
            </div>
            <div class="form-group col-sm-6 col-md-8 col-lg-8">
                {!! Form::label('detalle','Detalle',['class'=>'required']) !!}
                {!! Form::text('detalle', '', ['class'=> 'form-control',]) !!}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-4 col-md-2 col-lg-2">
                {!! Form::label('fecha_max_pago','Fecha Pago',['class'=>'required']) !!}
                {!! Form::date('fecha_max_pago', '', ['class'=> 'form-control']) !!}
            </div>
        </div>
    <hr/>
    <div class="row">
        <div class="col-lg-2">
            {!! Form::submit('Guardar',['class' => 'btn btn-primary']) !!}
        </div>
    </div>
    {!! Form::close()  !!}
@endsection

@section('script')
    <script>
        function Buscar() {
            $('#nombres').val('');
            $('#cliente_id').val('');

            var identificacion = $('#txtIdentification').val();
            /*
            if (isNaN(identificacion)) {
                $('#txtIdentification').val('');
                var n = noty({text: 'Ingrese solo n&#250;meros!', type: 'warning'});
                return;
            }
            */
            $.ajax({
                url : '/buscarcliente_ctaxcobrar/'+identificacion,
                type:'GET',
                dataType: 'json',
                success:function(r)
                {
                    $('#cliente_id').val(r.id);
                    $('#nombres').val(r.nombres +" " + r.apellidos);
                    var n = noty({text: 'Cliente encontrado!', type: 'success'});
                },
                error:function(r)
                {
                    var n = noty({text: 'No se encontr&#243; registro con la c&#233;dula ingresada!', type: 'information'});
                }
            });
        }
    </script>
@endsection
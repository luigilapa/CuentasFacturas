@extends('layout/master')
<?php $title='Registrar Cuenta Por Pagar' ?>

@section('content')
    @include('alerts.request')
    <?php $quebusco = "Proveedor"; $id_relacion = "proveedor_id"; ?>
    @include('formularios.frm_registro_cuentas')
@endsection

@section('script')

@endsection
<?php

Route::get('registrar_ctaxcobrar', [
    'as' => 'registrar_ctaxcobrar',
    'uses' => 'CuentasCobrarController@getRegistro'
]);
Route::post('registrar_ctaxcobrar',  'CuentasCobrarController@postRegistro' );


Route::get('buscarcliente_ctaxcobrar/{id}', [
    'as' => 'buscarcliente_ctaxcobrar',
    'uses' => 'CuentasCobrarController@getBuscarCliente'
]);

Route::get('consulta_ctaxcobrar', [
    'as' => 'consulta_ctaxcobrar',
    'uses' => 'CuentasCobrarController@getConsulta'
]);

Route::get('detalle_ctaxcobrar/{cliente_id}', [
    'as' => 'detalle_ctaxcobrar',
    'uses' => 'CuentasCobrarController@getConsultaDetalles'
]);

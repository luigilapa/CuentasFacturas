<?php

Route::get('rep_ctascliente/{cliente_id}', [
    'as' => 'rep_ctascliente',
    'uses' => 'Reportes\ReportesCuentasCobrarController@getCuentasClientes'
]);
<?php

Route::get('registrar_ctaxpagar', [
    'as' => 'registrar_ctaxpagar',
    'uses' => 'CuentasPagarController@getRegistro'
]);
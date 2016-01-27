<?php

Route::get('registrar_ctaxcobrar', [
    'as' => 'registrar_ctaxcobrar',
    'uses' => 'CuentasCobrarController@getRegistro'
]);
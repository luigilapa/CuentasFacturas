<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@getLogin'
]);
Route::post('login', 'Auth\AuthController@postLogin');

Route::get('logout', [
    'as' => 'logout',
    'uses' => 'Auth\AuthController@getLogout'
]);

Route::get('/', [
    'as' => '/',
    'uses' => function () {
        return view('welcome');
    }
]);

Route::group(['middleware' => 'auth'], function (){

    Route::get('401', function()
    {
        return view('errors.401');
    });

    Route::get('home', [
        'as' => 'home',
        'uses' => 'HomeController@index'
    ]);
});

//User
Route::get('user_register', [
    'as' => 'user_register',
    'uses' => 'Auth\AuthController@getRegister'
]);
Route::post('user_register',  'Auth\AuthController@postRegister' );

Route::get('user_list', [
    'as' => 'user_list',
    'uses' => 'Auth\AuthController@getListUsers'
]);

Route::get('user_reset', [
    'as' => 'user_reset',
    'uses' => 'PasswordController@getReset'
]);
Route::post('user_reset', 'PasswordController@postReset' );

Route::get('user_edit/{id?}', [
    'as' => 'user_edit',
    'uses' => 'Auth\AuthController@getEdit'
]);
Route::post('user_edit',  'Auth\AuthController@postEdit' );

Route::post('user_cancel/{id}', 'Auth\AuthController@postCancel' );

Route::post('user_restart/{id}', 'Auth\AuthController@postRestart' );

Route::get('user_out}', [
    'as' => 'user_out',
    'uses' => 'Auth\AuthController@getOutUser'
]);

//Clientes
Route::get('lista_clientes', [
    'as' => 'lista_clientes',
    'uses' => 'ClientesController@getList'
]);

Route::get('registrar_cliente', [
    'as' => 'registrar_cliente',
    'uses' => 'ClientesController@getRegistro'
]);
Route::post('registrar_cliente',  'ClientesController@postRegistro' );

Route::get('editar_cliente/{id}', [
    'as' => 'editar_cliente',
    'uses' => 'ClientesController@getEditar'
]);
Route::post('editar_cliente/{id}', 'ClientesController@postEditar' );

Route::get('anular_cliente/{id}', [
    'as' => 'anular_cliente',
    'uses' => 'ClientesController@getAnular'
]);

Route::get('anulados_clientes', [
    'as' => 'anulados_clientes',
    'uses' => 'ClientesController@getAnulados'
]);

Route::get('restaurar_cliente/{id}', [
    'as' => 'restaurar_cliente',
    'uses' => 'ClientesController@getRestaurar'
]);

Route::get('eliminar_cliente/{id}', [
    'as' => 'eliminar_cliente',
    'uses' => 'ClientesController@getEliminar'
]);


//Proveedores
Route::get('lista_proveedores', [
    'as' => 'lista_proveedores',
    'uses' => 'ProveedoresController@getList'
]);

Route::get('registrar_proveedor', [
    'as' => 'registrar_proveedor',
    'uses' => 'ProveedoresController@getRegistro'
]);
Route::post('registrar_proveedor',  'ProveedoresController@postRegistro' );

Route::get('editar_proveedor/{id}', [
    'as' => 'editar_proveedor',
    'uses' => 'ProveedoresController@getEditar'
]);
Route::post('editar_proveedor/{id}', 'ProveedoresController@postEditar' );

Route::get('anular_proveedor/{id}', [
    'as' => 'anular_proveedor',
    'uses' => 'ProveedoresController@getAnular'
]);

Route::get('anulados_proveedores', [
    'as' => 'anulados_proveedores',
    'uses' => 'ProveedoresController@getAnulados'
]);

Route::get('restaurar_proveedor/{id}', [
    'as' => 'restaurar_proveedor',
    'uses' => 'ProveedoresController@getRestaurar'
]);

Route::get('eliminar_proveedor/{id}', [
    'as' => 'eliminar_proveedor',
    'uses' => 'ProveedoresController@getEliminar'
]);
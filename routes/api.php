<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('api/cuentas', 'App\Http\Controllers\TransaccionesController@prueba')->name('api.cuentas');
Route::post('api/realizar/transaccion', 'App\Http\Controllers\TransaccionesController@realizarTransaccion')->name('api.realizar.transaccion');
Route::post('api/realizar/guardarCuenta', 'App\Http\Controllers\TransaccionesController@GuardarCuenta')->name('api.GuardarCuenta');
Route::post('api/realizar/guardarcliente', 'App\Http\Controllers\TransaccionesController@guardarCliente')->name('api.guardarCliente');

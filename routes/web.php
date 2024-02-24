<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('clientes', App\Http\Controllers\ClienteController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::resource('tipo-Cuentas', App\Http\Controllers\TipoCuentaController::class);

Route::resource('cuentas', App\Http\Controllers\CuentaController::class);
Route::resource('tipo-cuentas', App\Http\Controllers\TipoCuentaController::class);
Route::resource('tipo-monedas', App\Http\Controllers\TipoMonedaController::class);
Route::resource('tipo-movimientos', App\Http\Controllers\TipoMovimientoController::class);
Route::resource('movimientos', App\Http\Controllers\MovimientoController::class);
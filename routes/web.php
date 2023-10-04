<?php

use App\Http\Controllers\ElementoController;
use App\Http\Controllers\PrestamoController;
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
    return view('welcome');
});

Route::get('/prestamos', [PrestamoController::class, 'index']);
Route::get('/prestamos/crear', [PrestamoController::class, 'crearPrestamo']);
Route::post('/prestamos', [PrestamoController::class, 'guardarPrestamo']);
Route::patch('/prestamos/{id}/finalizar', [PrestamoController::class, 'finalizarPrestamo']);

Route::get('/elementos', [ElementoController::class, 'index']);
Route::get('/elementos/crear', [ElementoController::class, 'crearElemento']);
Route::post('/elementos', [ElementoController::class, 'guardarElemento']);
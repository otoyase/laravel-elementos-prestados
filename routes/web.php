<?php

use App\Http\Controllers\ElementoController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\UsuarioController;
use App\Models\User;
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
    return redirect('/prestamos');
});

/**
 * Rutas para la gestion de prestamos
 */
Route::get('/prestamos', [PrestamoController::class, 'index']);
Route::get('/prestamos/crear', [PrestamoController::class, 'crearPrestamo']);
Route::post('/prestamos', [PrestamoController::class, 'guardarPrestamo']);
Route::patch('/prestamos/{id}/finalizar', [PrestamoController::class, 'finalizarPrestamo']);

/**
 * Rutas para la gestion de elementos
 */
Route::get('/elementos', [ElementoController::class, 'index']);
Route::get('/elementos/crear', [ElementoController::class, 'crearElemento']);
Route::post('/elementos', [ElementoController::class, 'guardarElemento']);

/**
 * Rutas para la gestion de usuarios
 */
Route::get('/usuarios', [UsuarioController::class, 'index']);
Route::get('/usuarios/crear', [UsuarioController::class, 'crearUsuario']);
Route::post('/usuarios', [UsuarioController::class, 'guardarUsuario']);
Route::get('/usuarios/{id}/prestamos', [UsuarioController::class, 'verPrestamosUsuario']); 
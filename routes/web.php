<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('autenticar');
});

Route::get('/usuarios', function () {
    return view('usuarios.index');
});

Route::get('/categorias', function () {
    return view('categorias.index');
});

Route::get('/productos', function () {
    return view('productos.index');
});

Route::get('tablero', function () {
    return view('layout.layout');
});

Route::get('supervisor', function () {
    return view('supervisor.supervisor');
});

Route::resource('usuarios','App\Http\Controllers\UsuariosController');

Route::resource('categorias','App\Http\Controllers\CategoriasController');

Route::resource('productos','App\Http\Controllers\ProductosController');
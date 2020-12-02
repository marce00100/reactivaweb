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
    return view('welcome');
});

/* Ruta para visualizar imagenenes guardadas o archivos en uploads*/
Route::get('show-imagen/{imagen}', 	'Administracion\GeneralController@showImagen'); 


/* ========================== VISTAS ==========================*/


/* ************ CONTENIDOS ********************/
Route::get('contenidos', 'Administracion\ContenidosController@showContenidos');
Route::get('gestion-noticias', 'Administracion\ContenidosController@showNoticias');


Route::get('empresas', 'Administracion\EmpresasController@showEmpresas');












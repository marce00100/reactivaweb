<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function() {
    return Redirect::to('gestion-contenidos');
});

/* Ruta para visualizar imagenenes guardadas o archivos en uploads*/
Route::get('show-imagen/{imagen}', 	'Administracion\GeneralController@showImagen'); 


/* ========================== VISTAS ==========================*/


/* ************ CONTENIDOS ********************/
Route::get('gestion-contenidos', 'Administracion\ContenidosController@showGestionContenidos');

/* ************ NOTICIAS ********************/
Route::get('gestion-noticias', 'Administracion\ContenidosController@showGestionNoticias');

/* ************ EMPRESAS ********************/
Route::get('seguimiento-empresas', 'Administracion\EmpresasController@showSeguimientoEmpresas');












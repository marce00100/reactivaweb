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

/* Ruta para visualizar o descargar cualquier archivo en cualquier directorio dentro la raiz */
Route::get('view-file/', 	'Administracion\GeneralController@viewFile'); 

/* Ruta para realizar test y llenado de la Base de datos*/
Route::get('test-options', 	'Administracion\TestController@showTestoptions'); 


/* ========================== V I S T A S ==========================*/

/* ************ CONTENIDOS ********************/
Route::get('gestion-contenidos', 'Administracion\ContenidosController@showGestionContenidos');

/* ************ NOTICIAS ********************/
Route::get('gestion-noticias', 'Administracion\ContenidosController@showGestionNoticias');

/* ************ EMPRESAS ********************/
Route::get('seguimiento-empresas', 'Administracion\EmpresasController@showSeguimientoEmpresas');

/* ************ RECOMENDACIONES ********************/
Route::get('gestion-recomendaciones', 'Administracion\RecomendacionesController@showGestionRecomendaciones');

/* ************ AJUSTES EN PARAMETROS ********************/
Route::get('config-parametros', 'Administracion\ParamsController@showConfigParametros');

/* ************ PIVOT ********************/
Route::get('est-pvt', 'Administracion\TableroController@showPivot');
// Route::get('rct-table', 'Administracion\TableroCopyController@showPivot');










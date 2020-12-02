<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/* ------- GET TOKEN ----------------------*/
Route::get('token', function(){
	return csrf_token(); 
});


/* -------------- GENERAL -----------------*/

Route::get('listar-rubros'							,'Administracion\GeneralController@listarRubros');
Route::get('listar-departamentos'					,'Administracion\GeneralController@listarDepartamentos');
Route::get('listar-provincias-de-departamento/{id}'	, 'Administracion\GeneralController@listarProvinciasDeDepartamento');
Route::get('listar-municipios-de-provincia/{id}'	, 'Administracion\GeneralController@listarMunicipiosDeProvincia');
Route::get('listar-municipios-de-departamento/{id}'	, 'Administracion\GeneralController@listarMunicipiosDeDepartamento');
Route::get('obtener-departamentos-con-municipios'	, 'Administracion\GeneralController@obtnerDepartamentosConMunicipios');

Route::post('upload-file'	, 'Administracion\GeneralController@uploadFile');



/* -------------- Contenidos -----------------*/

Route::get('obtener-todos-los-contenidos', 'Administracion\ContenidosController@obtenerTodosLosContenidos');
Route::get('obtener-full-contenidos', 'Administracion\ContenidosController@obtenerfullContenidos');
Route::post('guardar-contenido', 'Administracion\ContenidosController@guardarContenido');

Route::get('obtener-todas-las-noticias', 'Administracion\ContenidosController@obtenerTodasLasNoticias');
Route::get('obtener-full-noticias', 'Administracion\ContenidosController@obtenerfullNoticias');


/* -------------- Empresas -----------------*/

Route::get('obtener-empresas', 'Administracion\EmpresasController@obtenerEmpresas');
Route::post('guardar-empresa', 'Administracion\EmpresasController@guardarEmpresa');


/* ------------- Indice Riesgo --------------*/
Route::get('obtener-arbol-preguntas-riesgo', 'Administracion\EvalController@obtenerArbolPreguntasRiesgo');
Route::post('guardar-respuestas-preguntas-riesgo', 'Administracion\EvalController@guardarRespuestasPreguntasRiesgo');


/* ------------- EPP --------------*/
Route::get('obtener-arbol-epp/{normalsalud}', 'Administracion\EvalController@obtenerArbolEpp');
// Route::get('obtener-arbol-epp_salud', 'Administracion\EvalController@obtenerArbolEppSalud');
Route::post('guardar-respuestas-epp', 'Administracion\EvalController@guardarRespuestasEPP');
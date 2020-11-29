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


/* -------------- Contenidos -----------------*/

Route::get('obtener-todos-los-contenidos', 'Administracion\ContenidosController@obtenerTodosLosContenidos');


/* -------------- Empresas -----------------*/

Route::post('guardar-empresa', 'Administracion\EmpresasController@guardarEmpresa');



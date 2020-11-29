<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;



class GeneralController extends MasterController
{

	/* SHOW Imagen .. crea una url para ver imagenes */
  	public function showImagen($imagen)
  	{
        return response()->file(public_path() . '/img/uploads/' . $imagen);

		// $img = file_get_contents(public_path('/img/uploads/covid.jpg'));
		// return response($img)->header('Content-type','image/png');
	}

	/* API de ruta */
  	public function listarRubros()
  	{
  		$rubros = collect(\DB::select("SELECT id, nombre, orden FROM parametros WHERE dominio = 'rubro' and activo ORDER BY orden"));
  		return response()->json([
  			'data' 		=> $rubros,
  			'estado'	=> 'ok'
  		]);   		
  	}

  	
	/* API de ruta */
	public function listarDepartamentos()
	{
		$departamentos = \DB::select("SELECT id, nombre, codigo FROM regiones WHERE profundidad = 1 AND activo ORDER BY codigo ");
		return \Response::json([
			'data' => $departamentos,
		]);
	}

	/* API de ruta */
	public function listarProvinciasDeDepartamento($id)
	{
		return \Response::json([
			'data' => \DB::select("SELECT id, nombre, codigo FROM regiones WHERE profundidad = 2 AND id_padre = {$id} AND activo ORDER BY codigo "),
		]);
	}

	/* API de ruta */
	public function listarMunicipiosDeProvincia($id)
	{
		return \Response::json([
			'data' => \DB::select("SELECT id, nombre, codigo FROM regiones WHERE profundidad = 3 AND id_padre = {$id} AND activo ORDER BY codigo "),
		]);
	}

	/* API de ruta */
	public function listarMunicipiosDeDepartamento($id)
	{
		return \Response::json([
			'data' => \DB::select("SELECT  r3.nombre municipio, r3.id id_municipio, r3.codigo codigo_municipio, 
											r1.nombre departamento, r2.nombre provincia 
									FROM regiones r1, regiones r2, regiones r3 WHERE r1.id = r2.id_padre AND r2.id = r3.id_padre 
									AND r1.id = {$id} AND r3.activo 
									ORDER BY r3.codigo   "),
		]);
	}

	/* API de ruta */
	public function obtnerDepartamentosConMunicipios()
	{
		$departamentos = collect(\DB::select("SELECT id, nombre, codigo FROM regiones WHERE profundidad = 1 AND activo ORDER BY codigo "))
							->map(function($depto){
								$municipios = \DB::select("SELECT  r3.nombre municipio, r3.id id_municipio, r3.codigo codigo_municipio, 
																 r2.nombre provincia 
														FROM regiones r1, regiones r2, regiones r3 WHERE r1.id = r2.id_padre AND r2.id = r3.id_padre 
														AND r1.id = {$depto->id} AND r3.activo 
														ORDER BY r3.codigo   ");

								$depto->municipios = $municipios;
								return $depto;
							});
		
		return \Response::json([
			'data' => $departamentos
		]);
	}







}

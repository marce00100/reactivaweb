<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;



class ContenidosController extends MasterController
{
	/* VISTA */
  	public function showContenidos()
  	{
  		return view('administracion.contenidos');
  	}


  	/* API */
  	public function obtenerTodosLosContenidos()
  	{
  		$all_contenidos = [];

  		$urlImagenPrefijo = url('/') . "/show-imagen/";

  		$tipoContenidos = collect(\DB::select("SELECT id, nombre, orden FROM parametros WHERE dominio = 'contenido' AND activo ORDER BY orden"));

  		foreach ($tipoContenidos as $tipoCont) {
  			$contenidos = collect(\DB::select("SELECT id, titulo, texto, url_redireccion, imagen_almacenada FROM contenidos 
  												WHERE tipo_contenido = $tipoCont->id AND activo ORDER BY orden"))
  							->map(function($cont) use ($urlImagenPrefijo){
  								$cont->url_imagen = $urlImagenPrefijo . $cont->imagen_almacenada;
  								unset($cont->imagen_almacenada);
  								return $cont;
  						});
  			$tipoCont->contenidos = $contenidos; 				
  			$all_contenidos[] =$tipoCont;
  		}


  		return response()->json([
  			'data' 		=> $all_contenidos,
  			'estado'	=> 'ok'
  		]);   		
  	}


}

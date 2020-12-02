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
        

    /* VISTA */
    public function showNoticias()
    {
          return view('administracion.noticias');
    }  


  	/* API */
    /* Obtiene solo los datos importantes para usuarios del celular */
  	public function obtenerTodosLosContenidos()
  	{
  		$all_contenidos = [];

  		$urlImagenPrefijo = url('/') . "/show-imagen/";

  		$tipoContenidos = collect(\DB::select("SELECT id, nombre, orden FROM parametros WHERE dominio = 'contenido' AND activo ORDER BY orden"));

  		foreach ($tipoContenidos as $tipoCont) {
  			$contenidos = collect(\DB::select("SELECT id, titulo, texto, url_redireccion, imagen_almacenada FROM contenidos 
  												WHERE tipo_contenido = $tipoCont->id AND activo ORDER BY orden"))
  							->map(function($cont) use ($urlImagenPrefijo){
                                $cont->url_imagen = ($cont->imagen_almacenada != "" || $cont->imagen_almacenada != null) ? $urlImagenPrefijo . $cont->imagen_almacenada : "";
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


    /* API */
    /* obtiene todos los datos del contenido es para usuarios administradores */
    public function obtenerfullContenidos()
    {
        $all_contenidos = [];

        $urlImagenPrefijo = url('/') . "/show-imagen/";

        $tipoContenidos = collect(\DB::select("SELECT id, nombre, orden FROM parametros WHERE dominio = 'contenido' AND activo ORDER BY orden"));

        foreach ($tipoContenidos as $tipoCont) {
            $contenidos = collect(\DB::select("SELECT id, titulo, texto, url_redireccion, imagen_almacenada, tipo_contenido, fecha_registro, 
                                                orden, activo   FROM contenidos 
                                                WHERE tipo_contenido = $tipoCont->id  ORDER BY orden"))
                            ->map(function($cont) use ($urlImagenPrefijo){
                                $cont->url_imagen = ($cont->imagen_almacenada != "" || $cont->imagen_almacenada != null) ? $urlImagenPrefijo . $cont->imagen_almacenada : "";
                                return $cont;
                        });
            $tipoCont->contenidos = $contenidos;                
            $all_contenidos[] =$tipoCont;
        }


        return response()->json([
            'data'      => $all_contenidos,
            'estado'    => 'ok'
        ]);         
    }



    /* API */
    public function guardarContenido(Request $req)
    {
        $contReq = (object)$req->contenido;
        // return response()->json(['jiji' => $contReq]);

        $contenido = new \stdClass();
        $contenido->id = $contReq->id ?? null;
        $contenido->titulo = $contReq->titulo;
        $contenido->texto = $contReq->texto ?? "";
        $contenido->imagen_almacenada = $contReq->imagen_almacenada ?? "";
        $contenido->url_redireccion = $contReq->url_redireccion ?? "";
        $contenido->tipo_contenido = $contReq->tipo_contenido ?? 1;
        $contenido->orden = $contReq->orden ?? 99999;
        $contenido->activo = $contReq->activo ?? 1;

        if($contenido->id == null)
                    $contenido->fecha_registro = $this->now();
        

        $contenido->id = $this->guardarObjetoTabla($contenido, 'contenidos');

        return response()->json([
            'data' => $contenido,
            'mensaje' => "Se guardó correctamente",
            "estado" => "ok"
        ]);
    }





    /* API */
    /* Obtiene solo los datos importantes para usuarios del celular */
    public function obtenerTodasLasNoticias()
    {
        $all_contenidos = [];

        $urlImagenPrefijo = url('/') . "/show-imagen/";

        $tipoContenidos = collect(\DB::select("SELECT id, nombre, orden FROM parametros WHERE dominio = 'noticia' AND activo ORDER BY orden"));

        foreach ($tipoContenidos as $tipoCont) {
            $contenidos = collect(\DB::select("SELECT id, titulo, texto, url_redireccion, imagen_almacenada FROM contenidos 
                                                WHERE tipo_contenido = $tipoCont->id AND activo ORDER BY orden"))
                            ->map(function($cont) use ($urlImagenPrefijo){
                                $cont->url_imagen = ($cont->imagen_almacenada != "" || $cont->imagen_almacenada != null) ? $urlImagenPrefijo . $cont->imagen_almacenada : "";
                                unset($cont->imagen_almacenada);
                                return $cont;
                        });
            $tipoCont->contenidos = $contenidos;                
            $all_contenidos[] =$tipoCont;
        }


        return response()->json([
            'data'      => $all_contenidos,
            'estado'    => 'ok'
        ]);         
    }

    /* API */
    /* obtiene todos los datos del contenido es para usuarios administradores */
    public function obtenerFullNoticias()
    {
        $all_contenidos = [];

        $urlImagenPrefijo = url('/') . "/show-imagen/";

        $tipoContenidos = collect(\DB::select("SELECT id, nombre, orden FROM parametros WHERE dominio = 'noticia' AND activo ORDER BY orden"));

        foreach ($tipoContenidos as $tipoCont) {
            $contenidos = collect(\DB::select("SELECT id, titulo, texto, url_redireccion, imagen_almacenada, tipo_contenido, fecha_registro, 
                                                orden, activo   FROM contenidos 
                                                WHERE tipo_contenido = $tipoCont->id  ORDER BY orden"))
                            ->map(function($cont) use ($urlImagenPrefijo){
                                $cont->url_imagen = ($cont->imagen_almacenada != "" || $cont->imagen_almacenada != null) ? $urlImagenPrefijo . $cont->imagen_almacenada : "";
                                return $cont;
                        });
            $tipoCont->contenidos = $contenidos;                
            $all_contenidos[] =$tipoCont;
        }


        return response()->json([
            'data'      => $all_contenidos,
            'estado'    => 'ok'
        ]);         
    }


}

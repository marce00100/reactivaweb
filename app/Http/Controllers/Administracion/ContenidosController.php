<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;



class ContenidosController extends MasterController
{
    private $rutaUrl = "https://reactivaweb.org/admin";
    /* VISTA */
    public function showGestionContenidos()
    {
          return view('administracion.contenidos');
    }
        

    /* VISTA */
    public function showGestionNoticias()
    {
          return view('administracion.noticias');
    }  


    /* API */
    /* Obtiene solo los datos importantes para usuarios del celular */
    public function obtenerTodosLosContenidos()
    {
        $all_contenidos = [];

        $urlImagenPrefijo = $this->rutaUrl . "/show-imagen/";

        $tipoContenidos = collect(\DB::select("SELECT id, nombre, orden FROM parametros WHERE dominio = 'tipo_contenido' AND activo ORDER BY orden"));

        foreach ($tipoContenidos as $tipoCont) {
            $contenidos = collect(\DB::select("SELECT id, titulo, texto, url_redireccion, imagen_almacenada FROM contenidos 
                                                WHERE tipo_contenido = $tipoCont->id AND activo ORDER BY orden"))
                            ->map(function($cont) use ($urlImagenPrefijo){
                                $cont->url_imagen = ($cont->imagen_almacenada != "" || $cont->imagen_almacenada != null) ? $urlImagenPrefijo . $cont->imagen_almacenada : "";
                                unset($cont->imagen_almacenada);
                                return $cont;
                        });
            $tipoCont->contenidos = $contenidos;                
            $all_contenidos[] = $tipoCont;
        }


        return response()->json([
            'data'      => $all_contenidos,
            'estado'    => 'ok'
        ]);         
    }


    /* API */
    /* obtiene todos los datos del contenido es para usuarios administradores */
    public function obtenerfullContenidos()
    {
        $all_contenidos = []; 
        $urlImagenPrefijo =  $this->rutaUrl . "/show-imagen/";

        $tipoContenidos = collect(\DB::select("SELECT id id_tipo_contenido, nombre as nombre_tipo_contenido, orden FROM parametros WHERE dominio = 'tipo_contenido' AND activo ORDER BY orden "));

        foreach ($tipoContenidos as $tipoCont) {
            $contenidos = collect(\DB::select("SELECT id, titulo, texto, url_redireccion, imagen_almacenada, 
                                                tipo_contenido, fecha_registro, orden, activo   FROM contenidos 
                                                WHERE tipo_contenido = $tipoCont->id_tipo_contenido  
                                                ORDER BY orden "))
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


    /* API POST */
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
        $contenido->tipo_contenido = $contReq->tipo_contenido ?? null;
        $contenido->orden = $contReq->orden ?? 999;
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

    /* API POST */
    public function deleteContenido(Request $r){
        $id = $r->id;
        try {
            \DB::table('contenidos')->where('id', $id)->delete();
            return response()->json([
                'mensaje'   => 'El registro se eliminó',
                'estado'    =>'ok',
            ]); 
        } catch (Exception $e) {
            return response()->json([
                'mensaje'   => 'Ocurrió un error al aliminar el registro',
                'estado'    =>'error',
            ]);            
        }
       
    }



    /* API  */
    /* Obtiene solo los datos importantes para usuarios del celular */
    public function obtenerTodasLasNoticias()
    {
        $all_contenidos = [];

        $urlImagenPrefijo = $this->rutaUrl . "/show-imagen/";

        $tipoContenidos = collect(\DB::select("SELECT id, nombre, orden FROM parametros WHERE dominio = 'tipo_noticia' AND activo ORDER BY orden"));

        foreach ($tipoContenidos as $tipoCont) {
            $contenidos = collect(\DB::select("SELECT id, titulo, texto, url_redireccion, imagen_almacenada, fecha_registro as fecha
                                                FROM contenidos 
                                                WHERE tipo_contenido = $tipoCont->id AND activo ORDER BY orden , fecha_registro DESC"))
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

        $urlImagenPrefijo = $this->rutaUrl . "/show-imagen/";

        $tipoContenidos = collect(\DB::select("SELECT id id_tipo_noticia, nombre as nombre_tipo_noticia, orden FROM parametros WHERE dominio = 'tipo_noticia' AND activo ORDER BY orden"));

        foreach ($tipoContenidos as $tipoCont) {
            $contenidos = collect(\DB::select("SELECT id, titulo, texto, url_redireccion, imagen_almacenada, 
                                                tipo_contenido, fecha_registro,  orden, activo   
                                                FROM contenidos 
                                                WHERE tipo_contenido = $tipoCont->id_tipo_noticia  
                                                ORDER BY orden , fecha_registro desc"))
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

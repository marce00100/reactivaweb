<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;



class EvalController extends MasterController
{

    /* API de ruta */
    public function obtenerArbolPreguntasRiesgo()
    {
        $preguntas = collect(\DB::select("SELECT id, nombre, orden FROM parametros 
                                            WHERE dominio = 'pregunta_riesgo' AND activo ORDER BY orden"))
                        ->map(function($item){
                            $item->opciones = \DB::select("SELECT id, nombre, valor FROM parametros WHERE dominio= 'pregunta_riesgo_op' AND id_padre = {$item->id} AND activo ORDER BY orden");
                            return $item;
                        });
            return response()->json([
                'data' => $preguntas
        ]);
    }

    /* API de ruta */
    /* request es un array con las respuestas */
    public function guardarRespuestasPreguntasRiesgo(Request $request)
    {
        $idEmpresa = $request->id_empresa;
        $respuestasEnv = (object)$request->respuestas;
        try {

            $respuestasEnviadas = collect( $respuestasEnv )->map(function($respEnv) use($idEmpresa){
                $respEnv = (object)$respEnv;
                $respuestaPreg = new \stdClass();
                $respuestaPreg->id = $respuestaPreg->id ?? null;
                $respuestaPreg->id_empresa = $idEmpresa;
                $respuestaPreg->id_param_pregunta_riesgo_op = $respEnv->id_opcion;
                $respuestaPreg->valor = $respEnv->valor;
                $respuestaPreg->fecha = $this->now();
                $respEnv->id_respuesta = $this->guardarObjetoTabla($respuestaPreg, 'empresas_respuestas_riesgo');
                return $respEnv;

            }) ;


            

            return response()->json([ 
                'estado' => 'ok', 
                'mensaje' => "Se guardaron sus respuestas corretamente",
                'data' => $respuestasEnviadas,
            ]);
            
        } catch (Exception $e) {
            return response()->json([ 'estado' =>"error", 'mensaje' => $e->getMessage() ]);
        }

        
        


    }





}
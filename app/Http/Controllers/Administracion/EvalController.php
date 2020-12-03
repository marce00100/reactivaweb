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
    public function obtenerIndicesEmpresa($id_emp)
    {
        $historico = collect(\DB::select("SELECT r.* FROM empresas e, empresas_indice_riesgo r 
                                            WHERE e.id = r.id_empresa AND e.id = '{$id_emp}' ORDER BY id") );

        return response()->json([
            'data' => [
                'id_empresa' => $id_emp,
                'empresa_indices_riesgo' => $historico
            ]

        ]);    
    }

    /* API de ruta */
    /* request es un array con las respuestas */
    public function guardarRespuestasPreguntasRiesgo(Request $request)
    {
        $idEmpresa = $request->id_empresa;
        $respuestasReq = $request->respuestas;

        // /* eliminar es para llenar  DATOS*/
        // $idEmpresa = "65432";
        // $fecha = '2020-10-30';
        // $respuestasReq = [
        //     ['id_opcion'=>22], // 22-24
        //     ['id_opcion'=>27], // 25-28
        //     ['id_opcion'=>30], // 29-30 
        //     ['id_opcion'=>34], // 31-34
        //     ['id_opcion'=>35], // 35-36
        //     ['id_opcion'=>39], // 37-40
        //     ['id_opcion'=>43], // 41-43
        //     ['id_opcion'=>44], // 44-46
        // ];

        try {

            $respuestasEnviadas = collect( $respuestasReq )
                            ->map(function($respReq) use ($idEmpresa, $fecha){
                                $respReq = (object)$respReq;
                                /* se trae de la pregunta el orden y valor*/
                                $pregYResp = collect(\DB::select("SELECT pp.id preg_id, pp.nombre pregunta, pp.orden pregunta_orden, 
                                                ph.id opcion_id, ph.nombre opcion_nombre, ph.valor valor  
                                            FROM parametros ph, parametros pp WHERE ph.id_padre = pp.id 
                                            AND ph.id = {$respReq->id_opcion} " ))->first();
                                /* Se crea un objeto con los datos ademas de agregarle el valor y orden de la anterior consulta*/
                                $respuestaPreg              = new \stdClass();
                                $respuestaPreg->id          = $respReq->id ?? null;
                                $respuestaPreg->id_empresa  = $idEmpresa;
                                $respuestaPreg->id_p_pregunta_riesgo_op = $respReq->id_opcion;
                                $respuestaPreg->valor       = $pregYResp->valor;
                                $respuestaPreg->fecha       = $this->now();
                                $respReq->id = $this->guardarObjetoTabla($respuestaPreg, 'empresas_respuestas_riesgo');

                                $respuestaPreg->pregunta_orden       = $pregYResp->pregunta_orden;
                                return $respuestaPreg;

                            }) ;

            $indice1 = 0;
            $indice2 = 0;
            $indice3 = 0;
            $indice4 = 0;
            $indiceRiesgo = 0;
            /* En $respuestasEnviadad estan los objetos con el orden y valor para poder calcular*/
            foreach ($respuestasEnviadas as $respEnv) {

                /* SACADO DE LA MATRIZ ACTUALIZAR AQUI SI SUFREN MODIFICACIONES LOS VALORES*/
                if( in_array($respEnv->pregunta_orden, array(1,2,3) )  )
                    $indice1 += $respEnv->valor * 22.5/100;
                if( in_array($respEnv->pregunta_orden, array(4) )  )
                    $indice2 += $respEnv->valor * 22.5/100;
                if( in_array( $respEnv->pregunta_orden, array(5,6))  )
                    $indice3 += $respEnv->valor * 30/100;
                if( in_array( $respEnv->pregunta_orden, array(7,8))  )
                    $indice4 += $respEnv->valor * 25/100;
            }

            $indiceRiesgo = $indice1 + $indice2 + $indice3 + $indice4;

            $resumenCalculos = new \stdClass(); 
            $resumenCalculos->id_empresa                = $idEmpresa;
            $resumenCalculos->fecha                     = $this->now();
            $resumenCalculos->indice_riesgo             = $indiceRiesgo;
            $resumenCalculos->proximidad_fisica         = $indice1;
            $resumenCalculos->exposicion_enfermedad     = $indice2;
            $resumenCalculos->trabajo_ambiente_cerrado  = $indice3;
            $resumenCalculos->contacto_con_otros        = $indice4;

            if(count($respuestasReq) > 0){
                $primerElem = (object)$respuestasReq[0];

                if(isset($primerElem->id) ) //update
                { //
                    $idUltimoResumenCalculo = collect(\DB::select("SELECT id FROM empresa_indice_riesgo 
                                                        WHERE id_empresa = {$idEmpresa} ORDER BY id"))->last();
                    $resumenCalculos->id = $idUltimoResumenCalculo;                    
                }   
                else //nsert          
                    $resumenCalculos->id = null;

                $respEnv->id = $this->guardarObjetoTabla($resumenCalculos, 'empresas_indice_riesgo');
            }

            return response()->json([ 
                'estado' => 'ok', 
                'mensaje' => "Se guardaron sus respuestas corretamente",
                'data' => $respuestasEnviadas,
                /* ****** descomentar si se quiere enviar los indices ***** */
                // 'ContactoOtros' => $indice1,
                // 'proximidadFisica' => $indice2,
                // 'exposicioEnfermedad' => $indice3,
                // 'trabajoAmbCerrado' => $indice4,
                // 'indice_riesgo' => $indiceRiesgo,
            ]);
            
        } catch (Exception $e) {
            return response()->json([ 'estado' =>"error", 'mensaje' => $e->getMessage() ]);
        }

    }


    /* API de ruta */
    public function obtenerArbolEpp($normalsalud)
    {
        $consulta = '_';

        if($normalsalud == 'salud')
            $consulta = 'personal_epp_salud';        
        elseif($normalsalud == 'nosalud')
            $consulta = 'personal_epp';
        else
            return;
        
        $personal = collect(\DB::select("SELECT id, nombre FROM parametros
                                            WHERE dominio = '{$consulta}' AND activo ORDER BY orden"));

        // return response()->json(['personal' => $personal, 'consulta'=>$consulta]);

        $epp = collect(\DB::select("SELECT id, nombre FROM parametros 
                                            WHERE dominio = 'tipo_epp' AND activo ORDER BY orden"))
                        ->map(function($item){
                            $item->opciones = \DB::select("SELECT id, nombre FROM parametros WHERE dominio= 'tipo_epp_op' AND id_padre = {$item->id} AND activo ORDER BY orden");
                            return $item;
                        });
        $respuesta = new \stdClass();
        $respuesta->personal = $personal;
        $respuesta->epp = $epp;
            return response()->json([
                'data' => $respuesta
        ]);
    }


    public function guardarRespuestasEPP(Request $request)
    {
        $idEmpresa = $request->id_empresa;
        $id_p_epp_op = $request->id_epp_opcion;
        $categoria_epp = $request->categoria_epp; /* puede ser epp o personal*/
        $respuestasReq = $request->respuestas;

        try {

            $respuestasEnviadas = collect( $respuestasReq )
                            ->map(function($respReq) use ($idEmpresa, $id_p_epp_op, $categoria_epp){
                                $respReq = (object)$respReq;

                                /* se trae de la pregunta el orden y valor*/
                                // $pregYResp = collect(\DB::select("SELECT pp.id preg_id, pp.nombre pregunta, pp.orden pregunta_orden, 
                                //                 ph.id opcion_id, ph.nombre opcion_nombre, ph.valor valor  
                                //             FROM parametros ph, parametros pp WHERE ph.id_padre = pp.id 
                                //             AND ph.id = {$respReq->id_opcion} " ))->first();
                                /* Se crea un objeto con los datos ademas de agregarle el valor y orden de la anterior consulta*/
                                $respuestaPreg              = new \stdClass();
                                $respuestaPreg->id          = $respReq->id ?? null;
                                $respuestaPreg->id_empresa  = $idEmpresa;
                                $respuestaPreg->id_p_epp_op = $id_p_epp_op;
                                $respuestaPreg->categoria_epp   = $categoria_epp;

                                $respuestaPreg->valor       = $respReq->valor;
                                $respuestaPreg->fecha_epp       = $respReq->fecha_epp;
                                $respuestaPreg->fecha_registro       = $this->now();                                
                                $respuestaPreg->id = $this->guardarObjetoTabla($respuestaPreg, 'empresas_respuestas_epp');

                                return $respuestaPreg;

                            }) ;

            return response()->json([ 
                'estado' => 'ok', 
                'mensaje' => "Se guardaron sus respuestas corretamente",
                'data' => $respuestasEnviadas,
                /* ****** descomentar si se quiere enviar los indices ***** */
                // 'ContactoOtros' => $indice1,
                // 'proximidadFisica' => $indice2,
                // 'exposicioEnfermedad' => $indice3,
                // 'trabajoAmbCerrado' => $indice4,
                // 'indice_riesgo' => $indiceRiesgo,
            ]);
        } catch (Exception $e) {
            return response()->json([ 'estado' =>"error", 'mensaje' => $e->getMessage() ]);
        }      
        


        // }}
    }


}
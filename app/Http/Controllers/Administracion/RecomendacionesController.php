<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;



class RecomendacionesController extends MasterController
{
	/* VISTA */
  	public function showGestionRecomendaciones()
  	{
  		  return view('administracion.recomendaciones');
  	}
        


  	/* API */
    /* Obtiene recomendaciones activas MOVIIL */
  	public function obtenerRecomendaciones()
  	{
  		$recomendaciones = \DB::select("SELECT id, riesgo, recomendacion, recomendacion_corta 
                                        FROM recomendaciones WHERE activo");
  		return response()->json([
  			'data' 		=> $recomendaciones,
  			'estado'	=> 'ok'
  		]);   		
  	}


    /* API */
    /* obtiene todos los datos de recomendaciones AMD */
    public function obtenerFullRecomendaciones()
    {
        $recomendaciones = \DB::select("SELECT *
                                        FROM recomendaciones ");
        return response()->json([
            'data'      => $recomendaciones,
            'estado'    => 'ok'
        ]); 
    }


    /* API POST */
    public function guardarRecomendacion(Request $req)
    {
        $recEnviada = (object)$req->recomendacion;
        // return response()->json(['jiji' => $recEnviada]);

        $recom          = new \stdClass();
        $recom->id      = $recEnviada->id ?? null;
        // $recom->riesgo  = $recEnviada->riesgo;
        $recom->recomendacion   = $recEnviada->recomendacion ?? "";
        $recom->recomendacion_corta = $recEnviada->recomendacion_corta ?? "";
        // $recom->activo = $recEnviada->activo ?? 1;

        if($recom->id == null)
            $recom->fecha_creacion = $this->now();
        else
            $recom->fecha_modificacion = $this->now();     
        

        $recom->id = $this->guardarObjetoTabla($recom, 'recomendaciones');

        return response()->json([
            'data' => $recom,
            'mensaje' => "Se guardó correctamente",
            "estado" => "ok"
        ]);
    }

   



 

}

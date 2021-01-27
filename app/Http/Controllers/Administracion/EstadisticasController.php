<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;



class EstadisticasController extends MasterController
{

    /**
     * API POST de ruta  Calcula estadisticas de un rubro tomando en cuenta las ultimas fechas de registro
     * @param  Request $req : {id_empresa : 'id_empresa'}
     */
    public function indicePromedioRubro(Request $req)
    {
        $id_empresa = $req->id_empresa;
        $empresa = collect(\DB::select("SELECT e.*, p.nombre AS rubro 
                                        FROM empresas e, parametros p 
                                        WHERE e.id_rubro = p.id AND e.activo AND e.id = '{$id_empresa}' " ))->first();

        if(!$empresa)
            return response()->json(['estado' =>"error", 'mensaje' => "No existe la empresa"]);
        
        $datosEst = collect(\DB::select("
            SELECT ultfecha.id_rubro, count(indice.indice_riesgo) AS numero, 
                SUM(indice.indice_riesgo) as suma, max(indice.indice_riesgo ) as maximo, 
                AVG(indice.indice_riesgo) as promedio
                FROM
                ( SELECT e.id_rubro, i.id_empresa, MAX(i.fecha) fecha from empresas_indice_riesgo i, empresas e 
                    WHERE e.id = i.id_empresa AND e.id_rubro = {$empresa->id_rubro} AND e.activo
                    GROUP BY i.id_empresa, e.id_rubro 
                ) ultfecha 
            JOIN empresas_indice_riesgo AS indice ON ultfecha.id_empresa = indice.id_empresa AND ultfecha.fecha = indice.fecha 
            GROUP BY ultfecha.id_rubro"))->first();

        if(!$datosEst)
            return response()->json(['estado' =>"error", 'mensaje' => "No se púede calcular estadisticas"]);

        return response()->json([
                'empresas_calculadas'   => $datosEst->numero,
                'rubro'                 => $empresa->rubro,
                'id_rubro'              => $empresa->id_rubro,
                'maximo_indice_riesgo'  => $datosEst->maximo,
                'promedio_indice_riesgo'=> $datosEst->promedio,
        ]);
    }





}
<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;

class EmpresasController extends MasterController
{

    /* VISTA */
    public function showSeguimientoEmpresas(){
        return view('administracion.empresas');
    }


    public function obtenerEmpresas(){
        // $empresas = \DB::select("SELECT e.*, p.nombre rubro, rdep.nombre departamento, rmun.nombre municipio   
        //                         FROM  empresas e, parametros p, regiones rdep, regiones rmun 
        //                         WHERE e.id_rubro = p.id AND e.id_departamento = rdep.id AND e.id_municipio = rmun.id ");

        $empresas = \DB::select("SELECT e.*, p.nombre rubro, rdep.nombre departamento, rmun.nombre municipio   
                                FROM  empresas e 
                                LEFT JOIN parametros p ON e.id_rubro = p.id
                                LEFT JOIN regiones rdep ON e.id_departamento = rdep.id
                                LEFT JOIN regiones rmun ON e.id_municipio = rmun.id  ");
        return response()->json([
            'data' => $empresas
        ]);
    }



    /* API */
    public function guardarEmpresa(Request $emp)
    {
        $empresaQ = $this->saveEmpresa($emp); 

        return response()->json([
            'data'   => $empresaQ,
            'estado' => 'ok',
            'mensaje' => 'Se guardo correctamente'
        ]);
    }


    /* Funcion  de Clase*/
    public function saveEmpresa($emp)
    {
        $empObj = (object)$emp;


        if(!$empObj->nombre || !$empObj->id_rubro){
            return response()->json([
                'mensaje' => 'Error, Nombre y Rubro es obligatorio',
                'estado' => 'error'
            ]);
        }
        $empresaQ = new \stdClass();
        $empresaQ->id           = $empObj->id;
        $empresaQ->nombre       = $empObj->nombre ?? "";
        $empresaQ->id_rubro     = $empObj->id_rubro ?? null;
        $empresaQ->direccion    = $empObj->direccion ?? "";
        $empresaQ->responsable_nombre   = $empObj->responsable_nombre ?? "";
        $empresaQ->responsable_ap       = $empObj->responsable_ap ?? "";
        $empresaQ->id_departamento      = $empObj->id_departamento ?? null;
        $empresaQ->id_municipio         = $empObj->id_municipio ?? null;
        $empresaQ->mail                 = $empObj->mail ?? "";
        $empresaQ->activo               = $empObj->activo ?? 0;
        $empresaQ->envio_automatico     = $empObj->envio_automatico ?? 0;
        $empresaQ->anonimato            = $empObj->anonimato ?? 0;


        $empresaExist = collect(\DB::select(" SELECT * FROM empresas WHERE id = '{$empresaQ->id}' AND activo") )->first();
        if(!$empresaExist){
            $empresaQ->fecha_creacion = $this->now();
            $this->guardarTransaccionObjetoTabla('insert', $empresaQ, 'empresas');
        }
        else{
            $empresaQ->fecha_modificacion = $this->now();
            $this->guardarTransaccionObjetoTabla('update', $empresaQ, 'empresas');
        }

        return $empresaQ;

    }

   

}

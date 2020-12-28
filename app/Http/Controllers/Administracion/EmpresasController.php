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
        $empresas = \DB::select("SELECT e.*, p.nombre rubro, rdep.nombre departamento, rmun.nombre municipio   
                                FROM  empresas e, parametros p, regiones rdep, regiones rmun 
                                WHERE e.id_rubro = p.id AND e.id_departamento = rdep.id AND e.id_municipio = rmun.id ");

        // $empresas = \DB::select("SELECT e.*, p.nombre rubro, rdep.nombre departamento, rmun.nombre municipio   
        //                         FROM  empresas e 
        //                         LEFT JOIN parametros p ON e.id_rubro = p.id
        //                         LEFT JOIN regiones rdep ON e.id_departamento = rdep.id
        //                         LEFT JOIN regiones rmun ON e.id_municipio = rmun.id  ");
        return response()->json([
            'data' => $empresas
        ]);
    }



    /* API */
    public function guardarEmpresa(Request $e)
    {

        $empresaEnviada = (object)$e;


        if(!$empresaEnviada->nombre || !$empresaEnviada->id_rubro){
            return response()->json([
                'mensaje' => 'Error, Nombre y Rubro es obligatorio',
                'estado' => 'error'
            ]);
        }
        $empresaQ = new \stdClass();
        $empresaQ->id           = $empresaEnviada->id;
        $empresaQ->nombre       = $empresaEnviada->nombre ?? "";
        $empresaQ->id_rubro     = $empresaEnviada->id_rubro ?? null;
        $empresaQ->direccion    = $empresaEnviada->direccion ?? "";
        $empresaQ->responsable_nombre   = $empresaEnviada->responsable_nombre ?? "";
        $empresaQ->responsable_ap       = $empresaEnviada->responsable_ap ?? "";
        $empresaQ->mail         = $empresaEnviada->mail ?? "";
        $empresaQ->activo       = (bool)$empresaEnviada->activo ?? 1;
        $empresaQ->id_departamento      = $empresaEnviada->id_departamento ?? null;
        $empresaQ->id_municipio = $empresaEnviada->id_municipio ?? null;


        $empresaExist = collect(\DB::select(" SELECT * FROM empresas WHERE id = '{$empresaQ->id}' AND activo") )->first();
        if(!$empresaExist){
            $empresaQ->fecha_creacion = $this->now();
            $this->guardarTransaccionObjetoTabla('insert', $empresaQ, 'empresas');
        }
        else{
            $empresaQ->fecha_modificacion = $this->now();
            $this->guardarTransaccionObjetoTabla('update', $empresaQ, 'empresas');
        }



        return response()->json([
            'data'   => $empresaQ,
            'estado' => 'ok',
            'mensaje' => 'Se guardo correctamente'
        ]);
    }

}

<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;

class EmpresasController extends MasterController
{

    /* API */
    public function guardarEmpresa(Request $e)
    {

        $empresaEnviada = (object)$e;

        // $empresaId = $e->id;
        // $empresaVer = $e->ver; /* ver va a ser un Token de seguridad */

        // if($empresaEnviada->id != $empresaId ){
        //     return response()->json([
        //         'mensaje' => 'Error, no corresponde la Empresa',
        //         'estado' => 'error'
        //     ]);
        // }
        if(!$empresaEnviada->nombre || !$empresaEnviada->id_rubro){
            return response()->json([
                'mensaje' => 'Error, Nombre y Rubro es obligatorio',
                'estado' => 'error'
            ]);
        }
        $empresaQ = new \stdClass();
        $empresaQ->id = $empresaEnviada->id;
        $empresaQ->nombre = $empresaEnviada->nombre ?? "";
        $empresaQ->id_rubro = $empresaEnviada->id_rubro ?? null;
        $empresaQ->direccion = $empresaEnviada->direccion ?? "";
        $empresaQ->responsable_nombre = $empresaEnviada->responsable_nombre ?? "";
        $empresaQ->responsable_ap = $empresaEnviada->responsable_ap ?? "";
        $empresaQ->mail = $empresaEnviada->mail ?? "";
        $empresaQ->activo = $empresaEnviada->activo ?? 1;
        $empresaQ->id_departamento = $empresaEnviada->id_departamento ?? null;
        $empresaQ->id_municipio = $empresaEnviada->id_municipio ?? null;


        $empresaExist = \DB::table('empresas')->where(['id'=> $empresaQ->id, 'activo'=>true])->first();
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
        ]);
    }

}

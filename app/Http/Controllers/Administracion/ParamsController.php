<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;



class ParamsController extends MasterController
{
	/* VISTA */
  	public function showConfigParametros()
  	{
  		  return view('administracion.params');
  	}
        


  	/* API */
    /* Obtiene todos los parametros en arbol */
  	public function obtenerParams()
  	{
  		$parametros = collect(\DB::select("SELECT  * FROM parametros ORDER BY orden"));

        return response()->json([
            "data" => $parametros,
        ]);		
  	}


    /* API POST */
    public function saveParametro(Request $req)
    {
        $paramReq = (object)$req->parametro;

        $parametro = [];
        foreach ($paramReq as $key => $value) {
            $parametro[$key]=$value;
        }

        $parametro = (object)$parametro;
        $parametro->fecha_modificacion = $this->now();
        $parametro->usuario_modificacion = 'qq99';       

        $parametro->id = $this->guardarObjetoTabla($parametro, 'parametros');

        return response()->json([
            'data' => $parametro,
            'mensaje' => "Se guardó correctamente",
            "estado" => "ok"
        ]);
    }

    /* API POST */
    public function deleteParametro(Request $r){
        $id = $r->id;
        try {
            \DB::table('parametros')->where('id', $id)->delete();
            return response()->json([
                'mensaje'   => 'El elemento se eliminó',
                'estado'    =>'ok',
            ]); 
        } catch (Exception $e) {
            return response()->json([
                'mensaje'   => 'Ocurrió un error al eliminar el registro',
                'estado'    =>'error',
            ]);            
        }
       
    }





}

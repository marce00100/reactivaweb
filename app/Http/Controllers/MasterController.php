<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterController extends Controller
{

	// public $usuario = ''; /* Variable Global con el contexto de Usuario*/

    /*----------------------------------------------------------
    |   Funcion Generica para incsertar o modificar las tablas (se usa cuando el id se autogenera en la BD, autonumerico, serial, trigger, etc)
     */
    protected function guardarObjetoTabla($obj, $tabla, $datosAuditoria = false)
    {

        try{
            if ($obj->id) // UPDATE 
            {
                // $obj->activo =  true;
                if($datosAuditoria){
                	$obj->updated_by = $this->usuario->id;
                	$obj->updated_at = $this->now();
                }                
                \DB::table($tabla)->where('id', $obj->id)->update(get_object_vars($obj));
                return $obj->id;
            }
            else // INSERT
            {
                unset($obj->id);
                // $obj->activo = true;
                if($datosAuditoria){
                	$obj->created_by =  $this->usuario->id;
                	$obj->created_at =  $this->now(); 	
                }
                return \DB::table($tabla)->insertGetId(get_object_vars($obj));
            }
        }
        catch (Exception $e)
        {
            return response()->json(array(
                'estado' => "error",
                'msg'    => $e->getMessage())
            );
        }
    }

    /*----------------------------------------------------------
    |   Funcion Generica para insertar o modificar las tablas que vienen con ID ( Se usa cuando el id no es autogenerado sino que se envia por ejemplo UID, o timestamp().'SIGLA'.random(5))
     */
    protected function guardarTransaccionObjetoTabla($transaction, $obj, $tabla, $datosAuditoria = false)
    {

        try{
            if ($transaction == 'update') // UPDATE 
            {
                // $obj->activo =  true;
                if($datosAuditoria){
                    $obj->updated_by = $this->usuario->id;
                    $obj->updated_at = $this->now();
                }                
                \DB::table($tabla)->where('id', $obj->id)->update(get_object_vars($obj));
                return $obj->id;
            }
            if ($transaction == 'insert')  // INSERT
            {
                if($datosAuditoria){
                    $obj->created_by =  $this->usuario->id;
                    $obj->created_at =  $this->now();   
                }
                return \DB::table($tabla)->insertGetId(get_object_vars($obj));
            }
        }
        catch (Exception $e)
        {
            return response()->json(array(
                'estado' => "error",
                'msg'    => $e->getMessage())
            );
        }
    }


    protected function eliminarDeTabla($id, $tabla)
    {
        try{
            \DB::table($tabla)->where('id', $id)->delete();
        }
        catch (Exception $e)
        {
            return response()->json(array(
                'estado' => "error",
                'msg'    => 'ERROR AL ELIMINAR',)//$e->getMessage())
            );
        }
    }


    protected function now(){
    	return \Carbon\Carbon::now('America/La_Paz');
    }


    public function __construct()
    { 

        // $this->middleware(function ($request, $next) {

        //     // $user 
        //     // $this->usuario = \Auth::user();


        //     // $this->usuario = $this->obtenerUsuario( \Auth::user()->id);

        //     // $roles_permitidos = "'entidad', 'administrador'" ;


        //    return $next($request);
        // });

    }

    protected function obtenerUsuario($id){
        $usuario = collect(\DB::select("SELECT u.id, u.codigo_entidad, u.id_rol, r.rol FROM usuarios u, roles r WHERE u.id_rol = r.id AND u.id = {$id}"))->first();
        return $usuario;
    }

    protected function generaClave(){
        $cadena = $this->usuario->id . '||' . $this->usuario->rol . '||'. $this->now();
        $clave = $this->encrypt($cadena);
        // substr_replace($oldstr, $str_to_insert, $pos, 0);
        return $clave;
    }

    protected function retroClave($clave){
        $array = explode('||', $this->decrypt($clave));
        return (object)$array;
    }

    protected function encrypt ($id)
    {
        if(strlen($id)>100)
            return $id;
        else
            return \Crypt::encrypt($id);
    }

    protected function decrypt ($id)
    {
        if(strlen($id)>100)
            return \Crypt::decrypt($id);
        else
            return $id;
    }
}





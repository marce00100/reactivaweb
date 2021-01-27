<?php

namespace App\Http\Controllers\Administracion;
use App\Http\Controllers\MasterController;
use Illuminate\Http\Request;

class TestController extends MasterController
{


    /* S E E D S    R A N D O M*/

    /* VISTA */
    public function showTestoptions(){
        return view('administracion.testOptions');
    }

    /* API   genera empresas aleatorioamente*/
    public function seedsEmpresaRiesgos()
    {
        set_time_limit(50000);
        $nEmps = 20;
        $prefixId ='mype';
        $nombres = collect(['Lago','Libertad','Señor de Mayo','6','Ruiz','Coorporacion','Maria','Net','Nueva','Gran','Local','Clinica','Modern','Industria','Asociados','SA','Tigre','COM','Fácil','UNA','Lo Mejor','Campo','Santa','Comercio','El Rancho','Del Sur','Aguilas','East','Rico','Gran','Sol','De la Tierra','Agro','Bolivia','Consultora','Cyber','Futuro','Olimpus','Universal','Del Norte','North','Asia','up','Siete','Mega','Occidental','Oriental','Del Oriente','La Victoria']);
        $deptos = collect(\DB::select("SELECT id, nombre FROM regiones WHERE profundidad  = 1 ORDER BY id"));
        /* Preparar las tablas borrar otros datos de prueba, y setear los ids autoincrementables  
        Comienzan a partir de 100000 los datos de prueba hasta 300000 para empresas, empresas_respuestas_riesgo, empresas_indice_riesgo */
        \DB::select('DELETE from empresas WHERE length(id) = 10 ');
        \DB::select('DELETE from empresas_respuestas_riesgo WHERE 100000 < id AND id < 300000');
        \DB::select('DELETE from empresas_indice_riesgo     WHERE 100000 < id AND id < 300000');
        \DB::select('ALTER TABLE empresas_respuestas_riesgo auto_increment = 100001');
        \DB::select('ALTER TABLE empresas_indice_riesgo     auto_increment = 100001');

        for ($i=1; $i <= $nEmps; $i++) { 
            $emp = new \stdClass();
            $emp->nombre = "{$nombres[mt_rand(0, $nombres->count()-1)]} {$nombres[mt_rand(0,$nombres->count()-1)] } {$nombres[mt_rand(0,$nombres->count()-1)]}";

            $emp->id = $prefixId . (100000+$i);
            $emp->id_rubro = mt_rand(4,11);
            $emp->activo = 1;
            /* Probabilidad del 60% de no estar anonimo*/
            $emp->anonimato = mt_rand(1,10) <= 6 ? 0 : 1;
            /*  probabilidad  del 95 % hacia ciudades principales , 7,8 Beni y Pando */
            $emp->id_departamento = mt_rand(1,100) <= 91 ? $deptos[mt_rand(0, 6)]->id : $deptos[mt_rand(7, 8)]->id; 

            $empresaCl = new  EmpresasController();
            $empresaCl->saveEmpresa($emp);

            /* Datos del llenado de los indices de RIESGO POR EMPRESA */            
            $fechaIni = strtotime('2020-11-01');
            $fechaFin = strtotime($this->now());
            $fechaActual = $fechaIni;

            while($fechaActual <= $fechaFin ){
                $numeroDiasMuestra = mt_rand(2 , 7);
                $fechaActual = strtotime(date('Y-m-d',$fechaActual) . "+ {$numeroDiasMuestra}  days"); /*se suma la cantidad de dias en que se toma la muestra*/

                $empRiesg = new \stdClass();
                $empRiesg->id_empresa = $emp->id;
                $empRiesg->fecha = date('Y-m-d', $fechaActual);
                /* Respuestas dpara las 8 preguntas , segun las opciones correspondientes */
                $empRiesg->respuestas = [];
                $empRiesg->respuestas[] = ['id_opcion'=> mt_rand(22 , 24)];
                $empRiesg->respuestas[] = ['id_opcion'=> mt_rand(25 , 28)];
                $empRiesg->respuestas[] = ['id_opcion'=> mt_rand(29 , 30)];
                $empRiesg->respuestas[] = ['id_opcion'=> mt_rand(31 , 34)];
                $empRiesg->respuestas[] = ['id_opcion'=> mt_rand(35 , 36)];
                $empRiesg->respuestas[] = ['id_opcion'=> mt_rand(37 , 40)];
                $empRiesg->respuestas[] = ['id_opcion'=> mt_rand(41 , 43)];
                $empRiesg->respuestas[] = ['id_opcion'=> mt_rand(44 , 46)];
                
                // return response()->json([
                //     'emp' => $empRiesg,
                //     'fechaIni' => $fechaIni,
                //     'fechaIniD' => date('Y-m-d', $fechaIni),
                //     'fechaFin' => $fechaFin,
                //     'fechaFinD' => date('Y-m-d', $fechaFin),
                //     'fechaActual' => $fechaActual,
                //     'fechaActD' => date('Y-m-d', $fechaActual),
                // ]);
                $evalCntller = new EvalController();
                $evalCntller->saveEpresaRiesgo($empRiesg);
            }
        }

        \DB::select('ALTER TABLE empresas_respuestas_riesgo auto_increment = 300001');
        \DB::select('ALTER TABLE empresas_indice_riesgo     auto_increment = 300001');
        return response()->json([
            'mensaje' => 'ITS DONE',
        ]);
    }

}

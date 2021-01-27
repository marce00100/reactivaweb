@extends('layouts.principal_tpl')



@section('header')

{{-- <link rel="stylesheet" href="./public/libs_pub/jqwidgets5.5.0/jqwidgets/styles/jqx.base.css" type="text/css" /> --}}
<link rel="stylesheet" href="./public/libs_pub/jqwidgets11/styles/jqx.base.css" type="text/css" />


<style media="screen">
.popup-basic {
  position: relative;
  background: #FFF;
  max-width: 85%;
  margin: 40px auto;
  padding: 0 ;
}
.admin-form .panel-heading{
    background-color: #fafafa !important;
    border-color: transparent -moz-use-text-color #ddd;
    border-radius: 0;
    border-style: solid none;
    border-width: 1px 0;
    color: #333;
    height: 40px;
    overflow: hidden;
    padding: 2px 15px;
    position: relative;
}

</style>
@endsection

@section('content')
<div id="contenedor">
    <!--  ===========================================    begin: .tray-center    =============================================================== -->
    <div class="tray tray-center  va-t posr" id="div_principal">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-visible ph10" id="spy2">
                	<div class="titulo-modulo p20 pb30" >
                		<h1 class="titulo-modulo">Opciones de Testings</h1>
                	</div>

                    <div class="panel-heading  bg-dark ">
                        <div class="panel-title ">
                            <i class="fa fa-puzzle-piece fa-2x" ></i><span __cabecera_dt>Opciones</span> 
                        </div>
                    </div>

                    <div __opciones_test >                       
                    </div>
                    <div __resultado></div>

                </div>
            </div>
        </div>
    </div>
      <!-- end: .tray-center -->
</div>



@endsection

@push('script-head') 
<script type="text/javascript">

/* *************************** TESTINGS *************************** */

$(function(){

    /* ******* guardar-empresa' ******/

    $("[__opciones_test]").prepend("<button id='btnGuardarEmpresa' class='btn btn-warning mt70'>TEST guardar empresa</button>");   
    $("[__opciones_test]").on('click', '#btnGuardarEmpresa', function(){   
        console.log("PRESS GUARDAR EMPRESAA");
        let url = globalApp.urlBase + 'api/guardar-empresa';
        
        let objEnvio ={
            id: "43&&__75tu===044",   /* generado con UID, OBLIGATORIO, varchar*/
            nombre: "Textihyhylgre ", /* varchar , OBLIGATORIO*/
            id_rubro: 3,  /* int , OBLIGATORIO, id del rubro*/
            direccion : "Calle Olivos N 54",
            responsable_nombre : "Jorge Raul",
            responsable_ap : "Lopez Quinteros",
            mail : "cualquier@cosa.com", /* verificar si tiene el formato correcto en appMovil*/
            activo : 1, /* 1,0 -- si esta vigente 1, si se de de baja 0 , si no se envia por defecto se almacena 1*/
            id_departamento : 3, /* integer */
            id_municipio : 125, /* integer */
        }

        $.post(url, objEnvio, function(res){                       
            console.log("guardado EMPRESA GOOD ");
        });
    })

    /* ******* guardar-respuestas-preguntas-riesgo ******/

    $("[__opciones_test]").prepend("<button id='btnGuardarPreguntas' class='btn btn-danger mt70'>TEST guardar respuestas de preguntas RIESGO</button>");   
    $("[__opciones_test]").on('click', '#btnGuardarPreguntas', function(){
        
        console.log("PRESS GUARDAR PREG");
        let url = globalApp.urlBase + 'api/guardar-respuestas-preguntas-riesgo';
        // let url = 'http://fdbb661.online-server.cloud/reactivaweb/api/guardar-respuestas-preguntas-riesgo';
        let objEnvio ={
            id_empresa:'654321',
            respuestas:[
                {id_opcion:24}, // 22-24
                {id_opcion:28}, // 25-28
                {id_opcion:29}, // 29-30 
                {id_opcion:31}, // 31-34
                {id_opcion:36 }, // 35-36
                {id_opcion:39 }, // 37-40
                {id_opcion:43}, // 41-43
                {id_opcion:46}, // 44-46
            ]
        }

        $.post(url, objEnvio, function(res){                       
            console.log("guardado BIEEEN");
        });
    })

    
    /******************* guardar-respuestas-epp *********************/

    $("[__opciones_test]").prepend("<button id='btnGuardarEPP' class='btn btn-system mt70'>TEST guardar respuestas EPP</button>");   
    $("[__opciones_test]").on('click', '#btnGuardarEPP', function(){   
        console.log("PRESS GUARDAR RESPUESTASS EPPPPPP");
        // let url = ruta + 'guardar-respuestas-epp';
        let url = globalApp.urlBase + 'api/guardar-respuestas-epp';
        
        let objEnvio ={
            id_empresa: "EMP0908-258", /* varchar , OBLIGATORIO*/
            id_epp_opcion: 58,  /* int , OBLIGATORIO, es el id de la opcion epp que ha llenado  */
            categoria_epp : "epp", /* varchar  OBLIGAORIO , valores pueden ser  [epp o personal */
            respuestas: [
                {valor:58 , fecha_epp:'2020-10-22'},
                {valor:20 , fecha_epp:'2020-10-23'},
                {valor:12 , fecha_epp:'2020-10-24'},
                {valor:21 , fecha_epp:'2020-10-25'},
                {valor:20 , fecha_epp:'2020-10-26'},
            ]
        }

        $.post(url, objEnvio, function(res){                      
        });
    })

        /* S E E D S llena empresas y sus riesgos aleatoriamente */
    $("[__opciones_test]").prepend("<button id='btnSeeds' class='btn btn-primary mt70'>TEST seedsa</button>"); 
    $("[__opciones_test]").on('click', '#btnSeeds', function(){ 
        console.log("PRESS EMPESAS SEEDs");
        let url = globalApp.urlBase + 'api/seeds-empresa-riesgos';
        $("[__resultado").html("<div class='fs25' ><i class='fa fa-spin fa-plus fa-3x text-danger'></i> <span>trabajando...</span></div>");
        $.get(url, function(res){   
            $("[__resultado").html(res.mensaje);
        });

    });


    /* prueba promedios*/
    $("[__opciones_test]").append("<button id='btnGetPromedios' class='btn btn-system mt70'>promedio </button>");   
    $("[__opciones_test]").on('click', '#btnGetPromedios', function(){   

        let url = globalApp.urlBase + 'api/indice-promedio-rubro';  

        let id_empresa_obj = { id_empresa : 'mype100400' };
        
        $.post(url, id_empresa_obj, function(res){
            console.log(res);                      
        });
    })

       

})
	
	

</script>

@endpush
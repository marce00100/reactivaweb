<!DOCTYPE html>
<html>

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>Reactiva</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css" href="./public/libs_pub/sty-02/vendor/plugins/magnific/magnific-popup.css">
    <!-- Admin Forms CSS -->
    <link rel="stylesheet" type="text/css" href="./public/libs_pub/sty-02/assets/admin-tools/admin-forms/css/admin-forms.css">
    {{-- Admin Modals CSS --}}
    <link rel="stylesheet" type="text/css" href="./public/libs_pub/sty-02/assets/admin-tools/admin-plugins/admin-modal/adminmodal.css">
    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="./public/libs_pub/select2-4.0.12/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="./public/libs_pub/bower_components/sweetalert/sweetalert.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" type="text/css" href="./public/libs_pub/sty-02/assets/skin/default_skin/css/theme.css"> 

    <link rel="stylesheet" type="text/css" href="./public/css/webapp.css"> 


    

    <!-- Favicon -->

    <link rel="shortcut icon" type="image/png" sizes="32x32" href="./public/img/webapp/logo-reactiva-re.png">

    <style media="screen">        

        /*demo styles*/
        body {
            min-height: 2000px;
        }
        .custom-nav-animation li {
            display: none;
        }
        .custom-nav-animation li.animated {
            display: block;
        }

        /* nav fixed settings */
        ul.tray-nav.affix {
            width: 319px;
            top: 80px;
        }
    </style>

     @yield('header')


</head>

<body class="admin-panels-page sb-l-c sb-l-o" data-spy="scroll" data-target="#nav-spy" data-offset="300">
    <!-- Start: Main -->

    <!-- Start: Header -->
    <div class="navbar navbar-fixed-top bg-white p10" style="height: 80px; border-bottom: solid 1px grey">
        <ul class="nav navbar-nav navbar-left">
            <div class="pl30" >
                <a href="http://fdbb661.online-server.cloud/wordpress/" title="" rel="home">
                    <img class="header-image is-logo-image" alt="" src="./public/img/webapp/logo-reactiva.png" title="" style="width:180px">
                </a>
            </div>
            

        </ul> 
        <ul class="nav navbar-nav navbar-right">
            <div class="" style="padding: 15px 0px 0px 0px">
                <span ><a __menu_mod="gestion-contenido" class="menu-principal" href="./gestion-contenidos" class="text-white">Contenidos </a> </span>
                <span ><a __menu_mod="gestion-contenido" class="menu-principal" href="./gestion-noticias" class="text-white">Noticias </a> </span>
                <span ><a __menu_mod="gestion-contenido" class="menu-principal" href="./gestion-recomendaciones" class="text-white">Recomendaciones</a> </span>
                <span ><a __menu_mod="gestion-contenido" class="menu-principal" href="./seguimiento-empresas" class="text-white">ver Empresas </a> </span>
                <span ><a __menu_mod="gestion-contenido" class="menu-principal" href="./config-parametros" class="text-white">Ajustes </a> </span>
                {{-- <span ><a __menu_mod="gestion-contenido" class="menu-principal" href="#" class="text-white">Estadisticas </a> </span> --}}
            </div>
            

        </ul>         
    </div>
    {{-- End: Header --}}


   <!-- Start: Content-Wrapper -->
    <section id="content_wrapper" >
        <!-- Begin: Content -->
        <!-- =========================== CONTENIDO ============================ -->
        <section id="main_content" class="table-layout_ animated fadeIn col-md-10 col-md-offset-1" style="min-height: 3500px; margin-top: 70px">
            {{-- <div id="appVue"> --}}
                {{ csrf_field() }}
                @yield('content')
            {{-- </div> --}}
        </section>
        <!-- End: Content -->
    </section>

 </body>

    <!-- End: Main -->



    <!-- BEGIN: PAGE SCRIPTS -->    
@yield('scriptShift')
{{-- <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script> --}}
{{-- <script type="text/javascript" src="./public/libs_pub/sty-02/vendor/jquery/jquery-1.11.1.min.js"></script> --}}
<script type="text/javascript" src="./public/libs_pub/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="./public/libs_pub/sty-02/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>
<!-- Bootstrap -->
<script type="text/javascript" src="./public/libs_pub/sty-02/assets/js/bootstrap/bootstrap.min.js"></script>

{{-- <script type="text/javascript" src="./public/libs_pub/sty-02/assets/admin-tools/admin-forms/js/advanced/steps/jquery.steps.js"></script> --}}
 <script type="text/javascript" src="./public/libs_pub/sty-02/assets/admin-tools/admin-forms/js/jquery.validate.min.js"></script>
{{-- <script type="text/javascript" src="./public/libs_pub/sty-02/assets/admin-tools/admin-forms/js/additional-methods.min.js"></script> --}}
<script type="text/javascript" src="./public/libs_pub/sty-02/vendor/plugins/magnific/jquery.magnific-popup.js"></script>

<!-- Theme Javascript -->
<script type="text/javascript" src="./public/libs_pub/sty-02/assets/js/utility/utility.js"></script>
{{-- <script type="text/javascript" src="./public/libs_pub/admindesigns/assets/js/main.js"></script> --}}
{{-- <script type="text/javascript" src="./public/libs_pub/admindesigns/assets/js/demo.js"></script> --}}

{{-- <script type="text/javascript" src="./public/libs_pub/admindesigns/vendor/plugins/slick/slick.min.js"></script> --}}

<script type="text/javascript" src="./public/libs_pub/select2-4.0.12/dist/js/select2.full.min.js"></script>
<script type="text/javascript" src="./public/libs_pub/lodash/lodash.min.js"></script>
<script type="text/javascript" src="./public/libs_pub/moment/min/moment.min.js"></script>

<script type="text/javascript" src="./public/libs_pub/bower_components/sweetalert/sweetalert.min.js"></script>
<script type="text/javascript" src="./public/libs_pub/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script> 

<script type="text/javascript" src="./.config.js"></script> 



<script type="text/javascript">

    /*------------------------------- VARIABLE DE CONFIGURACION ------------------*/
    


$(function(){

    /* ************ FUNCIONES GLOBALES ******************/
    var globalFunctions =  {
        showModal : function(modal){
            $(".state-error").removeClass("state-error")
            $("#form_cont em").remove();
                $.magnificPopup.open({
                removalDelay: 200, //delay removal by X to allow out-animation,
                focus: '#titulo',
                items: {
                    src: modal
                },
                callbacks: {
                    beforeOpen: function(e) {
                        var Animation = "mfp-zoomIn";
                        this.st.mainClass = Animation;
                    }
                },
            });
        }, 
        /* fields: {rules{ field:{required:true},... }, messages:{ field: {required: "mensaje"} }  }    
        todos los campos del form enviados (field) , seran reriddos,
        |  functionSave = functionSave   Funcion donde se salva  normalmente será del tipo conT.saveData() 
        */
        validateRules: function(fields, functionSave){
            var reglasVal = {
                    errorClass: "state-error",
                    validClass: "state-success",
                    errorElement: "em",

                    rules : fields.rules,
                    messages : fields.messages,

                    highlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').addClass(errorClass).removeClass(validClass);
                    },
                    unhighlight: function(element, errorClass, validClass) {
                            $(element).closest('.field').removeClass(errorClass).addClass(validClass);
                    },
                    errorPlacement: function(error, element) {
                        if (element.is(":radio") || element.is(":checkbox")) {
                                element.closest('.option-group').after(error);
                        } else {
                                error.insertAfter(element.parent());
                        }
                    },
                    submitHandler: function(form) {
                        functionSave();
                    }
            }
            return reglasVal; 
        }, 
        /*   Normalmente será la respueta de una API*/
        showMensajeFlotante: function(mensajecorto, estado, mensajelargo){
            new PNotify({
                title: estado == 'ok' ? mensajecorto : 'Error',
                text: mensajelargo,
                shadow: true,
                opacity: 0.9,
                    type: (estado == 'ok') ? "success" : "danger",
                    delay: 2500
            });

        },


        /* retorna un objeto con los  field:valor*/
        getData__fields: function(){
            let campos = $("[__field]");
            let objeto = {};
            _.each(campos, function(elem){
                if($(elem).attr('type') == 'checkbox' )
                    objeto[ $(elem).attr('__field')] = $(elem).prop('checked') ? 1 : 0;
                else
                    objeto[ $(elem).attr('__field')] = $(elem).val();
            });
            return objeto;
        },

        /* Coloca los valores a los fields desde un objeto*/
        setData__fields: function(obj){ 
            _.each(obj, function(val, key){
                let tipo = $(`[__field=${key}]`).attr('type');

                if( tipo == 'checkbox')     
                    $(`[__field=${key}]`).prop('checked', (val == 1) ? true : false);
                else
                    $(`[__field=${key}]`).val(val);
            })
        },

        /* Crea los Options de un Select
            listaOpciones : array de objetos
            key: Nombre de valor que sera el vualue
            text: Que atributo del objeto sera el texto
            primera opcion: si se tiene un "Selecciones opcion" o nada (el primer valor sera la primera opcion)
        */
        generaOpciones: (listaOpciones, key, text, primera_opcion) => {
            if(primera_opcion)
                return _.reduce(listaOpciones, function(retorno, item){
                            return  retorno + `<option value="${item[key]}">${item[text]} </option>`;
                        } , `<option value="${primera_opcion}">${primera_opcion} </option>`);                
            else            
                return _.reduce(listaOpciones, function(retorno, item){
                    return  retorno + `<option value="${item[key]}">${item[text]} </option>`;
                } , `<!-->` );
        },

    }

    window.globalApp = globalFunctions;
    $.extend(window.globalApp, config_params ); /* Config_params es del archivo de .config.js */

})


























*/* *************************** TEST *************************** */

$(function(){


    /* ******* guardar-respuestas-preguntas-riesgo ******/

    // $("#main_content").prepend("<button id='btnGuardarPreguntas'>TEST guardar respuestas de preguntas</button>");   
    $("#main_content").on('click', '#btnGuardarPreguntas', function(){
        
        console.log("PRESS GUARDAR PREG");
        let url = ruta + 'guardar-respuestas-preguntas-riesgo';
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
    });

    /* ******* guardar-empresa' ******/

    // $("#main_content").prepend("<button id='btnGuardarEmpresa'>TEST guardar respuestas de preguntas</button>");   
    $("#main_content").on('click', '#btnGuardarEmpresa', function(){   
        console.log("PRESS GUARDAR EMPRESAA");
        let url = ruta + 'guardar-respuestas-preguntas-riesgo';
        // let url = 'http://fdbb661.online-server.cloud/reactivaweb/api/guardar-empresa';
        
        let objEnvio ={
            id: "ojoktf",   /* generado con UID, OBLIGATORIO, varchar*/
            nombre: "Textil KIO", /* varchar , OBLIGATORIO*/
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

        });
    })


    /******************* guardar-respuestas-epp *********************/

    // $("#main_content").prepend("<button id='btnGuardarEPP'>TEST guardar respuestas EPP</button>");   
    $("#main_content").on('click', '#btnGuardarEPP', function(){   
        console.log("PRESS GUARDAR RESPUESTASS EPPPPPP");
        // let url = ruta + 'guardar-respuestas-epp';
        let url = 'http://fdbb661.online-server.cloud/reactivaweb/api/guardar-respuestas-epp';
        
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

       

})

</script>
@stack('script-head')

</body>

</html>

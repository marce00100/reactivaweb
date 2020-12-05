@extends('layouts.principal_tpl')



@section('header')

<link rel="stylesheet" href="./public/libs_pub/jqwidgets11/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet"href="./public/libs_pub/jqwidgets11/styles/jqx.energyblue.css"  type="text/css" />

<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


<style media="screen">
.popup-basic {
  position: relative;
  background: #FFF;
  width: auto;
  max-width: 900px;
  margin: 40px auto;
}
##.admin-form .panel-heading{
    background-color: #fafafa;
    border-color: transparent -moz-use-text-color #ddd;
    border-radius: 0;
    border-style: solid none;
    border-width: 1px 0;
    color: #999;
    height: auto;
    overflow: hidden;
    padding: 3px 15px 2px;
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
                		<h1 class="titulo-modulo">Generador de Contenidos</h1>
                	</div>
                	<div style="margin-bottom: 20px; text-align: center ">                		
                		<span __submenu="0" class="submenu ">COVID 19</span>
                		<span __submenu="1" class="submenu">Riesgos por Rubro</span>
                		<span __submenu="2" class="submenu">Seguridad Ocupacional</span>
                	</div>

                    <div class="panel-heading  bg-dark ">
                        <div class="panel-title ">
                            <i class="fa fa-file-alt fa-2x" ></i> Información de  <span __cabecera_dt>COVID 19</span> <span __cabecera_dt_est></span>
                        </div>
                    </div>
                    <div class="panel-body pn">
                        <div class="row">
                            <div  class="col-md-12" >
                                <button  __accion="nuevo"   class="btn btn-sm btn-success dark m5 br4"><i class="fa fa-plus-circle text-white"></i> Agregar </button>
                                <button  __accion="editar"  class="btn btn-sm btn-warning dark m5 br4"><i class="fa fa-edit text-white"></i> Editar</button>
                                <button  __accion="eliminar" class="btn btn-sm btn-danger dark m5 br4"><i class="fa fa-minus-circle text-white"></i> Eliminar</button>                                
                                
                            </div>
                        </div>
                        <div >
                            <div id="dataT" style="margin: 0 0 40px 0" ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- end: .tray-center -->




    <!-- -----------------------------------------          Modal  --------------------------------------------------- -->
    <div id="modal"  class="white-popup-block popup-basic admin-form mfp-with-anim mfp-hide">
        <div class="panel">
            <div class="panel-heading bg-dark">
                <span class="panel-title text-white" id="tituloModal"><i class="fa fa-pencil"></i> <span>__</span></span>
            </div>
            <!-- end .panel-heading section -->

            <form method="post" action="/" id="form_cont" name="form_cont">
            {{-- <form method="post" action="/" id="form_cont" name="form_cont"> --}}
                <div class="panel-body mnw700 of-a">
                    <div class="row">                            
                            <div class="row">
                                <div class=" pl5 br-r mvn15">
                                    <h5 class="ml5 mt20 ph10 pb5 br-b fw700"><small class="pull-right fw600"> <span class="text-primary">-</span> </small> </h5>

                                    <input class="hidden" name="id" id="id" __field="id">

                                    <div class="section">
                                        <label class="field-label" for="titulo">Título</label>
                                        <label for="titulo" class="field prepend-icon">
                                            <input type="text" required="" class="gui-input" id="titulo" __field="titulo" name="titulo" placeholder="Título">
                                            <label for="titulo" class="field-icon"><i class="glyphicons glyphicons-riflescope"></i>
                                            </label>
                                        </label>
                                    </div>

                                    <div class="section">
                                    	<label class="field-label" for="texto">Texto</label>
                                    	<label for="texto" class="field prepend-icon">
                                    		<textarea class="gui-textarea" required="" id="texto" __field="texto" name="texto"  placeholder="Texto" rows="2"></textarea>
                                    		<label for="texto" class="field-icon"><i class=" glyphicons glyphicons-notes"></i>
                                    		</label>
                                    	</label>
                                    </div>

                                    <div class="section">
                                        <div style="border: 1px solid #ddd" class="pt10">
                                            <div class="section row">
                                                <div class="col-md-3" style="text-align:center">
                                                    <label __imagen_label="" class="field-label">Imagen: </label>
                                                    <label class="field prepend-icon_ file" style="">
                                                        <span class="btn  bg-primary darker  fa  fa-search fa-lg " style="padding: 10px 2px;width: 150px;height: 10;margin: 0 auto;">
                                                        </span> 
                                                        <input type="file" __archivo_up="" class="gui-file" style="padding: 0px;" title="Ningun Archivo Seleccionado">
                                                        <input __field="imagen_almacenada" id="imagen_almacenada" class="hidden" name="">
                                                        <input id="imagen_nueva" class="hidden" name="">
                                                    </label>
                                                </div>
                                                <div class="col-md-9">
                                                    <div style="width:204px; min-height: 100px; padding: 2px; background-color: black">    
                                                        <img __imagen_img="" src="" alt="" style="width: 200px">
                                                    </div>
                                                </div> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="section">
                                        <label class="field-label" for="atribucion">Link a url</label>
                                        <label for="url_redireccion" class="field prepend-icon">
                                            <input type="text" class="gui-input" id="url_redireccion" __field="url_redireccion" name="url_redireccion" placeholder="Url de link">
                                            <label for="url_redireccion" class="field-icon"><i class="fa fa-link"></i>
                                            </label>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label class="field-label" for="orden"></label>
                                        <label for="orden" class="field prepend-icon">
                                            <input  type="number" class="gui-input w200" id="orden" __field="orden" name="orden" placeholder="Orden en aparecer">
                                            <label for="orden" class="field-icon"><i class="fa fa-list-ol"></i>
                                            </label>
                                        </label>
                                    </div>

                                    <div class="row m10 ml20 ">
	                                    <label class="switch switch-sm block mt5 switch-success switch-round ">
	                                    	<span><strong>Activo</strong></span>
	                                    	<input type="checkbox" name="activo" id="activo" __field="activo" value="">
	                                    	<label class="fs11" for="activo" data-on="SI" data-off="NO"></label>
	                                    	
	                                    </label>
	                                </div>

                                </div>
                            </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="button btn-primary cont_save">Guardar</button>
                    <a href="#"  id="atr_cancelar"  class="button btn-danger ml25 cont_cancelar">Cancelar</a>
                </div>
            </form>
        </div>
        <!-- end: .panel -->
    </div>

</div>
@endsection

@push('script-head')

<script type="text/javascript" src="./public/libs_pub/jqwidgets11/jqxcore.js"> </script>
<script type="text/javascript" src="./public/libs_pub/jqwidgets11/jqxbuttons.js"> </script>
<script type="text/javascript" src="./public/libs_pub/jqwidgets11/jqxscrollbar.js"> </script>
<script type="text/javascript" src="./public/libs_pub/jqwidgets11/jqxdata.js"> </script>
<script type="text/javascript" src="./public/libs_pub/jqwidgets11/jqxdatatable.js"> </script>
<script type="text/javascript" src="./public/libs_pub/jqwidgets11/jqxdraw.js"> </script>
<script type="text/javascript" src="./public/libs_pub/jqwidgets11/jqxchart.core.js"> </script>

<script src="./public/libs_pub/min/jqwidgets-localization_custom.js"></script>
<script type="text/javascript">
$(function(){
	$scope = {
        indice: 0,
        data: [],
	}

    let conT = {
    	contenedor: '#contenedor',
    	modal: "#modal",
        dataTableTarget : $("#dataT"),
        source : {},

        cargarDatos: function(){
            $.get(`${globalApp.urlBase}api/obtener-full-contenidos`, function(resp){
                $scope.data = resp.data;
                conT.fillDataT();
                // conT.fillDataT();
            });
        },
        fillDataT : function() {  
                conT.source =
                {
                    dataType: "json",
                    localdata: $scope.data[$scope.indice].contenidos,
                    dataFields: [
                        { name: 'id', type: 'number' },
                        { name: 'titulo', type: 'string' },
                        { name: 'texto', type: 'string' },
                        { name: 'imagen_almacenada', type: 'string' },
                        { name: 'url_redireccion', type: 'string' },
                        { name: 'fecha_registro', type: 'date' },
                        { name: 'orden', type: 'number' },
                        { name: 'tipo_contenido', type: 'number' },
                        { name: 'activo', type: 'number' },
                    ],
                    id: 'id',
                };

                var dataAdapter = new $.jqx.dataAdapter(conT.source);

                /* Aqui se configura el DT y se le asigna al Contenedor DIV*/
                conT.dataTableTarget.jqxDataTable({
                    source: dataAdapter,
                    theme: 'energyblue',
                    height: 500,
                    pageable: false,
                    altRows: false,
                    sortable: true,
                    width: "100%",
                    filterable: true,
                    filterMode: 'simple',
                    selectionMode: 'singleRow',
                    localization: getLocalization('es'),
                    columns: [
                        { text: 'Titulo ', width: 250, align:'center',  cellsalign: 'left', dataField: 'titulo',
                        	cellsrenderer: function(row, column, value, rowData){
	                   			return `<a __accion="editar" style="color:black; cursor:pointer; text-decoration:none">
	                   			<i class="fa fa-edit fa-lg text-warning "></i>   	
	                   			<b>${rowData.titulo}</b></a>`
                            } 
                        },
                        { text: 'Imagen', width: 180, align:'center',  cellsalign: 'center', dataField: 'imagen_almacenada',
                        	cellsrenderer: function(row, column, value, rowData){

	                   			let imagen_almacenada = rowData.imagen_almacenada;
	                   			if(imagen_almacenada != null && imagen_almacenada != "")
	                   				return `<img src="./public/img/uploads/${imagen_almacenada}" alt="" style="width: 120px">`
	                   			else 
	                   				return "";
                            } 
                        },
	                   	{ text: 'Texto resumen', width: 350, align:'center',  cellsalign: 'left',  dataField: 'texto',
	                   		cellsrenderer: function(row, column, value, rowData){
	                   			let resume = rowData.texto.substr(0,200);
	                   			return `<div style="font-size: 8px!important, color: blue,  ">${resume} <b>...</b></div>`
                            } 
                        },
                        { text: 'Fecha Registro', width: 130, align:'center',  cellsalign: 'center',  dataField: 'fecha_registro',
	                   		cellsrenderer: function(row, column, value, rowData){
	                   			return (rowData.fecha_registro != null && rowData.fecha_registro != "") ?  moment(rowData.fecha_registro).format('DD/MM/YYYY') : "";
	                   		}
                        },
                        // { text: 'Fecha Registro', width: 150, align:'center',  cellsalign: 'center', dataField : 'fecha_registro'},
                        { text: 'Orden', width: 50, align:'center',  cellsalign: 'center', dataField : 'orden'},
                        { text: 'Activo', width: 50, align:'center',  cellsalign: 'center',  dataField: 'activo',
                        	cellsrenderer: function(row, column, value, rowData) {
                        		let activo = rowData.activo;
                        		return `<span style="color: ${ (activo == 1) ? 'blue' : 'red' }; font-weight: 700; "    > ${ (activo == 1) ?'SI' : 'NO'}</span>`
                        	}
                        },
                    ]
            });
        },
        refreshDataT: function(){
            $.get(globalApp.urlBase + 'api/obtener-full-contenidos', function(resp) { 
                $scope.data = resp.data;
                conT.source.localdata = $scope.data[$scope.indice].contenidos;
                conT.dataTableTarget.jqxDataTable("updateBoundData");
            })   
        },
        showModal : function(){
            $(".state-error").removeClass("state-error")
            $("#form_cont em").remove();
                $.magnificPopup.open({
                removalDelay: 500, //delay removal by X to allow out-animation,
                focus: '#titulo',
                items: {
                    src: "#modal"
                },
                // overflowY: 'hidden', //
                callbacks: {
                    beforeOpen: function(e) {
                        var Animation = "mfp-zoomIn";
                        this.st.mainClass = Animation;
                    }
                },
                midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
            });
        }, 
        nuevo: function(){
            $("#tituloModal span").html(`Agregar ${funciones.tipoContenido()}`);
            $('#form_cont input').val('');
            $('#form_cont textarea').val('');
            $('#form_cont input:checkbox').val('');

            $("[__imagen_label").html("Imgen");
            $("#imagen_almacenada").val("");
            $("#imagen_nueva").val("");

            conT.showModal();
        },
        editar: function(){
            var rowSelected = conT.dataTableTarget.jqxDataTable('getSelection');
            if(rowSelected.length > 0){
                var rowSel = rowSelected[0]; 
                conT.setData(rowSel);
                $("#tituloModal span").html(`Modificar ${funciones.tipoContenido()}`);
                conT.showModal();
            }
            else{
                swal("Seleccione el registro para modificar.");
            }
        },
        getData: function(){     	
		    let objeto = globalApp.getData__fields();
            objeto.imagen_almacenada = $("#imagen_nueva").val(); /* La imagen_almacenada se actualiza para ser anviada,  con la imagen que se ha cargado, si no se carga ninguna imagen , de entrada ambas tienen el mismo valor asi que siguen siendo iaguales */
            objeto.tipo_contenido = $scope.data[$scope.indice].id_tipo_contenido; /* id del parametro que contiene el tipo_contenido*/
            return objeto;
        },
        setData: function(obj){

            // _.each(obj, function(val, key){
            //     if( $(`[__field=${key}]`).attr('type') == 'chekbox')     
            //         $(`[__field=${key}]`).prop('checked', (val == 1) ? true : false);
            //     else
            //         $(`[__field=${key}]`).val(val);
            // })

            $("#id").val(obj.id);
            $("#titulo").val(obj.titulo);
            $("#texto").val(obj.texto);
            $("#url_redireccion").val(obj.url_redireccion);
            $("#tipo_contenido").val(obj.tipo_contenido);
            $("#orden").val(obj.orden);            
            $("#activo").prop("checked", obj.activo );

            $("#imagen_almacenada").val(obj.imagen_almacenada);

            $("#imagen_nueva").val(obj.imagen_almacenada);
            $("[__imagen_label]").html("Imagen: " +  obj.imagen_almacenada );
            $("[__imagen_img]").attr("src", "./public/img/uploads/" + obj.imagen_almacenada);

        },
        validateRules: function(){
            var reglasVal = {
                    errorClass: "state-error",
                    validClass: "state-success",
                    errorElement: "em",

                    rules: {
                        titulo: { required: true },
                        texto:  { required: true },
                    },

                    messages:{
                        titulo: { required: 'campo obligatorio' },
                        texto:  { required: 'campo obligatorio' },
                    },

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
                        conT.saveData();
                    }
            }
            return reglasVal; 
        }, 
        saveData: function(){  
            let obj = conT.getData(); 

            let postDatosContenido = () => {
            	$.post(globalApp.urlBase + 'api/guardar-contenido', {contenido : obj}, function(resp){
            		conT.refreshDataT();
            		new PNotify({
            			title: resp.estado == 'ok' ? 'Guardado' : 'Error',
            			text: resp.mensaje,
            			shadow: true,
            			opacity: 0.9,
                            type: (resp.estado == 'ok') ? "success" : "danger",
                            delay: 1500
                        });
            	});	
            }            

            if( $("#imagen_almacenada").val() != $("#imagen_nueva").val() ){
            	let archivo = funciones.obtenerArchivo('[__archivo_up]');
                let formData = new FormData();
            	formData.append('archivo', archivo);
            	formData.append('archivo_nombre', obj.imagen_almacenada); /* obj.imagen_seleccionada contiene el valor de la nueva imagen */
            	
            	$.ajax({
		            type: "POST",
		            enctype: 'multipart/form-data',
		            url: globalApp.urlBase + 'api/upload-file',
		            data: formData,
		            processData: false,
		            contentType: false,
		            cache: false,
		            timeout: 600000,
		            success: function (data) {

		            	obj.imagen_almacenada = archivo.name;
		            	postDatosContenido();
		            	$.magnificPopup.close(); 
		            },
		        });
                
            }
            else{
            	postDatosContenido();
            	$.magnificPopup.close(); 
            } 
        },
        eliminar: function(){
            var rowSelected = conT.dataTableTarget.jqxDataTable('getSelection'); 
            if(rowSelected.length > 0) {
                var rowSel = rowSelected[0];
                swal({
                    title: `Está seguro de eliminar el registro seleccionado ? `,
                    text: "Se borrara complatemente y ya no podrá recuperar este registro!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, eliminar!",
                    closeOnConfirm: true
                }, function(){
                    $.post(globalApp.urlBase + 'api/eliminar-contenido-key', {'id': rowSel.id }, function(res){
                        new PNotify({
                                  title: (res.estado == 'ok') ? 'Eliminado' : 'Error!!' ,
                                  text: res.mensaje,
                                  shadow: true,
                                  opacity: 0.9,
                                  type:  (res.estado == 'ok') ? "success" : 'danger',
                                  delay: 2000
                              });
                        conT.refreshDataT();
                    });
                });           
            }
            else{
                swal("Seleccione el registro que desea eliminar.");
            }
        },
    }

    var funciones = {
        estadistics : function()
        {
            // try{ 
            //     var politicas = conT.source.localdata;
            //     $(".sp_est_politica").removeClass('badge bg-success bg-danger dark');
            //     $(".sp_est_politica").addClass( (politicas.length > 0) ? 'badge bg-system dark' : 'badge bg-danger');
            //     $(".sp_est_politica").html(politicas.length);
            // }
            // catch(e){}
        },


        tipoContenido: () => {
            return "Contenido";
        },

        /* obtiene el archivo cargado de un input:file */
        obtenerArchivo: selector => { 
        	let archivo = $(selector)[0];
        	// return (archivo.files.length>0) ? archivo.files[0] : "no_archivo";
            return archivo.files[0] ;
        },

        seleccionaSubMenu(){
            if($scope.data.length > 0){
                conT.fillDataT();
                 $("[__cabecera_dt]").html($scope.data[$scope.indice].nombre);
            }
            $("[__submenu]").removeClass('seleccionado');
            $(`[__submenu=${$scope.indice}]`).addClass('seleccionado');
           
        }




    }



    

    //-------------------- Listeners  --------------------------------
    
  	let listen = ()=>{

	    $(conT.contenedor).on('click',  '[__accion]' , function(e){
	    	var elem = e.currentTarget;
	    	conT[ $(elem).attr('__accion') ](); /* equivale a conT.nuevo*/
	    });


        /* SUBE A R C H I V O */
        $(conT.modal).on('change', "[__archivo_up]", function(){
            let inputFile = $(this);

            let archivo = inputFile[0].files[0];
            inputFile.attr("title","Archivo SELECCIONADO " + archivo.name);
            $("[__imagen_label]").html("Imagen: " +  archivo.name );
            $("#imagen_nueva").val(archivo.name );

            var reader = new FileReader();
            reader.onload = function(event) {
                $("[__imagen_img]").attr('src', event.target.result );
            }
            reader.readAsDataURL(archivo);
        });

        /* Cancel Modal*/
	    $(".cont_cancelar").click(function(){
	        $.magnificPopup.close();
	    });

	    // $(".cont_save").click(function(){
	    //     conT.saveData();
	    // });

        /* Al hacer clic en Submenu, actualizamos la variable $scope.indice  */
        $(conT.contenedor).on('click',  '[__submenu]' , function(e){
            let elem = e.currentTarget;
            $scope.indice = $(elem).attr('__submenu');
            funciones.seleccionaSubMenu();
        });
    }


	/*------------------------------  INIT ---------------------------------*/
    
    let init = () => {

    	$("#form_cont").validate(conT.validateRules());
		conT.cargarDatos();
        funciones.seleccionaSubMenu()

    }
    
    listen();
    init();

    

    

})

	
	

</script>

@endpush
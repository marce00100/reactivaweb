@extends('layouts.principal_tpl')



@section('header')

{{-- <link rel="stylesheet" href="./public/libs_pub/jqwidgets5.5.0/jqwidgets/styles/jqx.base.css" type="text/css" /> --}}
<link rel="stylesheet" href="./public/libs_pub/jqwidgets11/styles/jqx.base.css" type="text/css" />

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
                		<h1 class="titulo-modulo">Monitor de Empresas</h1>
                	</div>
                	{{-- <div style="margin-bottom: 20px; text-align: center ">                		
                		<span style="padding: 5px 10px; margin:0 10px   ; font-weight: 700; border-bottom: 3px orange solid ">COVID 19</span>
                		<span style="padding: 5px 10px; margin:0 10px   ; font-weight: 700;  ">Riesgos por Rubro</span>
                		<span style="padding: 5px 10px; margin:0 10px   ; font-weight: 700;  ">Seguridad Ocupacional</span>
                	</div> --}}
                	{{-- <div>
                		<label class="field-label" for="ids_pilares">Tipo de Contenido </label>
                		<div class="section">
                            <label class="field select">
                                <select id="tipoContenido" name="tipoContenido" class="required" style="width:100%;">
                                    
                                </select>
                                <i class="arrow"></i>                  
                            </label>
                        </div>

                    </div> --}}
                    <div class="panel-heading  bg-dark ">
                        <div class="panel-title ">
                            <i class="fa fa-puzzle-piece fa-2x" ></i><span __cabecera_dt>Búsqueda de empresas</span> 
                        </div>
                    </div>
                    <div class="panel-body pn">
                        <div class="row">
                            <div  class="col-md-12" >
                                {{-- <button  __accion="nuevo"   class="btn btn-sm btn-success dark m5 br4"><i class="fa fa-plus-circle text-white"></i> Agregar </button>
                                <button  __accion="editar"  class="btn btn-sm btn-warning dark m5 br4"><i class="fa fa-edit text-white"></i> Editar</button> --}}
                                {{-- <button  __accion="eliminar" class="btn btn-sm btn-danger dark m5 br4"><i class="fa fa-minus-circle text-white"></i> Eliminar</button>   --}}                              
                                
                            </div>
                        </div>
                        <div id="dataT"></div>                        
                    </div>
                    <div style="margin-top: 15px">
                        <div class="row pt15" style="border-top: solid 3px grey">
                            <div __emp_info class="col-sm-6">
                            </div>
                            <div __emp_riesgo_now class="col-sm-6">
                                
                            </div>
                                
                        </div>
                        <div __emp_tabla_riesgo>
                            
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
            <form method="post" action="javascript:void(0)" id="form_cont" name="form_cont">
            {{-- <form method="post" action="/" id="form_cont" name="form_cont"> --}}
                <div class="panel-body mnw700 of-a">
                    <div class="row">

                            
                            <div class="row">
                                <div class=" pl5 br-r mvn15">
                                    <h5 class="ml5 mt20 ph10 pb5 br-b fw700"><small class="pull-right fw600"> <span class="text-primary">-</span> </small> </h5>

                                    <input class="hidden" name="id_contenido" id="id_contenido" __field="id">

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
                                    	<label __imagen_label class="field-label" >Imagen</label>
                                    	<label class="field prepend-icon_ file" style="width: 80px;display: flex;">
                                    		<span class="btn  bg-system  fa  fa-search " style="padding: 0px 2px;width: 100%; height:25px">
                                    		</span> 
                                    		<input type="file" __archivo_up  class="gui-file" style="padding: 0px;" title="Ningun Archivo Seleccionado">
                                    	</label>
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

	let state = {
		actual : 'inicio',
	}
    let conT = {
    	contenedor: '#contenedor',
    	modal: "#modal",
        dataTableTarget : $("#dataT"),
        source : {},

        fillTable : function() {
            $.get(globalApp.urlBaseApi + 'obtener-empresas', function(resp)
            {
                conT.source =
                {
                    dataType: "json",
                    localdata: resp.data,
                    dataFields: [
                        { name: 'id', type: 'number' },
                        { name: 'nombre', type: 'string' },
                        { name: 'rubro', type: 'string' },
                        { name: 'departamento', type: 'string' },
                        { name: 'municipio', type: 'string' },
                        { name: 'responsable_nombre', type: 'string' },
                        { name: 'responsable_ap', type: 'string' },
                        { name: 'fecha_creacion', type: 'date' },
                        { name: 'fecha_modificacion', type: 'date' },
                        { name: 'activo', type: 'number' },
                    ],
                    id: 'id',
                };

                var dataAdapter = new $.jqx.dataAdapter(conT.source);
                /* Aqui se configura el DT y se le asigna al Contenedor DIV*/
                conT.dataTableTarget.jqxDataTable({
                    source: dataAdapter,
                    altRows: false,
                    sortable: true,
                    width: "100%",
                    filterable: true,
                    filterMode: 'simple',
                    selectionMode: 'singleRow',
                    localization: getLocalization('es'),
                    columns: [
                        { text: 'Nombre ', width: 250, align:'center',  cellsalign: 'left', dataField: 'nombre',
                        	cellsrenderer: function(row, column, value, rowData){
	                   			return `<a __accion="ver_detalle" style="color:black; cursor:pointer; text-decoration:none">
	                   			<i class="fa fa-search fa-lg text-success "></i>   	
	                   			<b>${rowData.nombre}</b></a>`
                            } 
                        },
                        { text: 'Rubro', width: 150, align:'center',  cellsalign: 'center', dataField: 'rubro'},
	                   	{ text: 'Departamento', /*width: 60,*/ align:'center',  cellsalign: 'left',  dataField: 'departamento'},
                        { text: 'Municipio', /*width: 60,*/ align:'center',  cellsalign: 'left',  dataField: 'municipio'},

                        { text: 'Fecha de Registro', width: 150, align:'center',  cellsalign: 'center',  dataField: 'fecha_creacion',
	                   		cellsrenderer: function(row, column, value, rowData){
	                   			return (rowData.fecha_creacion != null && rowData.fecha_creacion != "") ?  moment(rowData.fecha_creacion).format('DD/MM/YYYY') : "";
	                   		}
                        },
                        { text: 'Ultima Modificación', width: 150, align:'center',  cellsalign: 'center',  dataField: 'fecha_modificacion',
                            cellsrenderer: function(row, column, value, rowData){
                                return (rowData.fecha_creacion != null && rowData.fecha_creacion != "") ?  moment(rowData.fecha_creacion).format('DD/MM/YYYY') : "";
                            }
                        },
                        { text: 'Activo', width: 50, align:'center',  cellsalign: 'center',  dataField: 'activo',
                        	cellsrenderer: function(row, column, value, rowData) {
                        		let activo = rowData.activo;
                        		return `<span style="color: ${ (activo == 1) ? 'blue' : 'red' }; font-weight: 700; "    > ${ (activo == 1) ?'SI' : 'NO'}</span>`
                        	}
                        },

                    ]
                });
                // funciones.estadistics();
            });
        },
        refreshDataT: function(){
            $.get(globalApp.urlBaseApi + 'obtener-full-contenidos', function(resp) {
                conT.source.localdata = resp.data[0].contenidos;
                conT.dataTableTarget.jqxDataTable("updateBoundData");
            })   
        },
        init : function(){
            // $.get(globalApp.urlBaseApi + "getPilaresVinculadosAlPlan", {p:globalApp.idPlanActivo}, function(res){
            //     opts = res.data;
            //     opts.forEach(function(op){
            //         $("#ids_pilares").append('<option value="' + op.id + '">' + op.nombre + ' - ' + op.descripcion + '</option>');
            //     });
            //     $("#ids_pilares").select2({
            //         placeholder: 'Seleccione los pilares de la política',
            //         dropdownParent: $('#form_cont'),
            //         cache: false,
            //         language: "es",
            //         templateSelection: function (val) {
            //             return $("<div class='list-group-item' style='width:100%;' title ='" + val.text + "'>" +val.text + "</div>");
            //         },
            //     });
            // });


            // $("").html(funciones.tTítuloipoPolitica());
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
        getData: function(){     	
		    let objeto = globalApp.getData__fields();
            return objeto;
        },
        setData: function(obj){

            $("#id_contenido").val(obj.id);
            $("#titulo").val(obj.titulo);
            $("#url_redireccion").val(obj.url_redireccion);
            $("#orden").val(obj.orden);
            $("#activo").prop("checked", obj.activo );
            $("#texto").val(obj.texto);

        },
        nuevo: function(){
            $("#tituloModal span").html(`Agregar ${funciones.tipoContenido()}`);
            $('#form_cont input:text').val('');
            $('#form_cont textarea').val('');
            $('#form_cont input:checkbox').val('');
            conT.showModal();
        },
        editar: function(){
            var rowSelected = conT.dataTableTarget.jqxDataTable('getSelection');
            if(rowSelected.length > 0)
            {
                var rowSel = rowSelected[0]; 
                conT.setData(rowSel);
                $("#tituloModal span").html(`Modificar ${funciones.tipoContenido()}`);
                conT.showModal();
            }
            else{
                swal("Seleccione el registro para modificar.");
            }
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


            let archivo = funciones.obtenerArchivo('[__archivo_up]');

            var postDatosContenido = () => {
            	$.post(globalApp.urlBaseApi + 'guardar-contenido', {contenido : obj}, function(resp){
            		conT.refreshDataT();
            		new PNotify({
            			title: resp.estado == 'ok' ? 'Guardado' : 'Error',
            			text: resp.mensaje,
            			shadow: true,
            			opacity: 0.9,
                            // addclass: noteStack,
                            type: (resp.estado == 'ok') ? "success" : "danger",
                            // stack: Stacks[noteStack],
                            // width: findWidth(),
                            delay: 1500
                        });
            	});	
            }
            

            if(archivo != "no_archivo"){
            	let formData = new FormData();
            	formData.append('archivo', archivo);
            	formData.append('archivo_nombre_orig', archivo.name);

            	
            	$.ajax({
		            type: "POST",
		            enctype: 'multipart/form-data',
		            url: globalApp.urlBaseApi + 'upload-file',
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

    }

    var funciones = {
        estadistics : function()
        {
            try{ 
                var politicas = conT.source.localdata;
                $(".sp_est_politica").removeClass('badge bg-success bg-danger dark');
                $(".sp_est_politica").addClass( (politicas.length > 0) ? 'badge bg-system dark' : 'badge bg-danger');
                $(".sp_est_politica").html(politicas.length);
            }
            catch(e){}
        },


        tipoContenido: () => {
            return "Contenido";
        },

        /* obtiene el archivo cargado de un input:file */
        obtenerArchivo: selector => { 
        	let archivo = $(selector)[0];
        	return (archivo.files.length>0) ? archivo.files[0] : "no_archivo";
        },

        mostrar_info_empresa: function(){
            let rowSelected = conT.dataTableTarget.jqxDataTable('getSelection');

            if(rowSelected.length > 0)
            {
                var rowSel = rowSelected[0]; 
                let html = `<div>
                                <span style="display:block" class="fs14"><b> ${ (rowSel.activo) ? 'Empresa <span class="text-success-darker">ACTIVA</span> en sistema' : 'Empresa <span class="text-danger-darker"> ELIMINADA<span>'}</b></span>
                                <span style="display:block"><b>Empresa:</b> ${(rowSel.nombre) }</span>
                                <span style="display:block"><b>Rubro:</b> ${rowSel.rubro }</span>
                                <span style="display:block"><b>Departamento:</b> ${ rowSel.departamento ? rowSel.departamento : '' }</span>
                                <span style="display:block"><b>Municipio:</b> ${rowSel.municipio ? rowSel.municipio : ''}</span>
                                <span style="display:block"><b>Dirección:</b> ${rowSel.direccion ? rowSel.direccion : ''}</span>
                                <span style="display:block"><b>Responsable:</b> ${rowSel.responsable_nombre ? rowSel.responsable_nombre :''} ${rowSel.responsable_ap?rowSel.responsable_ap:''}</span>
                                <span style="display:block"><b>Correo electronico:</b> ${rowSel.mail ? rowSel.mail : ''}</span>
                                <span style="display:block"><b>Fecha registro:</b> ${moment(rowSel.fecha_creacion).format('DD/MM/YYYY') }</span>
                                <span style="display:block"><b>Fecha última modicicación:</b> ${moment(rowSel.fecha_modificacion).format('DD/MM/YYYY') }</span>

                            </div> ` ;
                return html;
            }
        }

        /* carga submenu para contenidos, se le debe enviar un array y el parametro del que se obtiene el submenu */
        // submenu: (lista, campo)=>{
        // 	let html = "<div>"
        // 	lista.forEach(item){

        // 	}
        // }

    }



    

    //-------------------- Listeners  --------------------------------
    
  	let listen = ()=>{

	    $(conT.modal).on('change', "[__archivo_up]", function(){
	    	var archivo = $(this);
	    	console.log(archivo[0].files[0])
	    	console.log(archivo[0].files.length)
	    	archivo.attr("title","Archivo SELECCIONADO " + archivo[0].files[0].name);
	    	$("[__imagen_label]").html("Imagen: " +  archivo[0].files[0].name );
	    });

	    $(".cont_cancelar").click(function(){
	        $.magnificPopup.close();
	    });

	    $(".cont_save").click(function(){
	        conT.saveData();
	    });

        $(conT.contenedor).on("click", "[__accion='ver_detalle']", function(){
            $("[__emp_info]").html(funciones.mostrar_info_empresa());
        })
    }


	/*------------------------------  INIT ---------------------------------*/
    
    let init = () => {

    	// $("#form_cont").validate(conT.validateRules());
		conT.fillTable();

    }
    
    listen();
    init();

    

    

})

	
	

</script>

@endpush
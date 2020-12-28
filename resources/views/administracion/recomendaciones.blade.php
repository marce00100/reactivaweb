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
                		<h1 class="titulo-modulo">Recomendaciones</h1>
                	</div>

                    <div class="panel-heading  bg-dark ">
                        <div class="panel-title ">
                            <i class="fa fa-lightbulb fa-2x" ></i> Lista de recomendaciones según riesgo <span __cabecera_dt_est></span>
                        </div>
                    </div>
                    <div class="panel-body pn">
                        <div class="row">
                            <div  class="col-md-12" >
                                {{--<bu tton  __accion="nuevo"   class="btn btn-sm btn-success dark m5 br4"><i class="fa fa-plus-circle text-white"></i> Agregar </button> --}}
                                <button  __accion="editar"  class="btn btn-sm btn-warning dark m5 br4"><i class="fa fa-edit text-white"></i> Editar</button>
                                {{-- <button  __accion="eliminar" class="btn btn-sm btn-danger dark m5 br4"><i class="fa fa-minus-circle text-white"></i> Eliminar</button>   --}}   
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
                                        <input class="hidden" name="riesgo" id="riesgo" __field="riesgo">
                                        <label class="field-label" for="riesgo">Nivel de Riesgo</label>
                                        <label  class="field prepend-icon" for="riesgo">
                                            <b><span __field_riesgo class="gui-input" ></span></b>
                                            {{-- <select __field="riesgo" class="gui-input" id="riesgo" name="riesgo">
                                                <option value=2>Normal</option>
                                                <option value=1>Alta</option>
                                            </select> --}}
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label class="field-label" for="recomendacion">Recomendación</label>
                                        <span style="font-size: 12px; font-weight: 600;">Este texto se muestra en el celular, en su propia página o panel</span>
                                        <label for="recomendacion" class="field prepend-icon">
                                            <textarea type="text" required="" class="gui-input" id="recomendacion" __field="recomendacion" name="recomendacion" placeholder="Texto de la recomendación" style="min-height: 300px"></textarea>
                                            <label for="recomendacion" class="field-icon"><i class="glyphicons glyphicons-riflescope"></i>
                                            </label>
                                        </label>
                                    </div>

                                    <div class="section">
                                        <label class="field-label" for="recomendacion_corta">Recomendación resumida</label>
                                        <span style="font-size: 12px; font-weight: 600;">Éste texto se muestra en la pantalla Home, junto con otros datos. Debe ser lo mas resumido posible. </span>
                                        <label for="recomendacion_corta" class="field prepend-icon">
                                            <textarea type="text" required="" class="gui-input" id="recomendacion_corta" __field="recomendacion_corta" name="recomendacion_corta" placeholder="Resúmen" style="min-height: 200px"></textarea>
                                            <label for="recomendacion_corta" class="field-icon"><i class="glyphicons glyphicons-riflescope"></i>
                                            </label>
                                        </label>
                                    </div>


                                    {{-- <div class="row m10 ml20 ">
	                                    <label class="switch switch-sm block mt5 switch-success switch-round ">
	                                    	<span><strong>Activo</strong></span>
	                                    	<input type="checkbox" name="activo" id="activo" __field="activo" value="">
	                                    	<label class="fs11" for="activo" data-on="SI" data-off="NO"></label>
	                                    	
	                                    </label>
	                                </div> --}}

                                </div>
                            </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="button btn-primary cont_save">Guardar</button>
                    <a href="#"  id="atr_cancelar"  class="button btn-danger ml25 cont_cancelar">cerrar</a>
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
            $.get(`${globalApp.urlBase}api/obtener-fullrecomendaciones`, function(resp){
                $scope.data = resp.data;
                conT.fillDataT();
                // conT.fillDataT();
            });
        },
        fillDataT : function() {  
                conT.source =
                {
                    dataType: "json",
                    localdata: $scope.data,
                    dataFields: [
                        { name: 'id', type: 'number' },
                        { name: 'riesgo', type: 'string' },
                        { name: 'recomendacion', type: 'string' },
                        { name: 'recomendacion_corta', type: 'string' },
                        { name: 'activo', type: 'number' },
                        { name: 'fecha_modificacion', type: 'date' },
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
                        { text: '', width: 50, align:'center',  cellsalign: 'center',
                            cellsrenderer: function(row, column, value, rowData){
                                return  `<a __accion="editar" href="javascript:void(0);" style="color:black; cursor:pointer; text-decoration:none">
                                <i class="fa fa-edit fa-lg text-warning "></i>`;
                            }
                        },
                        { text: 'Categoría de Riesgo', width: 250, align:'center',  cellsalign: 'center', dataField : 'riesgo',
                            cellsrenderer: function(row, column, value, rowData){
                                return `<b>${rowData.riesgo} </b>` }
                        },
                        { text: 'Recomendación extensa', width: 350, align:'center',  cellsalign: 'left', dataField: 'recomendacion',
                        	cellsrenderer: function(row, column, value, rowData){
	                   			return `<div style="font-size: 8px!important, color: blue,  ">${ rowData.recomendacion.substr(0,250) } ... </div>` }
                        },
                        
	                   	{ text: 'Recomendación resumen', width: 350, align:'center',  cellsalign: 'left',  dataField: 'recomendacion_corta',
	                   		cellsrenderer: function(row, column, value, rowData){
	                   			// let resume = rowData.texto.substr(0,200);
	                   			return `<div style="font-size: 8px!important, color: blue,  ">${rowData.recomendacion_corta} </div>`
                            } 
                        },
                        { text: 'última modificación', width: 130, align:'center',  cellsalign: 'center',  dataField: 'fecha_modificacion',
	                   		cellsrenderer: function(row, column, value, rowData){
	                   			return (rowData.fecha_modificacion != null ) ?  moment(rowData.fecha_modificacion).format('DD/MM/YYYY') : "";
	                   		}
                        },

                        // { text: 'Activo', width: 50, align:'center',  cellsalign: 'center',  dataField: 'activo',
                        // 	cellsrenderer: function(row, column, value, rowData) {
                        // 		let activo = rowData.activo;
                        // 		return `<span style="color: ${ (activo == 1) ? 'blue' : 'red' }; font-weight: 700; "    > ${ (activo == 1) ?'SI' : 'NO'}</span>`
                        // 	}
                        // },
                    ]
            });
        },
        refreshDataT: function(){
            $.get(globalApp.urlBase + 'api/obtener-fullrecomendaciones', function(resp) { 
                $scope.data = resp.data;
                conT.source.localdata = $scope.data;
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
            $("#tituloModal span").html(`Agregar recomendación`);
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
                $("#tituloModal span").html(`Modificar la recomendación`);
                conT.showModal();
            }
            else{
                swal("Seleccione el registro para modificar.");
            }
        },
        getData: function(){     	
		    let objeto = globalApp.getData__fields();
            return objeto;
        },
        setData: function(obj){

            $("#id").val(obj.id);
            $("#riesgo").val(obj.riesgo);
            $("#recomendacion").val(obj.recomendacion);
            $("#recomendacion_corta").val(obj.recomendacion_corta);
                     
            // $("#activo").prop("checked", obj.activo );
;

            $("[__field_riesgo]").html(obj.riesgo);

            $("[__field_riesgo]").removeClass();
            let nivelClass = "bg-light";
            obj.riesgo.includes('bajo') ? nivelClass = 'gui-input bg-info': false; 
            obj.riesgo.includes('medio') ? nivelClass = 'gui-input bg-yellow': false; 
            obj.riesgo.includes('alto') ? nivelClass = 'gui-input bg-warning darker': false; 
            obj.riesgo.includes('muy alto') ? nivelClass = 'gui-input bg-danger': false; 
            $("[__field_riesgo]").addClass(nivelClass);

        },
        validateRules: function(){
            var reglasVal = {
                    errorClass: "state-error",
                    validClass: "state-success",
                    errorElement: "em",

                    rules: {
                        recomendacion: { required: true },
                        recomendacion_corta:  { required: true },
                    },

                    messages:{
                        recomendacion: { required: 'campo obligatorio' },
                        recomendacion_corta:  { required: 'campo obligatorio' },
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
            $.post(globalApp.urlBase + 'api/guardar-recomendacion', {recomendacion : obj}, function(resp){
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

    }



    

    //-------------------- Listeners  --------------------------------
    
  	let listen = ()=>{

	    $(conT.contenedor).on('click',  '[__accion]' , function(e){
	    	var elem = e.currentTarget;
	    	conT[ $(elem).attr('__accion') ](); /* equivale a conT.nuevo*/
	    });



        /* Cerrar Modal*/
	    $(".cont_cancelar").click(function(){
	        $.magnificPopup.close();
	    });

	    // $(".cont_save").click(function(){
	    //     conT.saveData();
	    // });


    }


	/*------------------------------  INIT ---------------------------------*/
    
    let init = () => {

    	$("#form_cont").validate(conT.validateRules());
		conT.cargarDatos();
    }
    
    listen();
    init();

    

    

})

	
	

</script>

@endpush
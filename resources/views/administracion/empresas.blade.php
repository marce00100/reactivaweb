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
                		<h1 class="titulo-modulo">Monitor de Empresas</h1>
                	</div>

                    <div class="panel-heading  bg-dark ">
                        <div class="panel-title ">
                            <i class="fa fa-puzzle-piece fa-2x" ></i><span __cabecera_dt>Búsqueda de empresas</span> 
                        </div>
                    </div>

                    <div __contenedor_dataT id="contenedor_dataT" class="panel-body pn">
                        <div id="dataT"></div>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- end: .tray-center -->




    <!-- -----------------------------------------          Modal  --------------------------------------------------- -->
    <div id="modal"  class="white-popup-block popup-basic admin-form mfp-with-anim mfp-hide">
        <div class="panel">
            <div class="panel-heading">
                <i class="fa fa-house-damage fa-lg"></i> <span style="margin: 0 5px; font-size:16px; color:#777; ">Información de la empresa</span style="margin: 0 5px; font-size:16px; color:#333; ">
            </div>

            <div class="panel-body mnw700 of-a">

                <div __contenedor_dataEmp id="contenedor_dataEmp" class="bg-white mt15 " >
                    <div __emp_header ></div>
                    <div class="row pt15" >
                        <div __emp_info class="col-sm-4">
                        </div>
                        <div __emp_riesgo_now class="col-sm-8" style="text-align: center;">
                            <div id="divGraph"></div>                                
                        </div>

                    </div>
                    <div __emp_tabla_riesgo class="mt20">
                        <div id="indRiesgosDT"></div>
                    </div>                        
                </div>

            </div>

            <div class="panel-footer">
                <a __btn_cerrar class="btn btn-info btn-sm ml25 cont_cancelar " href="#" id="atr_cancelar">
                    Cerrar
                </a>
            </div>


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


<script type="text/javascript" src="./public/libs_pub/Highcharts-6.0.4/code/highcharts.js"></script>
<script type="text/javascript" src="./public/libs_pub/Highcharts-6.0.4/code/highcharts-3d.js"></script>
<script type="text/javascript" src="./public/libs_pub/Highcharts-6.0.4/code/modules/exporting.js"></script>
{{-- <script type="text/javascript" src="./public/libs_pub/modify/hightcharts/themes/dark-unica_.src.js"></script> --}}
<script type="text/javascript" src="./public/libs_pub/modify/hightcharts/themes/grid_.src.js"></script>


<script type="text/javascript">
$(function(){

	var state = {
        empresa_sel: {},
        empresa_sel_indices: [],
	}

    let conT = {
    	contenedor: '#contenedor',
    	modal: "#modal",
        dataTableTarget : $("#dataT"),
        source : {},

        fillTable : function() {
            $.get(globalApp.urlBase + 'api/obtener-empresas', function(resp)
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
            $.get(globalApp.urlBase + 'api/obtener-full-contenidos', function(resp) {
                conT.source.localdata = resp.data[0].contenidos;
                conT.dataTableTarget.jqxDataTable("updateBoundData");
            })   
        },
        init : function(){
            // $.get(globalApp.urlBase + "api/getPilaresVinculadosAlPlan", {p:globalApp.idPlanActivo}, function(res){
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


    }

    var emp = {
        mostrarInfoEmpresa: function(){
            let rowSelected = conT.dataTableTarget.jqxDataTable('getSelection');

            if(rowSelected.length > 0)
            {
                let rowSel = rowSelected[0]; 
                state.empresa_sel = rowSel;                
                let emp_header_html = `
                                <h2 class="text-center text-primary darker ">${(rowSel.nombre) }</h2>
                                <h3 class="text-center text-info darker">Rubro: ${rowSel.rubro }</h3>`;
                let emp_info_html = `<div class="mt30 ml10" style="color:#333">                                
                                <span style="display:block" class="fs14"><b> ${ (rowSel.activo) ? 'Empresa <span class="text-success-darker">ACTIVA</span> en sistema' : 'Empresa <span class="text-danger-darker"> ELIMINADA<span>'}</b></span>
                                <br>
                                <span style="display:block"><b>Departamento:</b> ${ rowSel.departamento ? rowSel.departamento : '' }</span>
                                <span style="display:block"><b>Municipio:</b> ${rowSel.municipio ? rowSel.municipio : ''}</span>
                                <span style="display:block"><b>Dirección:</b> ${rowSel.direccion ? rowSel.direccion : ''}</span>
                                <span style="display:block"><b>Responsable:</b> ${rowSel.responsable_nombre ? rowSel.responsable_nombre :''} ${rowSel.responsable_ap?rowSel.responsable_ap:''}</span>
                                <span style="display:block"><b>Correo electronico:</b> ${rowSel.mail ? rowSel.mail : ''}</span>
                                <span style="display:block"><b>Fecha registro:</b> ${moment(rowSel.fecha_creacion).format('DD/MM/YYYY') }</span>
                                <span style="display:block"><b>Fecha última modicicación:</b> ${moment(rowSel.fecha_modificacion).format('DD/MM/YYYY') }</span>
                                </div> ` ;

                $(conT.contenedor + " [__emp_header]").html(emp_header_html);  
                $(conT.contenedor + " [__emp_info]").html(emp_info_html);  

                $.get(globalApp.urlBase + 'api/obtener-indices-empresa/' + rowSel.id, function(res){
                    state.empresa_sel_indices = res.data.empresa_indices_riesgo;

                    emp.mostrar_chart();
                    emp.mostrar_indices_tabla()
                });                
            }

        },
        mostrar_chart : ()=>{
            let objG = 
                {
                    title: { 
                        text: 'Historico: Indices de Riesgo'
                    },
                    subtitle: {
                        text: state.empresa_sel.nombre
                    },
                    yAxis: {
                        title: {
                            text: 'Nivel de Riesgo'
                        }
                    },
                    xAxis: {
                        categories: funciones.convertirParaGraph(state.empresa_sel_indices, 'fecha'),
                    },
                    legend: {
                        // layout: 'vertical',
                        // align: 'right',
                        // verticalAlign: 'middle'
                    },
                    plotOptions: {
                        // series: {
                        //     label: {
                        //         connectorAllowed: false
                        //     },
                        //     pointStart: 2010
                        // }
                    },

                    series: [{
                        name: state.empresa_sel.nombre,
                        data: funciones.convertirParaGraph(state.empresa_sel_indices, 'indice_riesgo', 'int'),
                    },],

                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    layout: 'horizontal',
                                    align: 'center',
                                    verticalAlign: 'bottom'
                                }
                            }
                        }]
                    }

                }

                // Highcharts.chart('#divGraph', objG )
                
            $('#divGraph').highcharts(objG);
        },
        mostrar_indices_tabla: ()=>{
            sourceInd =
            {
                dataType: "json",
                localdata: state.empresa_sel_indices,
                dataFields: [
                    { name: 'fecha', type: 'date' },
                    { name: 'contacto_con_otros', type: 'string' },
                    { name: 'proximidad_fisica', type: 'string' },
                    { name: 'exposicion_enfermedad', type: 'string' },
                    { name: 'trabajo_ambiente_cerrado', type: 'string' },
                    { name: 'indice_riesgo', type: 'string' },
                ],
                id: 'id',
            };

            var dataAdapterInd = new $.jqx.dataAdapter(sourceInd);
            /* Aqui se configura el DT y se le asigna al Contenedor DIV*/
            $("#indRiesgosDT").jqxDataTable({
                source: dataAdapterInd,
                altRows: false,
                sortable: false,
                width: "100%",
                filterable: false,
                filterMode: 'simple',
                selectionMode: 'none',
                localization: getLocalization('es'),
                columns: [                       
                    { text: 'Fecha', width: 150, align:'center',  cellsalign: 'center', dataField: 'fecha',
                        cellsrenderer: function(row, column, value, rowData){
                                return (rowData.fecha != null && rowData.fecha != "") ?  moment(rowData.fecha).format('DD/MM/YYYY') : "";
                        }
                    },
                    { text: 'Contacto con otros', width: 150, align:'center',  cellsalign: 'center', dataField: 'contacto_con_otros'},
                    { text: 'Proximidad Física', width: 150, align:'center',  cellsalign: 'center', dataField: 'proximidad_fisica'},
                    { text: 'Exposicion ala Enfermedad', width: 150, align:'center',  cellsalign: 'center', dataField: 'exposicion_enfermedad'},
                    { text: 'Trabajo en ambiente cerrado', width: 150, align:'center',  cellsalign: 'center', dataField: 'trabajo_ambiente_cerrado'},

                    { text: 'Indice de Riesgo', width: 150, align:'center',  cellsalign: 'center',  dataField: 'indice_riesgo',
                        cellsrenderer: function(row, column, value, rowData){
                            return `<b>${rowData.indice_riesgo} </b>`;
                        }
                    },
                ]
            });
        }
    }

    let funciones = {

        convertirParaGraph: function(coleccion, atributo, tipovar){
            
            let valores = _.map(coleccion , function(item){

                                if(tipovar == 'int') item[atributo] = parseInt(item[atributo])
                            return item[atributo]
                        }) ;
            console.log(valores);
            return valores;
        },


    }



    

    //-------------------- Listeners  --------------------------------
    
  	let listen = ()=>{

        $(conT.contenedor).on("click", "[__accion='ver_detalle']", function(){
            emp.mostrarInfoEmpresa();
            conT.showModal();
        });

        $(".cont_cancelar").click(function(){
            $.magnificPopup.close();
        });





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
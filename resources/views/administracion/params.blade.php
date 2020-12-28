@extends('layouts.principal_tpl')



@section('header')

<link rel="stylesheet" href="./public/libs_pub/jqwidgets11/styles/jqx.base.css" type="text/css" />
<link rel="stylesheet"href="./public/libs_pub/jqwidgets11/styles/jqx.energyblue.css"  type="text/css" />


<style media="screen">
.popup-basic {
  position: relative;
  background: #FFF;
  width: auto;
  max-width: 900px;
  margin: 40px auto;
}
.admin-form .panel-heading{
    /*background-color: #fafafa;*/
    border-color: transparent -moz-use-text-color #ddd;
    border-radius: 3px;
    border-style: solid none;
    border-width: 1px 0;
    color: #999;
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
                		<h1 class="titulo-modulo">Configuración de los parámetros del sistema</h1>
                	</div>
                	<div style="margin-bottom: 20px;  ">

                        <div class="section" style="padding: 0 20px">
                            <h4>Grupo de Parámetros (seleccione para ver elementos)</h4>
                            <label class="field select prepend-icon" for="" style="display: block;">
                                <select  __dominios id="dominios" class="gui-input" style="display: block; padding: 15px; width: 100%; font-size: 15px; background-color: #eaeaef; border-radius: 8px">
                                </select>               		
                               
                            </label>
                            <label __desc_dominio></label>
                        </div> 

                	</div>

                    <div class="panel-heading  bg-dark ">
                        <div class="panel-title text-white-dark">
                            <i class="fa fa-cogs fa-2x" ></i> Elementos del Grupo: <span __cabecera_dt></span> <span __cabecera_dt_est></span>
                        </div>
                    </div>
                    <div class="panel-body pn" style="min-height:400px ">
                        <div class="row">
                            <div  class="col-md-12" >
                                <button  __accion="nuevo"   class="btn btn-sm btn-success dark m5 br4"><i class="fa fa-plus-circle text-white"></i> Agregar </button>
                                <button  __accion="editar"  class="btn btn-sm btn-warning dark m5 br4"><i class="fa fa-edit text-white"></i> Editar</button>
                                <button  __accion="eliminar" class="btn btn-sm btn-danger dark m5 br4"><i class="fa fa-minus-circle text-white"></i> Eliminar</button>                                
                                
                            </div>
                        </div>
                        <div class="row">
                              {{-- D A T A T A B L E    M A I N  --}}
                            <div class="col-sm-6">
                                <div id="dataT" style="margin: 0 0 40px 0" ></div>
                            </div>
                            <div class="col-sm-6 hidden" __contentChilds>
                                <div>
                                    <b>Opciones pertenecientes:</b>
                                </div>
                                <div>
                                    <button  __accionCh="nuevo"   class="btn btn-sm btn-success darker m5 br4"><i class="fa fa-plus-circle text-white"></i> Agregar </button>
                                    <button  __accionCh="editar"  class="btn btn-sm btn-warning darker m5 br4"><i class="fa fa-edit text-white"></i> Editar</button>
                                    <button  __accionCh="eliminar" class="btn btn-sm btn-danger darker m5 br4"><i class="fa fa-minus-circle text-white"></i> Eliminar</button>   
                                </div>
                                <div id="dataTChild" style="margin: 0 0 40px 0" ></div>
                            </div>
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
                <span class="panel-title text-white">
                    <i class="fa fa-puzzle-piece"></i><span __titulo_modal style="font-size: 20px"></span>
                </span>
            </div>
            <!-- end .panel-heading section -->

            <form method="post" action="/" id="form_cont" name="form_cont">
                <div class="panel-body mnw700 of-a">
                    <div class="row">                            
                            <div class="row">
                                <div class=" pl5 br-r mvn15">
                                    <h4  __titulo2_modal  class="ml5 mt20 ph10 pb10 br-b fw700" style="color: #ce4900;"> </h4>
                                    {{-- /* contenerdor de Campos */     --}}
                                    <div __content_fields class="pt20">
                                    </div>
                                   
                                </div>
                            </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <button type="submit" class="button btn-primary">Guardar</button>
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

    const PARAM_CONFIG = {
        'tipo_contenido': { 
                new:false,
                update:true,
                delete:false,
                save_fields: [ {field:'nombre', placeholder:'Tipo de contenido', title:'Tipo de contenido:'},
                                {field:'orden', placeholder:'Posición', title:'Posición en la que aparece'},
                                {field:'activo', placeholder:'', title:'Activo'}, ],
                columns_fields: ['nombre', 'orden', 'activo', 'fecha_modificacion'],
                childs: false,
                ischild: false,
                title:"Tipo de contenido",
                desc: "Categorías de los contenidos. Aparece como título en la ventana de contenidos. "
        },
        'tipo_noticia': { 
                new:false,
                update:true,
                delete:false,
                save_fields: [ {field:'nombre', placeholder:'', title:'Tipo de noticia:'},
                                {field:'orden', placeholder:'Posición', title:'Posición en la que aparece'},
                                {field:'activo', placeholder:'', title:'Activo'}, ],
                columns_fields: ['nombre', 'orden', 'activo', 'fecha_modificacion'],
                childs: false,
                ischild: false,
                title:"Tipo de Noticia",
                desc: "Categorias de las noticias."
        },
        'rubro': { 
                new:true,
                update:true,
                delete:true,
                save_fields: [ {field:'nombre', placeholder:'Rubro', title:'Rubro:'},
                                {field:'orden', placeholder:'Posición', title:'Posición en la que aparece'},
                                {field:'activo', placeholder:'', title:'Activo'}, ],
                columns_fields: ['nombre', 'orden', 'activo', 'fecha_modificacion'],
                childs: false,
                ischild: false,
                title:"Rubros",
                desc: "Rubros o Categorías a la que pertenecen las empresas."
        },
        'pregunta_riesgo': { 
                new:false,
                update:true,
                delete:false,
                save_fields: [{field:'nombre', placeholder:'Pregunta', title:'Pregunta de evaluación:'},],
                columns_fields: ['nombre', 'fecha_modificacion'],
                childs: 'pregunta_riesgo_op',
                ischild: false,
                title:"Preguntas para detectar el índice de riesgo",
                desc: "Solo se puede modificar la propia pregunta, porque determina el cálculo del índice de riesgo"
        },
        'pregunta_riesgo_op': { 
                new:true,
                update:true,
                delete:true,
                save_fields: [ {field:'nombre', placeholder:'Respuesta/Opción', title:'Respuesta de selección:'},
                                {field:'orden', placeholder:'Posición', title:'Posición en la que aparece'},
                                {field:'valor', placeholder:'Valor', title:'Valor para cálculo'},
                                {field:'activo', placeholder:'', title:'Activo'}, ],
                columns_fields: ['nombre', 'valor', 'orden', 'activo', ],
                childs: false,
                ischild: true,
                title:"Opciones de respuesta, para la pregunta de Indice de Riesgo",
                desc: "Cada opción tiene un valor asignado, el cual sirve para calcular el índice de riesgo."
        },
        'tipo_epp': { 
                new:true,
                update:true,
                delete:true,
                save_fields: [ {field:'nombre', placeholder:'', title:'EPP:'},
                                {field:'orden', placeholder:'Posición', title:'Posición en la que aparece'},
                                {field:'activo', placeholder:'', title:'Activo'}, ],
                columns_fields: ['nombre', 'orden', 'activo', 'fecha_modificacion'],
                childs: 'tipo_epp_op',
                ischild: false,
                title:"EPPs",
                desc: "Tipo de EPP."
        },
        'tipo_epp_op': { 
                new:true,
                update:true,
                delete:true,
                save_fields: [ {field:'nombre', placeholder:'Respuesta/opción', title:'Opción de selección:'},
                                {field:'orden', placeholder:'Posición', title:'Posición en la que aparece'},
                                {field:'activo', placeholder:'', title:'Activo'}, ],
                columns_fields: ['nombre', 'orden', 'activo', ],
                childs: false,
                ischild: true,
                title:"Opciones que pertenecen a un tipo de EPP.",
                desc: ""
        },
        'personal_epp': { 
                new:true,
                update:true,
                delete:true,
                save_fields: [ {field:'nombre', placeholder:'Personal EPP', title:'Control de Personal:'},
                                {field:'orden', placeholder:'Posición', title:'Posición en la que aparece'},
                                {field:'activo', placeholder:'', title:'Activo'}, ],
                columns_fields: ['nombre', 'orden', 'activo', 'fecha_modificacion'],
                childs: false,
                ischild: false,
                title:"Número de personal sin contar rubro salud",
                desc: "Personal que corresponde a las empresas que no son del rubro SALUD. "
        },
        'personal_epp_salud': { 
                new:true,
                update:true,
                delete:true,
                save_fields: [ {field:'nombre', placeholder:'Personal EPP', title:'Control de Personal EPP Salud:'},
                                {field:'orden', placeholder:'Posición', title:'Posición en la que aparece'},
                                {field:'activo', placeholder:'', title:'Activo'}, ],
                columns_fields: ['nombre', 'orden', 'activo', 'fecha_modificacion'],
                childs: false,
                ischild: false,
                title:"Número de Personal en el rubro SALUD",
                desc: "Personal que corresponde a las empresas que son del rubro SALUD. "
        },
        'categoria_riesgo': { 
                new:false,
                update:true,
                delete:false,
                save_fields: [{field:'nombre', placeholder:'Nivel riesgo', title:'Nivel de riesgo:'},],
                columns_fields: ['nombre', 'fecha_modificacion'],
                childs: false,
                ischild: false,
                title:"Niveles de Riesgo",
                desc: ""
        },
    }

	let $scope = {
        indice: 0,
        parametros: [],
        dominio_sel: '',
        params_sel: [],        
	}

    let dt = {
        sourceDT: {
            dataType: "json",
            localdata: {}, /* llenar con data*/
            dataFields: [ 
                { name: 'id',       type: 'number' },
                { name: 'dominio',  type: 'string' },
                { name: 'nombre',   type: 'string' },
                { name: 'valor',    type: 'number' },
                { name: 'orden',    type: 'number' },
                { name: 'activo',   type: 'number' },
                { name: 'fecha_modificacion', type: 'date' },
                { name: 'id_padre', type: 'number' },
            ],
            id: 'id',
        },
        fillDataT : function($targetDT, $data, $columns, $isChild=false) { 
            dt.sourceDT.localdata = $data;            
            /* Aqui se asignan las columnas.add(textobj); y la data al Div contenedor*/
            var dataAdapter = new $.jqx.dataAdapter(dt.sourceDT);
            $targetDT.jqxDataTable({
                source: dataAdapter,
                theme: 'energyblue',
                // height: 500,
                pageable: false,
                altRows: false,
                sortable: true,
                // width: "100%",
                // filterable: true,
                filterMode: 'simple',
                selectionMode: 'singleRow',
                localization: getLocalization('es'),
                columns: dt.setColumnsDT($columns, $isChild)
            })            

        }, 
        refreshDataT: function($targetDT, $dataDt){
            $.get(globalApp.urlBase + 'api/get-params', function(resp) { 
                $scope.parametros = resp.data;
                $scope.params_sel = _.filter($scope.parametros, function($param){
                    return ($param.dominio == $scope.dominio_sel)
                });
                dt.sourceDT.localdata = $scope.params_sel;
                conT.dataTableTarget.jqxDataTable("updateBoundData");
                funciones.cabeceraDominioDt();
            })   
        }, 
        
        setColumnsDT: (columns_fields, $isChild=false) => {
            let columnasFormat =[];
            columns_fields.forEach(function(field){
                let textobj = {}; 

                if(field == 'nombre'){
                    textobj =  { 
                        text: 'Nombre Parámetro', width: 250, align:'center',  cellsalign: 'left', dataField: field,
                        cellsrenderer: function(row, column, value, rowData){
                            return rowData[field];
                        } 
                    }                      
                }
                if(field == 'valor'){
                    textobj = { text: 'Valor', width: 50, align:'center',  cellsalign: 'center', dataField : field }
                }
                if(field == 'orden'){
                   textobj = { text: 'Orden', width: 50, align:'center',  cellsalign: 'center', dataField : field }
                }
                if(field == 'activo'){
                    textobj = { 
                        text: 'Activo', width: 50, align:'center',  cellsalign: 'center',  dataField: field,
                        cellsrenderer: function(row, column, value, rowData) {
                            let activo = rowData[field];
                            return `<span style="color: ${ (activo == 1) ? 'blue' : 'red' }; font-weight: 700; "    > ${ (activo == 1) ?'SI' : 'NO'}</span>`
                        }
                    }
                }
                if(field == 'fecha_modificacion'){
                    textobj =  { 
                        text: 'Ult. Modif.', width: 100, align:'center',  cellsalign: 'center',  dataField: field,
                        cellsrenderer: function(row, column, value, rowData){
                            return (rowData[field] != null && rowData[field] != "") ?  moment(rowData[field]).format('DD/MM/YYYY') : "";
                        }
                    }
                }

                columnasFormat.push(textobj);
            });

            /* se agrega la columna de editar*/
            let __accion = $isChild ? '__accionCh' : '__accion';
            columnasFormat.unshift({ 
                text: '', width: 30, align:'center',  cellsalign: 'center',
                cellsrenderer: function(row, column, value, rowData){
                    return `<a ${ __accion}="editar" href="javascript:void(0);" style="color:black; cursor:pointer; text-decoration:none">
                    <i class="fa fa-edit fa-lg text-warning "></i>`
                } 
            });
            return columnasFormat; 
        },

    }

    let conT = {
    	contenedor: '#contenedor',
    	modal: "#modal",
        dataTableTarget : $("#dataT"),
        // source : {},

        cargarDatos: function($fn){
            $.get(`${globalApp.urlBase}api/get-params`, function(resp){
                $scope.parametros = resp.data;
                $fn()
            });
        },               
        nuevo: function(){
            $("[__titulo_modal]").html(`Agregar elemento`);
            $("[__titulo2_modal").html(`En Grupo: ${PARAM_CONFIG[$scope.dominio_sel].title}` );
            funciones.setFieldsModal(PARAM_CONFIG[$scope.dominio_sel].save_fields);

            // $("[__field='id']").val();
            $("[__field='dominio']").val($scope.dominio_sel);
            // $("[__field='id_padre']").val();
            globalApp.showModal("#modal");
        },
        editar: function(){
            $("[__titulo_modal]").html(`Modificar elemento`);
            $("[__titulo2_modal").html(`Grupo: ${PARAM_CONFIG[$scope.dominio_sel].title}` );
            funciones.setFieldsModal(PARAM_CONFIG[$scope.dominio_sel].save_fields)

            var rowSelected = conT.dataTableTarget.jqxDataTable('getSelection');
            if(rowSelected.length > 0){
                var rowSel = rowSelected[0]; 
                conT.setData(rowSel);
                globalApp.showModal("#modal");
            }
            else{
                swal("Seleccione un registro.");
            }
        },
        getData: function(){     	
		    let objeto = globalApp.getData__fields();
            return objeto;
        },
        setData: function(obj){
            globalApp.setData__fields(obj);
        },        
        creaReglasValidacion: ()=>{
            let reglas = {
                 messages: {nombre: { required : "El nombre del elemento es obligatorio. "}, },
                 rules: {nombre: { required : true}, }                      
            };
            return globalApp.validateRules(reglas, conT.saveData);
        },
        saveData: function(){  
            let obj = conT.getData(); 
        	$.post(globalApp.urlBase + 'api/save-parametro', {parametro : obj}, function(resp){
        		dt.refreshDataT();                
                globalApp.showMensajeFlotante("Guardado", resp.estado, resp.mensaje);
                funciones.ocultarPanelChildrens();
        	});	
            $.magnificPopup.close();  
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
                    $.post(globalApp.urlBase + 'api/delete-parametro', {'id': rowSel.id }, function(resp){
                        dt.refreshDataT();
                        globalApp.showMensajeFlotante("Eliminado", resp.estado, resp.mensaje);
                        funciones.ocultarPanelChildrens();
                    });
                });           
            }
            else{
                swal("Seleccione el registro que desea eliminar.");
            }
        },
    }

    let chiT = {
        contenedor: '#contenedor',
        modal: "#modal",
        dataTableTarget: $('#dataTChild'),
        nuevo: function(){
            let rowPadreSelected = conT.dataTableTarget.jqxDataTable('getSelection');
            let dominioChilds = PARAM_CONFIG[rowPadreSelected[0].dominio].childs;
            $("[__titulo_modal]").html(`Agregar elemento`);
            $("[__titulo2_modal").html(`Para la pregunta: ${rowPadreSelected[0].nombre}` );
            funciones.setFieldsModal(PARAM_CONFIG[dominioChilds].save_fields);

            // $("[__field='id']").val();
            $("[__field='dominio']").val(dominioChilds);
            $("[__field='id_padre']").val( rowPadreSelected[0].id);
            globalApp.showModal("#modal");
        },
        editar: function(){
            let rowPadreSelected = conT.dataTableTarget.jqxDataTable('getSelection');
            let dominioChilds = PARAM_CONFIG[rowPadreSelected[0].dominio].childs;
            $("[__titulo_modal]").html(`Modificar elemento`);
            $("[__titulo2_modal").html(`Para la pregunta: ${rowPadreSelected[0].nombre}` );
            funciones.setFieldsModal(PARAM_CONFIG[dominioChilds].save_fields)

            var rowSelected = chiT.dataTableTarget.jqxDataTable('getSelection');
            if(rowSelected.length > 0){
                var rowSel = rowSelected[0]; 
                conT.setData(rowSel);
                globalApp.showModal("#modal");
            }
            else{
                swal("Seleccione un registro.");
            }
        },
        eliminar: function(){
            var rowSelected = chiT.dataTableTarget.jqxDataTable('getSelection'); 
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
                    $.post(globalApp.urlBase + 'api/delete-parametro', {'id': rowSel.id }, function(resp){
                        dt.refreshDataT();
                        globalApp.showMensajeFlotante("Eliminado", resp.estado, resp.mensaje);
                        funciones.ocultarPanelChildrens();
                    });
                });           
            }
            else{
                swal("Seleccione el registro que desea eliminar.");
            }
        },

    }

    let funciones = {
        cargarDominios: function(){
            let dominiosRaiz =  [];
            _.mapKeys(PARAM_CONFIG, function(val, key){
                if(!val.ischild)
                    dominiosRaiz.push({ 'dominio':key, 'title':val.title });
                return key;
            }) 

            let opciones = globalApp.generaOpciones(dominiosRaiz, 'dominio', 'title', false );
            $("[__dominios]").html(opciones);  

            funciones.setDominioSel(dominiosRaiz[0].dominio);
        },       

        setDominioSel: dominioSel => {
            $scope.dominio_sel = dominioSel;
            $scope.params_sel = _.filter($scope.parametros, function($param){
                return ($param.dominio == dominioSel)
            });
            $("[__accion='nuevo']").css('display', PARAM_CONFIG[$scope.dominio_sel].new       ? 'inline' :'none') 
            $("[__accion='editar']").css('display', PARAM_CONFIG[$scope.dominio_sel].update   ? 'inline' :'none') 
            $("[__accion='eliminar']").css('display', PARAM_CONFIG[$scope.dominio_sel].delete ? 'inline' :'none') 

            $("[__desc_dominio]").html(PARAM_CONFIG[$scope.dominio_sel].desc);

            dt.fillDataT(conT.dataTableTarget, $scope.params_sel, PARAM_CONFIG[$scope.dominio_sel].columns_fields);
            funciones.cabeceraDominioDt();
                       

        },

        cabeceraDominioDt: () => {
            let htmlCabeceraDt = `<span><strong>${PARAM_CONFIG[$scope.dominio_sel].title} </strong>
                                    <span class="badge badge-hero bg-info dark" >${$scope.params_sel.length}</span> 
                                </span>`
            $("[__cabecera_dt]").html(htmlCabeceraDt); 
        },

        setFieldsModal: ($saveFields) => {
            let htmlFields = `<input class="hidden" name="id" id="id" __field="id">
                              <input class="hidden" name="dominio" id="dominio" __field="dominio"> 
                              <input class="hidden" name="id_padre" id="id_padre" __field="id_padre">`;

            $saveFields.forEach(function(field){
                if(field.field =='nombre'){
                    htmlFields += `<div class="section">
                                        <label class="field-label" for="${field.field}">${field.title}</label>
                                        <label for="${field.field}" class="field prepend-icon">
                                            <input type="text"  class="gui-input" id="${field.field}" __field="${field.field}" name="${field.field}" placeholder="${field.placeholder}">
                                            <label for="${field.field}" class="field-icon"><i class="glyphicons glyphicons-riflescope"></i>
                                            </label>
                                        </label>
                                    </div>` 
                }

                if(field.field =='orden'){
                    htmlFields += `<div class="section">
                                        <label class="field-label" for="${field.field}">${field.title}</label>
                                        <label for="${field.field}" class="field prepend-icon">
                                            <input type="number"  class="gui-input w200" id="${field.field}" __field="${field.field}" name="${field.field}" placeholder="${field.placeholder}">
                                            <label for="${field.field}" class="field-icon"><i class="fa fa-list-ol"></i>
                                            </label>
                                        </label>
                                    </div>` 
                }

                if(field.field =='valor'){
                    htmlFields += `<div class="section">
                                        <label class="field-label" for="${field.field}">${field.title}</label>
                                        <label for="${field.field}" class="field prepend-icon">
                                            <input type="number"  class="gui-input w200" id="${field.field}" __field="${field.field}" name="${field.field}" placeholder="${field.placeholder}">
                                            <label for="${field.field}" class="field-icon"><i class="fa fa-chart-bar"></i>
                                            </label>
                                        </label>
                                    </div>` 
                }

                if(field.field =='activo'){
                    htmlFields += `<div class="section row m10 ml20 ">
                                        <label class="switch switch-sm block mt5 switch-success switch-round ">
                                            <span><strong>${field.title}</strong></span>
                                            <input type="checkbox" name="${field.field}" id="${field.field}" __field="${field.field}" value="">
                                            <label class="fs11" for="${field.field}" data-on="SI" data-off="NO"></label>
                                        </label>
                                    </div>` 
                }
            })
            $("[__content_fields]").html(htmlFields);
        },

        setPadreSel: rowPadreSel => {
            let childs = [];
            let dominioChild = PARAM_CONFIG[rowPadreSel.dominio].childs;
            if(PARAM_CONFIG[rowPadreSel.dominio].childs){
                $("[__accionCh='nuevo']").css('display', PARAM_CONFIG[dominioChild].new       ? 'inline' :'none') 
                $("[__accionCh='editar']").css('display', PARAM_CONFIG[dominioChild].update   ? 'inline' :'none') 
                $("[__accionCh='eliminar']").css('display', PARAM_CONFIG[dominioChild].delete ? 'inline' :'none') 

                childs = _.filter($scope.parametros, function(val){
                    return val.dominio == PARAM_CONFIG[rowPadreSel.dominio].childs && val.id_padre == rowPadreSel.id;
                });
                console.log(childs)
                dt.fillDataT(chiT.dataTableTarget, childs, PARAM_CONFIG[dominioChild].columns_fields, true);
                $("[__contentChilds]").removeClass('hidden');
            }
            else{
                funciones.ocultarPanelChildrens();
            } 

        },

        ocultarPanelChildrens: function(){
            $("[__contentChilds]").addClass('hidden');
            childs = [];  
            dt.fillDataT(chiT.dataTableTarget, childs, []);
        }


    }



    

    //-------------------- Listeners  --------------------------------
    
  	let listen = ()=>{

        /* Al seleccionar un Dominio , ON  CHANGE*/
        $(conT.contenedor).on('change','[__dominios]', function(){
            let dominioSeleccionado = $(this).val();
            funciones.setDominioSel(dominioSeleccionado);
            funciones.ocultarPanelChildrens();
        });

        /* Al hacer click  en los botones nuevo, editar, eliminar */
	    $(conT.contenedor).on('click',  '[__accion]' , function(e){
	    	var elem = e.currentTarget;
	    	conT[ $(elem).attr('__accion') ](); /* equivale a conT.nuevo*/
	    });

        /* Al hacer click  en los botones nuevo, editar, eliminar del Children */
        $(chiT.contenedor).on('click',  '[__accionCh]' , function(e){
            var elem = e.currentTarget;
            chiT[ $(elem).attr('__accionCh') ](); /* equivale a chiT.nuevo*/
        });

        /* Al hacer click en padres , para que se cargue childrens*/
        $(conT.dataTableTarget).on('rowSelect', function (event){
            let row = event.args.row;
            funciones.setPadreSel(row);            
        });

        /* Cancel Modal */
	    $(".cont_cancelar").click(function(){
	        $.magnificPopup.close();
	    });


    }


	/*------------------------------  INIT ---------------------------------*/
    
    let init = () => {

    	$("#form_cont").validate(conT.creaReglasValidacion());

        /* Carga lista de parametros y carga el combo de dominios, se tiene que enviar una funcion como callback que se ejecuta en $fn() ddentro del response*/
        conT.cargarDatos( function(){
            funciones.cargarDominios()
        });

    }
    
    listen();
    init();

    

    

})

	
	

</script>

@endpush
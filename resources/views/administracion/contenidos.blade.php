@extends('layouts.principal_tpl')
@section('content')


<div class="container bg-white" id="miContenedor"> 

	<div style="width: 800px; height: 100%; margin-left: auto; margin-right: auto;"> <!-- Centrador --> 
		<h2>Creación de Contenidos</h2>

		<div id="UsuariosGrid">
		</div>

		<div>
			<button id="btnPost">
				enviar post de preguntas 
			</button>	


		</div>

	</div> <!-- Centrador --> 

</div>


@endsection

@push('script-head')

<script type="text/javascript">
	$(function(){

		$("#btnPost").click(function(){
			console.log("PRESS");
			let url = 'http://localhost/www/laravel7/api/guardar-respuestas-preguntas-riesgo'
			let objEnvio ={
				id_empresa:'12345',
				respuestas:[
					{id_opcion:22, valor: 10},
					{id_opcion:23, valor: 25},
					{id_opcion:24, valor: 70},
					{id_opcion:26, valor: 20},
					{id_opcion:27, valor: 15},
					{id_opcion:28, valor: 50},
				]
			}

			$.post(url, objEnvio, function(res){                       

			});


		})


	})

	

</script>

@endpush
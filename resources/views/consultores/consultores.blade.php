@extends('layouts.dashboard')

@section('content')
	<script>
		$('document').ready(function(){
		   	$("#checkTodos").change(function () {
		      	$("input:checkbox").prop('checked', $(this).prop("checked"));
		  	});
		});

		function cargarReporte($accion){
			var check = $("input[type='checkbox']:checked").length;

			if (check == 0){
				document.getElementById("div_error").style.display = 'block';
				$('html,body').animate({
					scrollTop: $("#div_error").offset().top
				}, 1000);
			}else{
				document.getElementById("div_error").style.display = 'none';
				document.getElementById("tipo_reporte").value = $accion;
				var url = "http://universal-profits.com/agencemr/informe";
		        $.ajax({                        
		           type: "POST",                 
		           url: url,                     
		           data: $("#myForm").serialize(), 
		            complete: function (response) {
		            	$("#div_reporte").html(response.responseText);
		            	$('html,body').animate({
						    scrollTop: $("#div_reporte").offset().top
						}, 1500);
		            },
		            error: function (error) {
		                console.log(error);
		            }
		       });
			}
		}
	</script>
	
	<div class="row">
		@if (Session::has('msj'))
			<div class="col-md-2"></div>
	        <div class="alert alert-danger">
	            <strong>{{Session::get('msj')}}</strong>
	        </div>
	        <div class="col-md-2"></div>
	    @endif
	</div>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 alert alert-danger" id="div_error" style="display: none;">
			<center><h5><strong>¡Debe seleccionar al menos un consultor!</strong></h5></center>
		</div>
		<div class="col-md-2"></div>
	</div>

	<div class="row">
		<form method="POST" class="form-inline" id="myForm">
			{{ csrf_field() }}
			<input type="hidden" name="tipo_reporte" id="tipo_reporte">
			<div class="x_panel">
	        	<div class="x_title">
	        		<h2>Listado de Consultores</h2>
	        		<div class="clearfix"></div>
	        	</div>
				<div class="x_content">
					<div class="col-md-12 table-responsive">
						<table class="table table-striped jambo_table bulk_action">
							<thead>
								<tr class="headings">
									<th><input type="checkbox" id="checkTodos"/></th>
									<th class="column-title"><center>Identificador</center></th>
									<th class="column-title"><center>Consultor</center></th>
									<th class="column-title"><center>Correo Electrónico</center></th>
									<th class="column-title"><center>Teléfono</center></th>
									<th class="column-title"><center>Dirección</center></th>
								</tr>
							</thead>
							<tbody>
								@foreach($consultores as $consultor)
									<tr class="odd pointer">
										<td class="a-center "><input type="checkbox" name="seleccion[]" value="{{ $consultor->co_usuario }}"></td>
										<td class=" "><center>{{ $consultor->co_usuario }}</center></td>
										<td class=" "><center>{{ $consultor->no_usuario}}</center></td>
										<td class=" "><center>{{ $consultor->no_email }}</center></td>
										<td class=" "><center>{{ $consultor->nu_telefone }}</center></td>
										<td class=" "><center>{{ $consultor->ds_endereco }}</center></td>	
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					
					<div class="col-md-2"></div>
					<div class="col-md-8">
						<center>
							<strong>DESDE</strong><br>
							<div class="form-group">
		                    	<label for="ex3">Mes</label>
		                    	<select class="form-control" name="mes_inicial">
											<option value="01">Enero</option>
											<option value="02">Febrero</option>
											<option value="03">Marzo</option>
											<option value="04">Abril</option>
											<option value="05">Mayo</option>
											<option value="06">Junio</option>
											<option value="07">Julio</option>
											<option value="08">Agosto</option>
											<option value="09">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option>
								</select>
		                  	</div>
		                  	
		                  	<div class="form-group">
		                    	<label for="ex4">Año</label>
		                   		<select class="form-control" name="ano_inicial">
									@for ($i = 2019; $i >= 2000; $i--){
										<option value="{{ $i }}">{{ $i }}</option>
									@endfor
								</select>
		                  	</div>	
							
							<div class="ln_solid"></div>
							
							<strong>HASTA</strong><br>
							<div class="form-group">
		                    	<label for="ex3">Mes</label>
		                    	<select class="form-control" name="mes_final">
											<option value="01">Enero</option>
											<option value="02">Febrero</option>
											<option value="03">Marzo</option>
											<option value="04">Abril</option>
											<option value="05">Mayo</option>
											<option value="06">Junio</option>
											<option value="07">Julio</option>
											<option value="08">Agosto</option>
											<option value="09">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option>
								</select>
		                  	</div>
		                  	
		                  	<div class="form-group">
		                    	<label for="ex4">Año</label>
		                   		<select class="form-control" name="ano_final">
									@for ($i = 2019; $i >= 2000; $i--){
										<option value="{{ $i }}">{{ $i }}</option>
									@endfor
								</select>
		                  	</div>	

		                  	<div class="ln_solid"></div>
		                  	
		                  	<div class="form-group">
	                  			<a href="#div_reporte" onclick="cargarReporte('Informe');" class="btn btn-info">Relatório</a>
	                  			<a href="#div_reporte" onclick="cargarReporte('Grafico');" class="btn btn-success">Gráfico</a>
	                  			<a href="#div_reporte" onclick="cargarReporte('Pizza');" class="btn btn-primary">Pizza</a>
	                  		</div>	
		                </center>
					</div>
					<div class="col-md-2"></div>
				</div>
			</div>
		</form> 
	</div>

	<div class="row" id="div_reporte"></div>
@endsection
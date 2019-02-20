<?php $__env->startSection('content'); ?>
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
				var url = "http://localhost:8000/informe";
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
		<div class="col-md-2"></div>
		<div class="col-md-8 alert alert-danger" id="div_error" style="display: none;">
			<center><h5><strong>¡Debe seleccionar al menos un consultor!</strong></h5></center>
		</div>
		<div class="col-md-2"></div>
	</div>

	<div class="row">
		<form method="POST" class="form-inline" id="myForm">
			<?php echo e(csrf_field()); ?>

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
								<?php $__currentLoopData = $consultores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr class="odd pointer">
										<td class="a-center "><input type="checkbox" name="seleccion[]" value="<?php echo e($consultor->co_usuario); ?>"></td>
										<td class=" "><center><?php echo e($consultor->co_usuario); ?></center></td>
										<td class=" "><center><?php echo e($consultor->no_usuario); ?></center></td>
										<td class=" "><center><?php echo e($consultor->no_email); ?></center></td>
										<td class=" "><center><?php echo e($consultor->nu_telefone); ?></center></td>
										<td class=" "><center><?php echo e($consultor->ds_endereco); ?></center></td>	
									</tr>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</tbody>
						</table>
					</div>
					
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<center>
							<div class="form-group">
		                    	<label for="ex3">Mes</label>
		                    	<select class="form-control" name="mes">
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
		                   		<select class="form-control" name="ano">
											<?php for($i = 2019; $i >= 2000; $i--): ?>{
												<option value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
											<?php endfor; ?>
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
					<div class="col-md-3"></div>
				</div>
			</div>
		</form> 
	</div>

	<div class="row" id="div_reporte"></div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
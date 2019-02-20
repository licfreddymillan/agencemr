<div class="x_panel">
	<div class="x_title">
	    <h2>Desempeño de Consultores</h2>
	    <div class="clearfix"></div>
	</div>
	<div class="x_content">
		<div id="finances-div"></div>

	    <?php
	    	if ($cont > 0){
	    		echo Lava::render('ComboChart', 'Desempeño', 'finances-div');
	    	}
		?> 

		<div class="alert alert-info">
			<center><h5><strong>Los consultores <?php $__currentLoopData = $consultoresSinFacturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <strong><?php echo e($cons); ?></strong>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> no poseen ninguna factura en el período seleccionado.</strong></h5></center>
		</div>
	</div>
</div>
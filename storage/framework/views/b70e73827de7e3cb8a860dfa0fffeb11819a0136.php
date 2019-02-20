<div class="x_panel">
	<div class="x_title">
	    <h2>Informe de Consultores</h2>
	    <div class="clearfix"></div>
	</div>
	<div class="x_content">
		<?php $__currentLoopData = $consultores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th colspan="4"><?php echo e($consultor[0]); ?></th>
				</thead>
				<tbody>
					<tr>
						<td width="15%">Receita Líquida</td>
						<td width="15%">Custo Fixo</td>
						<td width="15%">Comissão</td>
						<td width="15%">Lucro</td>
					</tr>
					<tr>
						<td>R$ <?php echo e($consultor[1]); ?></td>
						<td>R$ <?php echo e($consultor[2]); ?></td>
						<td>R$ <?php echo e($consultor[3]); ?></td>
						<td <?php if($consultor[4] < 0): ?> style="color:#FF0000;" <?php endif; ?>>R$ <?php echo e($consultor[4]); ?></td>
					</tr>
				</tbody>
			</table>	
			<hr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		<div class="alert alert-info">
			<center><h5><strong>Los consultores <?php $__currentLoopData = $consultoresSinFacturas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <strong><?php echo e($cons); ?></strong>, <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> no poseen ninguna factura en el período seleccionado.</strong></h5></center>
		</div>
	</div>
</div>
<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
	<form action="<?php echo e(route('report')); ?>" method="POST">
		<?php echo e(csrf_field()); ?>

		<div class="col-md-12">
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th></th>
					<th>Identificador</th>
					<th>Consultor</th>
					<th>Correo Electrónico</th>
					<th>Teléfono</th>
					<th>Dirección</th>
				</thead>
				<tbody>
					<?php $__currentLoopData = $consultores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consultor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td><input type="checkbox" name="seleccion[]" value="<?php echo e($consultor->co_usuario); ?>"></td>
							<td><?php echo e($consultor->co_usuario); ?></td>
							<td><?php echo e($consultor->no_usuario); ?></td>
							<td><?php echo e($consultor->no_email); ?></td>
							<td><?php echo e($consultor->nu_telefone); ?></td>
							<td><?php echo e($consultor->ds_endereco); ?></td>	
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tbody>
			</table>
		</div>

		<div class="col-md-12">
			<center><input type="submit" class="btn btn-primary" value="Relatório"></center>	
		</div>
	</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
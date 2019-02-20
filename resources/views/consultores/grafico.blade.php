<div class="x_panel">
	<div class="x_title">
	    <h2>Desempeño de Consultores</h2>
	    <div class="clearfix"></div>
	</div>
	<div class="x_content">
		<div id="finances-div"></div>

	    @php
	    	if ($cont > 0){
	    		echo Lava::render('ComboChart', 'Desempeño', 'finances-div');
	    	}
		@endphp 

		<div class="alert alert-info">
			<center><h5><strong>Los consultores @foreach ($consultoresSinFacturas as $cons) <strong>{{ $cons }}</strong>, @endforeach no poseen ninguna factura en el período seleccionado.</strong></h5></center>
		</div>
	</div>
</div>
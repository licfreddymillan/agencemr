<div class="x_panel">
	<div class="x_title">
	    <h2>Informe de Consultores</h2>
	    <div class="clearfix"></div>
	</div>
	<div class="x_content">
		@foreach ($consultores as $consultor)
			<table class="table table-bordered table-hover table-striped">
				<thead>
					<th colspan="4">{{ $consultor[0] }}</th>
				</thead>
				<tbody>
					<tr>
						<td width="15%">Receita Líquida</td>
						<td width="15%">Custo Fixo</td>
						<td width="15%">Comissão</td>
						<td width="15%">Lucro</td>
					</tr>
					<tr>
						<td>R$ {{ $consultor[1] }}</td>
						<td>R$ {{ $consultor[2] }}</td>
						<td>R$ {{ $consultor[3] }}</td>
						<td @if ($consultor[4] < 0) style="color:#FF0000;" @endif>R$ {{ $consultor[4] }}</td>
					</tr>
				</tbody>
			</table>	
			<hr>
		@endforeach

		<div class="alert alert-info">
			<center><h5><strong>Los consultores @foreach ($consultoresSinFacturas as $cons) <strong>{{ $cons }}</strong>, @endforeach no poseen ninguna factura en el período seleccionado.</strong></h5></center>
		</div>
	</div>
</div>
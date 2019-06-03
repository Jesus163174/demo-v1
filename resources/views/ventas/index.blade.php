@extends('layouts.dashboard')
@section('title','Inventario general')
@section('content')
<div class="row top_tiles">
	<!--ANALISIS DE DATOS: TOTAL,GANANCIAS Y INVERSIONES-->
	@include('ventas.analitycs')
	
	<!--FORMULARIO PARA EL FILTRO DE DATOS: NEGOCIO,VENDEDOR,ENTRE FECHAS Y POR ESTATUS(PAGADO,CANCELADO)-->
	@include('ventas.filter')

	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">

				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">GRAFICA DE VENTAS DE LA ULTIMA SEMANA</h4>
				</div>
				<div class="modal-body">
					<canvas id="speedChart" height="auto"></canvas>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="button" class="btn btn-primary">Descargar</button>
				</div>

			</div>
		</div>
	</div>

</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Ventas</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content  table-responsive">
				<!--TABLA CON LOS DATOS DE LAS VENTAS-->
				@include('ventas.data')
			</div>
		</div>
	</div>
</div>
@stop
@section('js')
<script>
	var speedCanvas = document.getElementById("speedChart");

	Chart.defaults.global.defaultFontFamily = "Lato";
	Chart.defaults.global.defaultFontSize = 18;

	var speedData = {
		labels: [
			@foreach($sales_char as $sale)
				"{{$sale->fechas}}({{$sale->numero_ventas}})",
			@endforeach
		],
		datasets: [{
			label: "Ventas generales",
			data: [
				@foreach($sales_char as $sale)
					{{$sale->totales}},
				@endforeach
			],
			lineTension: 0,
			fill: false,
			borderColor: '#169F85',
			backgroundColor: 'transparent',
			borderDash: [5, 5],
			pointBorderColor: '#169F85',
			pointBackgroundColor: '#169F85',
			pointRadius: 5,
			pointHoverRadius: 10,
			pointHitRadius: 30,
			pointBorderWidth: 2,
			pointStyle: 'rectRounded'
		}]
	};

	var chartOptions = {
		legend: {
			display: true,
			position: 'top',
			labels: {
				boxWidth: 80,
				fontColor: '#169F85'
			}
		}
	};

	var lineChart = new Chart(speedCanvas, {
		type: 'line',
		data: speedData,
		options: chartOptions
	});
</script>
@stop
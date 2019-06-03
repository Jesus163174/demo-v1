@extends('layouts.dashboard')
@section('title','Inicio')
@section('content')
<div class="row top_tiles">
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-user"></i></div>
			<div class="count">{{$count['users']}}</div>
			<h3>Empleados</h3>
			<a href="{{asset('usuarios/create')}}" class="btn btn-success btn-sm m-lft m-tp">Agregar nuevo</a>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-shopping-basket "></i></div>
			<div class="count">{{$count['products']}}</div>
			<h3>Productos</h3>
			<a href="{{asset('productos/create')}}" class="btn btn-success btn-sm m-lft m-tp">Agregar nuevo</a>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-bookmark-o "></i></div>
			<div class="count">{{$count['categories']}}</div>
			<h3>Categorias</h3>
			<a href="{{asset('categorias/create')}}" class="btn btn-success btn-sm m-lft m-tp">Agregar nuevo</a>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-home"></i></div>
			<div class="count">{{$count['bussines']}}</div>
			<h3>Sucursales</h3>
			<a href="{{asset('sucursales/create')}}" class="btn btn-success btn-sm m-lft m-tp">Agregar nuevo</a>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-bookmark-o "></i></div>
			<div class="count">{{$count['brands']}}</div>
			<h3>Marcas</h3>
			<a href="{{asset('marcas/create')}}" class="btn btn-success btn-sm m-lft m-tp">Agregar nuevo</a>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-user "></i></div>
			<div class="count">{{$count['providers']}}</div>
			<h3>Proveedores</h3>
			<a href="{{asset('proveedores/create')}}" class="btn btn-success btn-sm m-lft m-tp">Agregar nuevo</a>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-user "></i></div>
			<div class="count">{{$count['customers']}}</div>
			<h3>Clientes</h3>
			<a href="{{asset('clientes/create')}}" class="btn btn-success btn-sm m-lft m-tp">Agregar nuevo</a>
		</div>
	</div>
	<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
		<div class="tile-stats">
			<div class="icon"><i class="fa fa-money"></i></div>
			<div class="count">{{$count['sales']->ventas}}</div>
			<h3>Ventas</h3>
			<a href="{{asset('/vender')}}" class="btn btn-success btn-sm m-lft m-tp">vender</a>
		</div>
	</div>
</div>
<!-- /top tiles -->
<div class="row">
	<div class="col-md-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Ventas de la ultima semana <small>Progreso diario</small></h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="demo-container">
						

						<canvas id="speedChart" height="auto"></canvas>


					</div>
					
				</div>
			
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
			@foreach($sales as $sale)
				"{{$sale->fechas}}({{$sale->numero_ventas}})",
			@endforeach
		],
		datasets: [{
			label: "Ventas generales",
			data: [
				@foreach($sales as $sale)
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
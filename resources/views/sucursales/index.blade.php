@extends('layouts.dashboard')
@section('title','Inventario general')
@section('content')
<div class="row">
	<div class="col-md-12">
		@if (session('status_success'))
		<div class="alert alert-success">
			{!! session('status_success') !!}
		</div>
		@endif
	</div>
</div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Sucursales</h2>
				<ul class="nav navbar-right panel_toolbox">
					<a href="{{asset('sucursales/create')}}" class="btn btn-success btn-sm">Agregar sucursal</a>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				@include('sucursales.data')
			</div>
		</div>
	</div>
</div>
@stop
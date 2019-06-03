@extends('layouts.dashboard')
@section('title','Inventario general')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				Agregar sucursal
			</div>
			<div class="panel-body">
				@include('sucursales.form',['button'=>'Agregar sucursal','atr'=>0,'url'=>'sucursales/'])
			</div>
		</div>
	</div>
</div>

@stop
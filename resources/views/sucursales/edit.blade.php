@extends('layouts.dashboard')
@section('title','Inventario general')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="title">Editar Sucursal</h3>
			</div>
			<div class="panel-body">
				@include('sucursales.form',['button'=>'Actualizar sucursal','atr'=>1,'url'=>'sucursales/'.$busine->id])
			</div>
		</div>
	</div>
</div>

@stop
@extends('layouts.dashboard')
@section('title','Inventario general')
@section('content')
	<form action="{{asset('proveedores')}}" method="post">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="title">Nuevo proveedor</h3>
					</div>
					<div class="panel-body">
						@include('proveedores.form',['btn'=>'Agregar nuevo'])
					</div>
				</div>
			</div>
		</div>
	</form>
@stop
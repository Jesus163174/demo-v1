@extends('layouts.dashboard')
@section('title','Inventario general')
@section('content')
	<form action="{{asset('proveedores/'.$provider->id)}}" method="post">
		@csrf
		{{method_field('put')}}
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="title">Actualizar proveedor</h3>
					</div>
					<div class="panel-body">
						@include('proveedores.form',['btn'=>'Actualizar'])
					</div>
				</div>
			</div>
		</div>
	</form>
@stop
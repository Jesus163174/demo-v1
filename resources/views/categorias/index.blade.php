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
				<h2>Categorias</h2>
				<ul class="nav navbar-right panel_toolbox">
					<a href="{{asset('categorias/create')}}" class="btn btn-success btn-sm">Agregar categoria</a>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<table id="datatable-buttons" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>Nombre</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
						<tr>
							<td>{{$category->nombre}}</td>
							<td>
								<a class="btn btn-primary btn-sm" href="{{asset('categorias/'.$category->id.'/edit')}}">Editar</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@stop
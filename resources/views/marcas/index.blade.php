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
    <div class="col-md-12">
        @if (session('status_warning'))
        <div class="alert alert-warning">
            {!! session('status_warning') !!}
        </div>
        @endif
    </div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading d-flex">
				<h3 class="title">Listado de marcas</h3>
				<a href="{{asset('marcas/create')}}" class="btn btn-success d-flex">Agregar marca</a>
			</div>
			<div class="panel-body">
				@include('marcas.data')
			</div>
		</div>
	</div>
</div>
@stop
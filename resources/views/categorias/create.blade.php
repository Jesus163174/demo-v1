@extends('layouts.dashboard')
@section('title','Agregar categorias')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="title">{{$button}}</h3>
			</div>
			<div class="panel-body">
				@include('categorias.form',['url'=>$url])
			</div>
		</div>
	</div>
</div>

@stop
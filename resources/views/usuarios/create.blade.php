@extends('layouts.dashboard')
@section('title','Agregar empleados')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="title">Agregar un nuevo empleado</h3>
			</div>
			<div class="panel-body">
				<form action="{{asset('usuarios')}}" method="post">
					@csrf
					<div class="form-group">
						<label for="">Nombre: </label>
						<input type="text" class="form-control" required="" name="name">
					</div>
					<div class="form-group">
						<label for="">Correo electronico: </label>
						<input type="email" class="form-control" required="" name="email">
					</div> 
					<div class="form-group">
						<label for="">Contraseña: </label>
						<input type="password" class="form-control" required="" name="password">
					</div>
					<div class="form-group">
						<label for="">Numero celular: </label>
						<input type="number" class="form-control" required="" name="celular">
					</div> 
					<div class="form-group">
						<label for="">Rol del usuario: </label>
						<select name="rol" class="form-control" id="">
							<option value="" selected="">Selecciona un rol</option>
							<option value="administrador">1.Administrador</option>
							<option value="vendedor">2.Vendedor</option>
						</select>
					</div> 
					<div class="form-group">
						<label for="">Sucursal del usuario: </label>
						<select name="bussine_id" class="form-control" id="">
							<option value="" selected="">Selecciona una sucursal</option>
							@foreach($bussines as $bussine)
								<option value="{{$bussine->id}}">{{$bussine->id}}.{{$bussine->nombre}}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label for="">Comisión de ventas: </label>
						<input type="number" class="form-control" required="" name="comision">
					</div> 
					<button type="submit" class="btn btn-success">Agregar empleado</button>
				</form>
			</div>
		</div>
	</div>
</div>

@stop
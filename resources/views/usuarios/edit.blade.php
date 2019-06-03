@extends('layouts.dashboard')
@section('title','Agregar empleados')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="title">Editar empleado</h3>
			</div>
			<div class="panel-body">
				<form action="{{asset('usuarios/'.$user->id)}}" method="post">
					@csrf
					{{method_field('put')}}
					<div class="form-group">
						<label for="">Nombre: </label>
						<input type="text" value="{{$user->name}}" class="form-control" required="" name="name">
					</div>
					<div class="form-group">
						<label for="">Correo electronico: </label>
						<input type="email" class="form-control" value="{{$user->email}}" required="" name="email">
					</div> 
					<div class="form-group">
						<label for="">Actualizar contraseña: </label>
						<input type="password"  class="form-control"  name="password">
					</div>
					<div class="form-group">
						<label for="">Numero celular: </label>
						<input type="number" value="{{$user->celular}}" class="form-control" required="" name="celular">
					</div> 
					<div class="form-group">
						<label for="">Rol del usuario: </label>
						<select name="rol" class="form-control" id="">
							<option value="{{$user->rol}}" selected="">{{$user->rol}}</option>
							<option value="administrador">1.Administrador</option>
							<option value="vendedor">2.Vendedor</option>
						</select>
					</div> 
					<div class="form-group">
						<label for="">Sucursal del usuario: </label>
						<select name="bussine_id" class="form-control" id="">
							<option value="{{$bussine->id}}" selected="">{{$bussine->nombre}}</option>
							@foreach($bussines as $bussine)
								<option value="{{$bussine->id}}">{{$bussine->id}}.{{$bussine->nombre}}</option>
							@endforeach
						</select>
					</div> 
					<div class="form-group">
						<label for="">Comisión de ventas: </label>
						<input type="number" class="form-control" value="{{$user->comision}}" required="" name="comision">
					</div> 
					<button type="submit" class="btn btn-success">Agregar empleado</button>
				</form>
			</div>
		</div>
	</div>
</div>

@stop
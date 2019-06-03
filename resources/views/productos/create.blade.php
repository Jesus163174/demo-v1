@extends('layouts.dashboard')
@section('title','Agregar Producto')
@section('content')
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="title">Agrega un nuevo producto al sistema</h4>
		</div>
		<div class="panel-body">
			<form action="{{asset('productos')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Nombre del producto</label>
							<input type="text" required  class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" placeholder="Ingresa el nombre del producto" value="{{ old('nombre') }}">
							@if ($errors->has('nombre'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('nombre') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Codigo de barras</label>
							<input type="text" required class="form-control {{ $errors->has('codigo') ? ' is-invalid' : '' }}" name="codigo" placeholder="Ingresa el codigo de barras">
							@if ($errors->has('codigo'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('codigo') }}</strong>
								</span>
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Existencia en bodega</label>
							<input type="number" min="1" required class="form-control {{ $errors->has('existencia') ? ' is-invalid' : '' }}" name="existencia" placeholder="Ingresa la existencia del producto en inventario">
							@if ($errors->has('existencia'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('existencia') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Costo del producto.</label>
							<input type="number" step="any" min="1" required class="form-control {{ $errors->has('costo') ? ' is-invalid' : '' }}" name="costo" placeholder="Ingresa el costo del producto">
							@if ($errors->has('costo'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('costo') }}</strong>
								</span>
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Precio de venta del producto</label>
							<input type="number" min="1" required class="form-control {{ $errors->has('precio_Venta') ? ' is-invalid' : '' }}"  name="precio_Venta" placeholder="Ingresa el  precio de venta del producto.">
							@if ($errors->has('precio_Venta'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('precio_Venta') }}</strong>
								</span>
							@endif
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Sucursal</label>
							<select name="bussine_id" required  class="form-control {{ $errors->has('bussine_id') ? ' is-invalid' : '' }}"  >
								<option value="" selected="">Selecciona la sucursal del producto</option>
								@foreach($bussines as $bussine)
									<option value="{{$bussine->id}}">{{$bussine->nombre}}</option>
								@endforeach
							</select>
							@if ($errors->has('bussine_id'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('bussine_id') }}</strong>
								</span>
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Foto del producto</label>
							<input type="file"  class="form-control" name="foto" placeholder="Ingresa el  precio de venta del producto.">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Categoria del producto</label>
							<select name="categoria_id"  required class="form-control {{ $errors->has('category_id') ? ' is-invalid' : '' }}"  id="">
								<option value="" selected="">Selecciona la categoria del producto</option>
								@foreach($categories as $category)
									<option value="{{$category->id}}">{{$category->nombre}}</option>
								@endforeach
							</select>
							@if ($errors->has('category_id'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('category_id') }}</strong>
								</span>
							@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">IVA del producto</label>
							<input type="number" step="any" min="1" required class="form-control {{ $errors->has('iva') ? ' is-invalid' : '' }}" name="iva" placeholder="Ingresa el  IVA del producto.">
							@if ($errors->has('iva'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('iva') }}</strong>
								</span>
							@endif
						</div>
						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Clave de unidad del producto</label>
							<input type="text"  class="form-control {{ $errors->has('clave_unidad') ? ' is-invalid' : '' }}" name="clave_unidad" placeholder="Ingresa la clave de unidad del producto.">
							@if ($errors->has('clave_unidad'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('clave_unidad') }}</strong>
								</span>
							@endif
						</div>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Proveedor del producto</label> - 
							<a class="innerit" href="{{asset('proveedores/create')}}">Agregar proveedor</a>
							<select name="provider_id" id="" class="form-control">
								<option value="" selected="">Elige un proveedor</option>
								@foreach($providers as $provider)
									<option value="{{$provider->id}}">{{$provider->id}}.{{$provider->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Marca del producto</label> -
							<a href="{{asset('marcas/create')}}" class="innerit">Agregar marca</a>
							<select name="brand_id" id="" class="form-control">
								<option value="" selected="">Elige una marca</option>
								@foreach($brands as $brand)
									<option value="{{$brand->id}}">{{$brand->id}}.{{$brand->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Clave del producto</label>
							<input type="text"  required class="form-control {{ $errors->has('clave_producto') ? ' is-invalid' : '' }}" name="clave_producto" placeholder="Ingresa la clave  del producto.">
							@if ($errors->has('clave_producto'))
								<span class="invalid-feedback" role="alert">
									<strong>{{ $errors->first('clave_producto') }}</strong>
								</span>
							@endif
						</div>
						
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-success margin-top margen-izquierda">Agregar Producto</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@stop
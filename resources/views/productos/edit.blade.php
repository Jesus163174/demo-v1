@extends('layouts.dashboard')
@section('title','Detalle producto')
@section('content')
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detalle del producto y analisis de ventas</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="product-image">
                            <img style="box-shadow: 1px 3px 4px #000; border-radius: 1.3px;" src="{{asset('inventario/'.$product->foto)}}" height="400px" alt="..." />
                        </div> <br>
                        <form action="">
                            <a href="" class="btn btn-success"><span class="fa fa-photo"></span> Actualizar foto</a>
                        </form>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                    	<form action="{{asset('productos/'.$product->id)}}" method="post" class="">
                    		@csrf
                    		{{method_field('put')}}
                    		<div class="row">
                    			<div class="col-md-12 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">Producto</label>
                    					<input class="form-control" value="{{$product->nombre}}" required="" name="nombre" id="" cols="30" rows="5">
                    				</div>
                    			</div>
                    			<div class="col-md-6 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">Costo</label>
                    					<input type="text" required="" class="form-control" name="costo" value="{{$product->costo}}">
                    				</div>
                    			</div>
                    			<div class="col-md-6 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">Precio</label>
                    					<input type="text" required="" class="form-control" name="precio" value="{{$product->precio}}">
                    				</div>
                    			</div>
                    			<div class="col-md-12 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">Categorias</label>
                    					<select name="categoria_id" class="form-control" id="">
                    						<option required="" value="{{$product->categoria_id}}" selected="">{{$product->categoria}}</option>
                    						@foreach($categories as $category)
												<option value="{{$category->id}}">{{$category->nombre}}</option>
                    						@endforeach
                    					</select>
                    				</div>
                    			</div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Proveedores</label>
                                        <select name="provider_id" class="form-control" id="">
                                            <option required="" value="{{$product->proveedor_id}}" selected="">{{$product->proveedor}}</option>
                                            @foreach($providers as $provider)
                                                <option value="{{$provider->id}}">{{$provider->id}}.{{$provider->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label for="">Marcas</label>
                                        <select name="brand_id" class="form-control" id="">
                                            <option required="" value="{{$product->marca_id}}" selected="">{{$product->marca}}</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}">{{$brand->id}}.{{$brand->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                    			<div class="col-md-12 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">Sucursales</label>
                    					<select name="bussine_id" class="form-control" id="">
                    						<option required="" value="{{$product->bussine_id}}" selected="">{{$product->bussine}}</option>
                    						@foreach($bussines as $bussine)
												<option value="{{$bussine->id}}">{{$bussine->nombre}}</option>
                    						@endforeach
                    					</select>
                    				</div>
                    			</div>
                    			<div class="col-md-6 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">Existencia</label>
                    					<input type="text" required="" class="form-control" name="existencia" value="{{$product->stock}}">
                    				</div>
                    			</div>
                    			<div class="col-md-6 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">Codigo</label>
                    					<input type="text" required="" class="form-control" name="codigo" value="{{$product->codigo}}">
                    				</div>
                    			</div>
                    			<div class="col-md-6 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">Clave de unidad</label>
                    					<input type="text" required="" class="form-control" name="clave_unidad" value="{{$product->clave_unidad}}">
                    				</div>
                    			</div>
                    			<div class="col-md-6 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">Clave Producto</label>
                    					<input type="text" required="" class="form-control" name="clave_producto" value="{{$product->clave_producto}}">
                    				</div>
                    			</div>
                    			<div class="col-md-12 col-sm-12 col-xs-12">
                    				<div class="form-group">
                    					<label for="">IVA</label>
                    					<input type="text" required="" class="form-control" name="iva" value="{{$product->iva}}">
                    				</div>
                    			</div>
                    			<div class="col-md-12 col-sm-12 col-xs-12">
                    				<button type="submit" class="btn btn-success btn-sm">Actualizar</button>
                    			</div>
                    		</div>
                    	</form>
                    	@include('productos.baja')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop



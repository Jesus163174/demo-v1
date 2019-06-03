<div class="form-group">
	<label for="">Nombre/empresa del proveedor *</label>
	<input type="text" required="" value="{{$provider->nombre}}" class="form-control" name="nombre">
</div>
<div class="form-group">
	<label for="">Email del proveedor *</label>
	<input type="email" required="" value="{{$provider->email}}" class="form-control" name="email">
</div>
<div class="form-group">
	<label for="">Celular del proveedor</label>
	<input type="text" class="form-control"  value="{{$provider->celular}}" name="celular">
</div>
<div class="form-group">
	<button class="btn btn-success" type="submit">{{$btn}}</button>
</div>

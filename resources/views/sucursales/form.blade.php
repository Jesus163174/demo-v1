<form action="{{asset($url)}}" method="post">
	@if($atr == 1)
		{{method_field('put')}}
	@endif
	@csrf
	<div class="form-group">
		<label for="">Nombre de la sucursal: </label>
		<input type="text" required value="{{$busine->nombre}}" class="form-control" name="nombre">
		<br>
	</div>
	<div class="form-group">
		<label for="">Calle</label>
		<input type="text" name="calle" required value="{{$busine->calle}}" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<label for="">Colonia: </label>
		<input type="text" required name="colonia" value="{{$busine->colonia}}" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<label for="">Estado: </label>
		<input type="text" required value="{{$busine->estado}}" name="estado" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<label for="">Ciudad: </label>
		<input type="text" required value="{{$busine->ciudad}}" name="ciudad" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<label for="">Pais</label>
		<input type="text" required name="pais" value="{{$busine->pais}}" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<label for="">Numero interior: </label>
		<input type="text" required value="{{$busine->numero_interior}}" name="numero_interior" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<label for="">Numero Exterior: </label>
		<input type="text" required value="{{$busine->numero_exterior}}" name="numero_exterior" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<label for="">Caja</label>
		<input type="text" required name="caja" required="" value="{{$busine->caja}}" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<label for="">Tarjeta: </label>
		<input type="text" value="{{$busine->tarjeta}}" required="" name="tarjeta" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<label for="">Comision: </label>
		<input type="text" value="{{$busine->tarjeta}}" required="" name="comision_taller" class="form-control">
		<br>
	</div>
	<div class="form-group">
		<button class="btn btn-success">{{$button}}</button>
	</div>
</form>
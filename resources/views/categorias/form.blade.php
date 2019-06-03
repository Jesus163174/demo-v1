<form action="{{asset($url)}}" method="post">
	@csrf
	@if($button == "Actualizar categoria")
		{{method_field('put')}}
	@endif
	<div class="form-group">
		<label for="">Nombre: </label>
		<input type="text" value="{{$category->nombre}}" class="form-control" required="" name="nombre">
	</div>
	@include('categorias.button',['button'=>$button])
</form>
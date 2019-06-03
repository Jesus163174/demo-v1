<table id="datatable-buttons" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Caja</th>
			<th>Tarjeta</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($business as $busine)
		<tr>
			<td>{{$busine->nombre}}</td>
			<td>${{number_format($busine->caja,2,'.',',')}}</td>
			<td>{{$busine->tarjeta}}%</td>
			<td>
				<a href="{{asset('sucursales/'.$busine->id.'/edit')}}" class="btn btn-primary btn">Editar</a>
				<a href="{{asset('sucursales/'.$busine->id)}}" class="btn btn-info  btn-sm">Informacion</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
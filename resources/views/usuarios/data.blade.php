<table id="datatable-buttons"  style="width:100% !important;" class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Email</th>
			<th>Sucursal</th>
			<th>Estatus</th>
			<th>Rol</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $user)
			<tr>
				<td>{{$user->name}}</td>
				<td>{{$user->email}}</td>
				<td>{{$user->bussine}}</td>
				<td>{{$user->status}}</td>
				<td>
					{{$user->rol}}
				</td>
				<td>
					<a href="{{asset('usuarios/'.$user->id.'/edit')}}" class="btn btn-primary btn-sm">Editar</a>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
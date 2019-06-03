<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($providers as $provider)
        <tr>
            <td>{{$provider->nombre}}</td>
            <td>{{$provider->email}}</td>
            <td>{{$provider->celular}}</td>
            <td>
              <a href="{{asset('proveedores/'.$provider->id.'/edit')}}" class="btn btn-primary btn-sm">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
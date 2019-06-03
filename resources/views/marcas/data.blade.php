<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($brands as $brand)
        <tr>
            <td>{{$brand->nombre}}</td>
            <td>
              <a href="{{asset('marcas/'.$brand->id.'/edit')}}" class="btn btn-primary btn-sm">Editar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
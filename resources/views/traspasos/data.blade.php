<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Fecha</th>
            <th class="text-center">Usuario</th>
            <th class="text-center">Envia</th>
            <th class="text-center">Recibe</th>
            <th class="text-center">Estatus</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($traspasos as $traspaso)
            <tr>
                <td class="text-center">{{$traspaso->fecha}}</td>
                <td class="text-center">{{$traspaso->usuarioEnvia}}</td>
                <td class="text-center">{{$traspaso->envia}}</td>
                <td class="text-center">{{$traspaso->recibe}}</td>
                <td class="text-center">{{$traspaso->estatus}}</td>
                <td class="text-center">
                    <a href="{{asset('traspasos/'.$traspaso->id)}}" class="btn btn-success btn-sm"><span class="fa fa-share"></span></a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Fecha</th>
            <th class="text-center">Usuario</th>
            <th class="text-center">Envia</th>
            <th class="text-center">Recibe</th>
            <th class="text-center">Estatus</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="text-center">{{$traspaso->fecha}}</td>
            <td class="text-center">{{$traspaso->usuarioEnvia}}</td>
            <td class="text-center">{{$traspaso->suc_envia}}</td>
            <td class="text-center">{{$traspaso->suc_recibe}}</td>
            <td class="text-center">{{$traspaso->estatus}}</td>
        </tr>
    </tbody>
</table>
<h3>Productos del traspaso</h3>
<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Producto</th>
            <th class="text-center">Codigo</th>
            <th class="text-center">Costo</th>
            <th class="text-center">Precio</th>
            <th class="text-center">Cantidad</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productos as $producto)
        <tr>
            <td class="text-center">{{$producto->producto}}</td>
            <td class="text-center">{{$producto->codigo}}</td>
            <td class="text-center">${{number_format($producto->costo,2,'.',',')}}</td>
            <td class="text-center">${{number_format($producto->precio,2,'.',',')}}</td>
            <td class="text-center">{{$producto->cantidad}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
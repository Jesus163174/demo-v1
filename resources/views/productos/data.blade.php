<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Codigo</th>
            <th>Costo</th>
            <th>Precio</th>
            <th>Categorias</th>
            <th>Proveedor</th>
            <th>Marcas</th>
            <th>Sucursal</th>
            <th>Estatus</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>
                <a @if(Auth::user()->rol == 'administrador')href="{{asset('productos/'.$product->id)}}"@endif>
                    {{$product->nombre}}
                </a>
            </td>
            <td>{{$product->codigo}}</td>
            <td>${{number_format($product->costo,2,'.',',')}}</td>
            <td>${{number_format($product->precio,2,'.',',')}}</td>
            <td>{{$product->categoria}}</td>
            <td>{{$product->proveedor}}</td>
            <td>{{$product->marca}}</td>
            <td>{{$product->bussine}}</td>
            <td>
                <span class="badge {{$product->estatus}}">{{$product->estatus}}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
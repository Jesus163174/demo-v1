<table id="datatable-buttons" style="width:100% !important;" class="table table-striped table-bordered">
    <thead>
        <tr>
            <td class="text-center">Producto</td>
            <td class="text-center">Codigo</td>
            <td class="text-center">Precio</td>
            <td class="text-center">Stock</td>
            <td class="text-center">Cantidad</td>
            <td class="text-center">Acciones</td>
        </tr>
    </thead>
    <tbody>
        @foreach($productsBusiness as $product)
            <tr>
                <td class="text-center">{{$product->nombre}}</td>
                <td class="text-center">{{$product->codigo}}</td>
                <td class="text-center">${{number_format($product->precio,2,'.',',')}}</td>
                <td class="text-center">{{$product->stock}}</td>
                <form action="{{asset('agregar')}}" id="product_{{$product->id}}" method="post">
                    @csrf
                    <input type="hidden" name="productID" value="{{$product->id}}">
                    <td class="text-center">
                        <input type="number" @if($product->stock <= 0) disabled @endif min="1" name="cantidad" max="{{$product->stock}}" required class="form-control">
                    </td>
                    <td class="text-center">
                        @if($product->stock > 0)
                            <button type="submit" class="btn btn-success btn-sm">Agregar</button>
                        @else
                            <a href="#" class="btn btn-danger btn-sm">Cantidad insuficiente</a>
                        @endif
                    </td>
                </form>
            </tr>
        @endforeach
    </tbody>
</table>
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">Producto</th>
            <th class="text-center">Precio</th>
            <th class="text-center">Cantidad</th>
            <th class="text-center">Subtotal</th>
            <th class="text-center">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>
                <td class="text-center">{{$product->producto}}</td>
                <td class="text-center">${{number_format($product->price,2,'.',',')}}</td>
                <td class="text-center">{{$product->amount}}</td>
                <td class="text-center">${{number_format($product->subtotal,2,'.',',')}}</td>
                <td class="text-center">
                    <form action="{{asset('quitar')}}" method="post">
                        @csrf
                        <input type="hidden" name="productID" value="{{$product->id}}">
                        <button class="btn btn-danger btn-sm"><span class="fa fa-trash"></span></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
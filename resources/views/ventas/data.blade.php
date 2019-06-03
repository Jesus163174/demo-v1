<table id="datatable-buttons" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">FOLIO</th>
            <th class="text-center">Total</th>
            <th class="text-center">Sucursal</th>
            <th class="text-center">Vendedor</th>
            <th class="text-center">Estatus</th>
            <th class="text-center">Facturado</th>
            <th class="text-center">Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sales as $sale)
        <tr>
            <td class="text-center">
                <a href="{{asset('ventas/'.$sale->id)}}">
                    {{$sale->folio}}
                </a>
            </td>
            <td class="text-center">${{number_format($sale->total,2,'.',',')}}</td>
            <td class="text-center">{{$sale->bussine}}</td>
            <td class="text-center">{{$sale->seller}}</td>
            <td class="text-center">
                <span class="badge {{$sale->status}}">{{$sale->status}}</span>
            </td>
            <td class="text-center">
                @if($sale->factura == 0)
                    <span class="label label-danger">No faturado</span>
                @else
                    <span class="label label-success">Facturado</span>
                @endif
            </td>
            <td>{{$sale->fecha}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
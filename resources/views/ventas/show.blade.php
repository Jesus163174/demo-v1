@extends('layouts.dashboard') @section('title','Detalle de ventas') @section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="">
                <div class="row">
                    <div class="col-md-12">
                        <div class="x_panel">
                            
                            <div class="x_content" id="toPrint">

                                <section class="content invoice">
                                    <!-- title row -->
                                    <div class="row">
                                        <div class="col-xs-12 invoice-header">
                                            <h1>
                                                <i class="fa fa-money"></i> Detalle de la venta
                                                <small class="pull-right">Fecha: {{$sale->fecha}}</small>
                                            </h1>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- info row -->
                                    <div class="row invoice-info">
                                        <div class="col-sm-4 invoice-col">
                                            
                                            <address>
                                                <strong>Vendedor: {{$sale->vendedor}}</strong><br>
                                                <strong>Sucursal: {{$sale->sucursal}}</strong><br>
                                                <strong>Folio: {{$sale->folio}}</strong><br>
                                                <strong>Tipo de pago: {{$sale->tipoPago}} </strong> <br>
                                                <strong>Orden: {{$sale->orden}}</strong> <br>
                                                <strong>
                                                    @if($sale->factura == 1)
                                                        <span class="label label-success">facturado</span>
                                                    @else
                                                        <span class="label label-danger">No facturado</span>
                                                    @endif
                                                </strong>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <address>
                                                <strong>cliente: {{$sale->cliente_nombre}} {{$sale->cliente_apellido}}</strong> <br>
                                                <strong>email: {{$sale->cliente_email}}</strong> <br>
                                                <strong>Telefono: {{$sale->cliente_telefono}}</strong> <br>
                                                <strong>RFC: {{$sale->cliente_rfc}}</strong>
                                            </address>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 invoice-col">
                                            <strong>Total: ${{number_format($totals->total_ventas,2,'.',',')}}</strong> <br>
                                            <strong>Inversion: ${{number_format($totals->inversion,2,'.',',')}}</strong> <br>
                                            <strong>Ganancia: ${{number_format($totals->ganancias,2,'.',',')}}</strong> <br>
                                            <span class="label {{$sale->estatus}}">{{$sale->estatus}}</span>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 table">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">Producto</th>
                                                        <th class="text-center">Codigo de barras</th>
                                                        <th class="text-center">Cantidad</th>
                                                        <th class="text-center">Precio</th>
                                                        <th class="text-center">Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($products as $product)
                                                    <tr>
                                                        <td class="text-center">
                                                            <a href="{{asset('productos/'.$product->id)}}">{{$product->producto}}</a>
                                                        </td>
                                                        <td class="text-center">{{$product->codigo}}</td>
                                                        <td class="text-center">{{$product->amount}}</td>
                                                        <td class="text-center">${{number_format($product->price,2,'.',',')}}</td>
                                                        <td class="text-center">${{number_format($product->subtotal,2,'.',',')}}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <!-- accepted payments column -->
                                        <div class="col-xs-6">
                                            <p class="lead">Facturación: </p>
                                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                            </p>
                                            <a href="" class="btn btn-success">Facturar</a>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-xs-6">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width:50%">Subtotal:</th>
                                                            <td>${{number_format($subtotal,2,'.',',')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Descuento({{$sale->pdescuento}}%)</th>
                                                            <td>${{number_format($sale->descuento,2,'.',',')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Pago con tarjeta(5%):</th>
                                                            <td>${{number_format($sale->extraPagoTarjeta,2,'.',',')}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th class="total font-size-bg font-bold">Total:</th>
                                                            <td class="total font-size-bg font-bold">${{number_format($sale->total,2,'.',',')}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->

                                    <!-- this row will not appear when printing -->
                                    <div class="row no-print">
                                        <div class="col-xs-12">
                                            <button class="btn btn-danger" onclick="window.print();">
                                                <i class="fa fa-trash"></i> Cancelar venta
                                            </button>
                                            <a href="{{asset('ticket/'.$sale->folio)}}" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Reimprimir Ticket</a>
                                            <button id="print" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generar PDF</button>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script>
		$('#print').on('click',function(){
 			var url_base64jp = document.getElementById("toPrint");
            console.dir(url_base64jp);
            $('#print').attr('href',url_base64jp)
		});
	</script>
@stop
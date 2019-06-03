<form action="{{asset('configuracion')}}" method="post">
    @csrf
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Configuración de la venta</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Descuento: </label>
                    <input type="text" value="{{$pdescuento}}" required name="descuento" class="form-control" placeholder="Ingresa el descuento que necesitas agregar">
                </div>
                <div class="form-group">
                    <label for="">Activar pago con tarjeta</label>
                    @if($tarjeta == 0)
                        <input type="checkbox" name="tarjeta" >
                    @else
                        <input type="checkbox" name="tarjeta" checked>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Guardar cambios</button>
            </div>
            </div>
        </div>
    </div>
</form>
<form action="{{asset('terminar')}}" id="form" method="post">
    @csrf
    <div class="panel-body">
        <div class="row">
            <div class="form-group">
                <select required name="clienteID" class="form-control" id="">
                    <option value="" selected>Selecciona un cliente</option>
                    @foreach($clientes as $cliente)
                        <option value="{{$cliente->id}}">{{$cliente->id}}.{{$cliente->nombre}} {{$cliente->apellido}}</option>
                    @endforeach
                </select>
            </div> <hr>
            <div class="col-md-8 font-size-md mg-btm-md">
                Subtotal: 
            </div>
            <div class="col-md-4 font-size-md mg-btm-md">
                ${{number_format($subtotal,2,'.',',')}}
            </div>
            <div class="col-md-8 font-size-md mg-btm-md">
                Descuento({{$pdescuento}}%)
            </div>
            <div class="col-md-4 font-size-md mg-btm-md">
                ${{number_format($descuento,2,'.',',')}}
            </div>
            <div class="col-md-8 font-size-md mg-btm-md">
                Pago tarjeta ({{$ptarjeta}}%)
            </div>
            <div class="col-md-4 font-size-md mg-btm-md">
                ${{number_format($tarjeta,2,'.',',')}}
            </div>
            <div class="col-md-8 total font-bold font-size-bg mg-btm-md">
                Total
            </div>
            <div class="col-md-4 font-size-bg total mg-btm-md">
                ${{number_format($total,2,'.',',')}}
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <button type="submit" id="sendForm" @if($subtotal == 0) disabled @endif class="btn btn-success btn-sm form-control font-size-lg font-bold">Procesar venta</button>
    </div>
</form>
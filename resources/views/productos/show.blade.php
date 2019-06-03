@extends('layouts.dashboard')
@section('title','Detalle producto')
@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('status_success'))
        <div class="alert alert-success">
            {!! session('status_success') !!}
        </div>
        @endif
    </div>
</div>
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Detalle del producto</h3>
        </div>
        <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Detalle del producto y analisis de ventas</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="product-image">
                            <img style="box-shadow: 1px 3px 4px #000; border-radius: 1.3px;" src="{{asset('inventario/'.$product->foto)}}" height="400px;" alt="..." />
                        </div> <br>
                        <form action="">
                            <a href="" class="btn btn-success"><span class="fa fa-photo"></span> Actualizar foto</a>
                        </form>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12" style="border:0px solid #e5e5e5;">
                        <h3 class="prod_title">{{$product->nombre}}</h3>
                        <span class="label {{$product->estatus}}">{{$product->estatus}}</span>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <h2>Categoria</h2>
                                    <ul class="list-inline prod_size">
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs">{{$product->categoria}}</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h2>Proveedor</h2>
                                    <ul class="list-inline prod_size">
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs">{{$product->proveedor}}</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h2>Marca</h2>
                                    <ul class="list-inline prod_size">
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs">{{$product->marca}}</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h2>Sucursal</h2>
                                    <ul class="list-inline prod_size">
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs">{{$product->bussine}}</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h2>Existencia</h2>
                                    <ul class="list-inline prod_size">
                                        <li>
                                            <button type="button" class="btn @if($product->stock <=5) btn-danger @else btn-success @endif btn-xs">{{$product->stock}}</button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="">
                                    <h2>Costo</h2>
                                    <ul class="list-inline prod_size">
                                        <li>
                                            <button type="button" class="btn btn-default btn-xs">
                                                ${{number_format($product->costo,2,'.',',')}}
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="">
                                    <h2>Precio</h2>
                                    <ul class="list-inline prod_size">
                                        <li>
                                           <button type="button" class="btn btn-default btn-xs">
                                            ${{number_format($product->precio,2,'.',',')}}
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="">
                                <h2>Clave producto</h2>
                                <ul class="list-inline prod_size">
                                    <li>
                                        <button type="button" class="btn btn-default btn-xs">
                                         {{$product->clave_producto}}
                                     </button>
                                 </li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="row">
                    <div class="col-md-4">
                        <div class="">
                            <h2>Clave unidad</h2>
                            <ul class="list-inline prod_size">
                                <li>
                                    <button type="button" class="btn btn-default btn-xs">
                                        {{$product->clave_unidad}}
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="">
                            <h2>Codigo barras</h2>
                            <ul class="list-inline prod_size">
                                <li>
                                   <button type="button" class="btn btn-default btn-xs">
                                    {{$product->codigo}}
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="">
                        <h2>Fecha creación</h2>
                        <ul class="list-inline prod_size">
                            <li>
                                <button type="button" class="btn btn-default btn-xs">
                                 {{$product->fecha}}
                             </button>
                         </li>
                     </ul>
                 </div>
             </div>
         </div>
         <div class="d-flex">
            <a href="{{asset('productos/'.$product->id.'/edit')}}" class="btn btn-primary btn-sm">Editar</a>
            @if($product->estatus == 'activo')
            @include('productos.baja')
            @else
            @include('productos.alta')
            @endif
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
@stop


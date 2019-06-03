

@extends('layouts.dashboard')
@section('title','Vender')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
            <h2>Traspaso N° {{$traspaso->id}}</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-3 mail_list_column">
                        <a href="{{asset('traspasos/create')}}" class="btn btn-success form-control">AGREGAR TRASPASO</a> <hr>
                        <h4 class="text-center"> Autorizar traspasos</h4> <hr>
                        @foreach($traspasosListos as $traspasoListo)
                            <a href="{{asset('traspasos/'.$traspasoListo->id)}}">
                                <div class="mail_list">
                                    <div class="left">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="right">
                                        <h3>{{$traspasoListo->recibe}}<small>3.00 PM</small></h3>
                                        <p>
                                            <strong>Usuario: {{$traspasoListo->usuarioEnvia}}</strong> <br>
                                            <strong>Envia: {{$traspasoListo->envia}}</strong>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <!-- /MAIL LIST -->
                    <!-- CONTENT MAIL -->
                    <div class="col-sm-9 mail_view">
                        <div class="inbox-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Descargar PDF de traspaso
                                        </div>
                                        <div class="panel-body">
                                            <a href="" class="btn btn-success form-control"><span class="fa fa-download "></span> DESCARGAR PDF</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            El traspaso a sido {{$traspaso->estatus}}
                                        </div>
                                        <div class="panel-body">
                                            @if(Auth::user()->rol == 'administrador' and $traspaso->estatus == 'enviado')
                                                Espera a que el traspaso sea aceptado para poder autorizarlo
                                            @endif
                                            @if(Auth::user()->rol == 'administrador' and $traspaso->estatus == 'aceptado')
                                                <form action="{{asset('autorizar_traspaso')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="traspaso_id" value="{{$traspaso->id}}">
                                                    <button type="submit" class="btn btn-success form-control"><span class="fa fa-check"></span>Autorizar</button>
                                                </form>
                                            @endif
                                            @if($traspaso->estatus == 'enviado' and Auth::user()->bussine_id == $traspaso->recibe)
                                                <form action="{{asset('aceptar_traspaso')}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="traspaso_id" value="{{$traspaso->id}}">
                                                    <button class="btn btn-success form-control"><span class="fa fa-check"></span> Aceptar</button>
                                                </form>
                                            @endif
                                            @if($traspaso->estatus == 'aceptado' and $traspaso->recibe == Auth::user()->bussine_id)
                                                Espera al administrador que autorize el traspaso para que el inventario sea cargado al sistema
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"></div>
                                        <div class="panel-body"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="view-mail">
                                @include('traspasos.data-show')
                            </div>
                        </div>
                    </div>
                    <!-- /CONTENT MAIL -->
                </div>
            </div>
        </div>
    </div>
</div>
@stop


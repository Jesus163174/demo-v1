

@extends('layouts.dashboard')
@section('title','Vender')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Listado de traspasos</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-3 mail_list_column">
                        <a href="{{asset('traspasos/create')}}" class="btn btn-success form-control">AGREGAR TRASPASO</a> <hr>
                        <h4 class="text-center"> Autorizar traspasos</h4> <hr>
                        @foreach($traspasosListos as $traspaso)
                            <a href="{{asset('traspasos/'.$traspaso->id)}}">
                                <div class="mail_list">
                                    <div class="left">
                                        <i class="fa fa-circle"></i>
                                    </div>
                                    <div class="right">
                                        <h3>{{$traspaso->recibe}}<small>3.00 PM</small></h3>
                                        <p>
                                            <strong>Usuario: {{$traspaso->usuarioEnvia}}</strong> <br>
                                            <strong>Envia: {{$traspaso->envia}}</strong>
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
                            
                            
                            <div class="view-mail">
                                @include('traspasos.data')
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


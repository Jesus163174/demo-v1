@extends('layouts.dashboard')
@section('title','Inventario general')
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
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading d-flex">
                    <h3 class="title">Listado de empleados</h3>
                    <a class="btn btn-success btn-sm" href="{{asset('usuarios/create')}}">Agregar empleado</a>
                </div>
                <div class="panel-body">
                    @include('usuarios.data')
                </div>
            </div>
        </div>
    </div>
</div>
@stop



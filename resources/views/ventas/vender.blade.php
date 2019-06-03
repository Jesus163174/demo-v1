@extends('layouts.dashboard')
@section('title','Vender')
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading font-bold">
						Consultar inventario
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-8">
								<form action="">
									<input type="text" class="form-control" name="codigo" placeholder="Agregar por codigo de barras">
								</form>
							</div>
							<div class="col-md-4">
								<a data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-success"><i class="fa fa-search"></i> Consultar productos</a>
							</div>
							<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
								<div class="modal-dialog modal-lg" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h3 class="modal-title">PRODUCTOS DEL INVENTARIO</h3>
										</div>
										<div class="modal-body table-responsive">
											@include('ventas.vender.consultar')
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading font-bold">
						Productos de la venta
					</div>
					<div class="panel-body">
						<div class="x_content table-responsive">
							@include('ventas.vender.productos')
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading font-size-md font-bold d-flex">
						DETALLE DE LA VENTA
						<span class="fa fa-sun-o click" data-toggle="modal" data-target="#myModal"></span>
					</div>
					@include('ventas.vender.detalle')
				</div>
			</div>
		</div>
	</div>
@stop
@section('js')
	<script>
		let sendFORM = document.querySelector('#sendForm');
		sendFORM.addEventListener('click',()=>{
			sendForm.setAttribute('disabled','true');
		});
	</script>
@stop

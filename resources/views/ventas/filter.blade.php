<form action="{{asset('filtros_ventas')}}" method="get">
	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
					</button>
					<h4 class="modal-title" id="myModalLabel2">Selecciona los filtros</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Selecciona una sucursal</label>
								<select class="form-control" name="sucursal" id="">
									<option value="" selected="">Selecciona una sucursal</option>
									@foreach($bussines as $bussine)
									<option value="{{$bussine->nombre}}">{{$bussine->nombre}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Selecciona un vendedor</label>
								<select  class="form-control" name="vendedor" id="">
									<option value="" selected="">Selecciona un vendedor</option>
									@foreach($sellers as  $seller)
									<option value="{{$seller->name}}">{{$seller->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Selecciona la fecha 1</label>
								<input type="date" required="" class="form-control" name="fecha1">
							</div>
							<div class="form-group">
								<label for="">Selecciona la fecha 2</label>
								<input type="date" required="" class="form-control" name="fecha2">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="">Selecciona un estatus</label>
								<select  class="form-control" name="estatus" id="">
									<option value="" selected="">Selecciona un estatus</option>
									<option value="pagado">Pagado</option>
									<option value="cancelado">Cancelado</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Filtrar</button>
				</div>

			</div>
		</div>
	</div>
</form>
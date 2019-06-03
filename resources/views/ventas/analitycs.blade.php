<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	<div class="tile-stats padding">
		<div class="icon"><i class="fa fa-money"></i></div>
		<div class="count money total">${{number_format($totales->total_ventas,2,'.',',')}}</div>
		<h3>Total</h3>
	</div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	<div class="tile-stats padding">
		<div class="icon"><i class="fa fa-money"></i></div>
		<div class="count money">${{number_format($totales->inversion,2,'.',',')}}</div>
		<h3>Inversión</h3>
	</div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	<div class="tile-stats padding">
		<div class="icon"><i class="fa fa-money "></i></div>
		<div class="count money earnings">${{number_format($totales->ganancias,2,'.',',')}}</div>
		<h3>Ganancias</h3>
	</div>
</div>
<div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
	<div class="tile-stats padding">
		<a href="" data-toggle="modal" data-target=".bs-example-modal-sm" class="btn btn-success form-control">Ver filtros de ventas</a>
		<a href="" data-toggle="modal" data-target=".bs-example-modal-lg" class="btn btn-success form-control">Ver grafica de ventas</a>
	</div>
</div>
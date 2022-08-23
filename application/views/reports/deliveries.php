
<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Reporte de entregas</h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Reporte de entregas</a></li>
				</ol>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>



<div style="margin-bottom: -350px" class="container-fluid">
	<!-- ============================================================== -->
	<!-- Three charts -->
	<!-- ============================================================== -->
	<div class="row justify-content-center">

		<div class="col-lg-12">
			<div class="white-box analytics-info">
				<h3 class="box-title">Busqueda</h3>

				<?php echo form_open('reports/deliveries', array('class' => 'form-horizontal')); ?>
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label class="col-sm-12">Fecha de inicio</label>
							<div class="col-sm-12">
								<input type="date" class="form-control" id="datepicker" name="date_start" placeholder="Fecha de inicio" value="">
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="col-sm-12">Fecha de inicio</label>
							<div class="col-sm-12">
								<input type="date" class="form-control" id="datepicker" name="date_end" placeholder="Fecha de inicio" value="">
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label class="col-sm-12">Busqueda</label>
							<div class="col-sm-12">
								<button class="btn btn-primary" type="submit" name="search"><i class="fa fa-search"></i> Buscar</button>
							</div>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Three charts -->
	<!-- ============================================================== -->
	<div class="row justify-content-center">

		<div class="col-lg-12">
			<div class="white-box analytics-info">
				<h3 class="box-title">Sups</h3>
				<div class="table-responsive">
					<table style="width: 100%" id="entries-list" class="table">
						<thead>
							<th>ID</th>
							<th>Sup</th>
							<th>Revision</th>
							<th>Maquina</th>
							<th>Partes</th>
							<th>Piezas listas(hrs)</th>
							<th>Tiempo en recoger(hrs)</th>
							<th>Tiempo total (hrs)</th>
						</thead>
						<tbody>
							<?php
							foreach ($deliveries as $delivery):
							?>

								<tr>
									<td><?php echo $delivery['request_id'] ?></td>
									<td><?php echo $delivery['boy_sup'] ?></td>
									<td><?php echo $delivery['revision'] ?></td>
									<td><?php echo $delivery['maquina'] ?></td>
									<td><?php echo $delivery['partno'] ?><br><?php echo $delivery['partno_descrip'] ?></td>
									<td>
									<?php
									$t1 = strtotime($delivery['created_at']);
									$t2 = strtotime(date("Y-m-d H:i:s"));
									$diff = $t2 - $t1;
									$hours = $diff / ( 60 * 60 );
									echo round($hours,2);
									?>
									</td>
									<td>
									<?php
									$t1 = strtotime($delivery['created_at']);
									$t2 = strtotime(date("Y-m-d H:i:s"));
									$diff = $t2 - $t1;
									$hours = $diff / ( 60 * 60 );
									echo round($hours,2);
									?>
									</td>
									<td>
									<?php
									$t1 = strtotime($delivery['created_at']);
									$t2 = strtotime(date("Y-m-d H:i:s"));
									$diff = $t2 - $t1;
									$hours = $diff / ( 60 * 60 );
									echo round($hours,2);
									?>
									</td>
								</tr>

							<?php endforeach; ?>
						</tbody>

					</table>
				</div>
			</div>
		</div>



	</div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script>
	$('#entries-list').DataTable({
		'scrollX': true,
		"oLanguage": {
			"sEmptyTable": "No hay informacion... <a href='<?php echo base_url() ?>request/new' class='btn btn-primary'>Agregar Aqui</a>",
			"sZeroRecords": "No se encontro el sup ... <a href='<?php echo base_url() ?>request/new' class='btn btn-primary'>Agregar Aqui</a>"
		}
		//'bSort': false
		//'scrollCollapse': true,
	});
</script>




<script>
	(function reloadfun() {
		$.ajax({
			url: '<?php echo base_url() ?>pages/view',
			success: function(data) {
				$("#pendingdiv").load(location.href+" #pendingdiv>*","");//logged_in
			},
			complete: function() {
				// Siguiente peticion de ajax cuando la actual este terminada
				setTimeout(reloadfun, 300000);

			}
		});
	})();
</script>

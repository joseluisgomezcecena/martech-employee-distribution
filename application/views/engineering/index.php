
<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Panel de Ingenieria</h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Ingenieria</a></li>
				</ol>
				<a href="<?php echo base_url() ?>engineering/create" target=""
				   class="btn btn-danger  d-none d-md-block pull-right ms-3 hidden-xs hidden-sm waves-effect waves-light text-white">
					Registrar SUP
				</a>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->
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
						<th>BoySup</th>
						<th>Maquina</th>
						<th>Partes</th>
						<th>Actualizacion</th>
						<th>Eliminar</th>
						</thead>
						<tbody>
						<?php
						foreach ($sups as $sup):
							?>

							<tr>
								<td><?php echo $sup['id'] ?></td>
								<td><?php echo $sup['boy_sup'] ?></td>
								<td><?php echo $sup['maquina'] ?></td>
								<td><?php echo $sup['partno'] ?><br><?php echo $sup['partno_descrip'] ?></td>
								<td>
									<a class="btn btn-primary text-white" href="<?php echo base_url() ?>engineering/new/<?php echo $sup['id'] ?>"
									   data-bs-toggle="tooltip" data-bs-placement="top" title="Se agregara una nueva revision al SUP">
										Nueva Revision
									</a>

									<a class="btn btn-warning" href="<?php echo base_url() ?>engineering/update/<?php echo $sup['id'] ?>"
									   data-bs-toggle="tooltip" data-bs-placement="top" title="Se cambiara el SUP en version actual">
										Actualizar
									</a>

								</td>
								<td>

									<a class="btn btn-danger text-white" href="<?php echo base_url() ?>engineering/delete/<?php echo $sup['id'] ?>"
									   data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar SUP">
										Eliminar
									</a>
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
			"sEmptyTable": "No se encontro... <a href='<?php echo base_url() ?>engineering/create' class='btn btn-primary'>Agregar Aqui</a>",
			"sZeroRecords": "No se encontro... <a href='<?php echo base_url() ?>engineering/create' class='btn btn-primary'>Agregar Aqui</a>"
		}
		//'bSort': false,
		//'scrollCollapse': true,
	});
	/*
	$('#entries-list').DataTable({
		'scrollX': true,
		//'bSort': false,
		//'scrollCollapse': true,

		'processing': true,
		'serverSide': true,
		'serverMethod': 'post',
		'ajax': {
		'url': '<?php echo base_url() ?>datatables/home_calidad.php'
		},
		'columns': [
			{ data: 'id' },
			{ data: 'part_no' },
			{ data: 'lot_no' },
			{ data: 'qty' },
			{ data: 'planta' },
			{ data: 'progress' },
			{ data: 'btn_id' },
		]
	});
	*/
</script>



<script>

	$(document).ready(function() {
		$("body").tooltip({ selector: '[data-bs-toggle=tooltip]' });
	});

</script>

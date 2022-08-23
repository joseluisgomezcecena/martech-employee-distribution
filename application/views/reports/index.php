
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

				<?php echo form_open('reports/index', array('class' => 'form-horizontal')); ?>
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
							<th>Numero de empleado</th>
							<th>Ubicación</th>
							<th>Fecha de registro</th>
							<th>Tipo</th>
						</thead>
						<tbody>
							<?php foreach ($scans as $scan): ?>
								<tr>
									<td><?php echo $scan['id']; ?></td>
									<td><?php echo $scan['emp_number']; ?></td>
									<td><?php echo $scan["location_name"]; ?></td>
									<td><?php echo $scan["created_at"]; ?></td>
									<td>
										<?php
										$type = $scan['type'];
										if($type % 2 == 0) {
											echo "Entrada";
										}
										else{
											echo "Salida";
										}
										?>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>

					</table>
				</div>
			</div>
		</div>







		<div class="col-lg-12">
			<div class="white-box analytics-info">
				<h3 class="box-title">Sups</h3>
				<div class="table-responsive">
					<table style="width: 100%" id="entries-list" class="table">
						<thead>
						<th>Ubicación</th>
						<th>Cantidad de empleados</th>
						</thead>
						<tbody>
						<?php foreach ($groups as $group): ?>
							<tr>
								<td><?php echo $group['location_name']; ?></td>
								<td><?php echo $group['cuenta']; ?></td>
							</tr>
						<?php endforeach ?>
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
		'bSort': false
		//'scrollCollapse': true,
	});
</script>





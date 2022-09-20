<section class="breadcrumb">
	<h1>Reportes</h1>
	<ul>
		<li><a href="#">Escaneo de Gafetes</a></li>
		<li class="divider la la-arrow-right"></li>
		<li>Reportes</li>
	</ul>
</section>



<div class="card p-4 flex flex-wrap gap-5">
	<?php echo form_open(base_url() . 'reports/index', array('class' => 'form-horizontal')); ?>
	<div class="grid grid-cols-5 gap-4">
		<div style="margin: 15px;">
			<label class="col-sm-12">Fecha de inicio</label>
			<div class="col-sm-12">
				<input type="date" class="form-control" id="datepicker" name="date_start" placeholder="Fecha de inicio" value="">
			</div>
		</div>

		<div style="margin: 15px;">
			<label class="col-sm-12">Fecha de inicio</label>
			<div class="col-sm-12">
				<input type="date" class="form-control" id="datepicker" name="date_end" placeholder="Fecha de inicio" value="">
			</div>
		</div>

		<div style="margin: 15px;">
			<div class="col-sm-12">
				<label class="col-sm-12">Click para buscar</label>
				<button class="btn_primary btn" type="submit" name="search"><i class="fa fa-search"></i> Buscar</button>
			</div>
		</div>

	</div>
	<?php echo form_close(); ?>

</div>


<div class="card p-4  gap-5 mt-5">

	<div class="container-fluid">

		<div class="row justify-content-center">

			<div class="col-lg-12 mt-5">
				<div class="white-box analytics-info">
					<h3 class="box-title">Registros</h3>
					<div class="">
						<table style="width: 100%" id="entries-list" class="table table_hoverable table_striped">
							<thead>
							<th>ID</th>
							<th>Numero de empleado</th>
							<th>Ubicación</th>
							<th>Entrada</th>
							<th>Salida</th>
							<th>Horas trabajadas</th>
							<th>Fecha de registro</th>

							</thead>
							<tbody>
							<?php foreach ($scans as $scan): ?>
								<tr>
									<td class="text-center justify-center items-center"><?php echo $scan['id']; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan['emp_number']; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan["location_name"]; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan["check_in"]; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan["check_out"]; ?></td>
									<td class="text-center justify-center items-center"><?php echo round($scan["hours_worked"],2) ; ?></td>
									<td class="text-center justify-center items-center"><?php echo $scan["created_at"]; ?></td>
								</tr>
							<?php endforeach ?>
							</tbody>

						</table>
					</div>
				</div>
			</div>







			<div class="col-lg-12 mt-5">
				<div class="white-box analytics-info">
					<h3 class="box-title">Registros por ubicación</h3>
					<div class="table-responsive">
						<table style="width: 100%" id="entries-list" class="table">
							<thead>
							<th>Ubicación</th>
							<th>Cantidad de empleados</th>
							</thead>
							<tbody>
							<?php foreach ($employees as $employee): ?>
								<tr>
									<td class="text-center justify-center items-center"><?php echo $employee['location_name']; ?></td>
									<td class="text-center justify-center items-center"><?php echo $employee['cuenta']; ?></td>
								</tr>
							<?php endforeach ?>
							</tbody>

						</table>
					</div>
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





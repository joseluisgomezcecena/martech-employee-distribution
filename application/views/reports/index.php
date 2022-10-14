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
				<!--
				<label class="col-sm-12">Click para buscar</label>
				-->
				<button class="btn_primary btn mt-5" type="submit" name="search"><i class="la la-search"></i> &nbsp; Buscar</button>
			</div>
		</div>

	</div>
	<?php echo form_close(); ?>

</div>


<div class="card p-4  gap-5 mt-5">

	<div class="flex flex-col gap-y-5">
		<div class="p-5">
			<h3 class="mb-4">Registro de checadas</h3>
			<table style="width: 100%; font-size: 12px;" id="entries-list" class="table table_striped w-full mt-3">
				<thead>
				<tr>
					<th class="ltr:text-left rtl:text-right uppercase">ID</th>
					<th class="ltr:text-left rtl:text-right uppercase">Numero de empleado</th>
					<th class="ltr:text-left rtl:text-right uppercase">Ubicación</th>
					<th class="ltr:text-left rtl:text-right uppercase">Planning Group</th>
					<th class="ltr:text-left rtl:text-right uppercase">Entrada</th>
					<th class="ltr:text-left rtl:text-right uppercase">Salida</th>
					<th class="ltr:text-left rtl:text-right uppercase">Horas Trabajadas</th>
					<th class="ltr:text-left rtl:text-right uppercase">Fecha de Registro</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($scans as $scan): ?>
					<tr>
						<td  class=""><?php echo $scan['id']; ?></td>
						<td  class=""><?php echo $scan['emp_number']; ?></td>
						<td  class=""><?php echo $scan["location_name"]; ?></td>
						<td  class=""><?php echo $scan["planner_id"]; ?></td>
						<td  class=""><?php echo $scan["check_in"]; ?></td>
						<td  class=""><?php echo $scan["check_out"]; ?></td>
						<td  class=""><?php echo round($scan["hours_worked"],2) ; ?></td>
						<td  class=""><?php echo $scan["created_at"]; ?></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>





<div class="card p-4  gap-5 mt-5">

	<div class="flex flex-col gap-y-5">
		<div class="p-5">
			<h3>Horas por empleado en planning group</h3>
			<table style="width: 100%; font-size: 12px;" id="entries-list" class="table table_striped w-full mt-3">
				<thead>
				<tr>
					<th class="ltr:text-left rtl:text-right uppercase">Numero de empleado</th>
					<th class="ltr:text-left rtl:text-right uppercase">Horas Trabajadas</th>
					<th class="ltr:text-left rtl:text-right uppercase">Planning Group con mas horas</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($hours as $hour): ?>
					<tr>
						<td  class=""><?php echo $hour['emp_number']; ?></td>
						<td  class=""><?php echo round($hour["mejor"],3) ; ?></td>
						<td  class=""><?php echo $hour["planner_id"]; ?></td>
					</tr>
				<?php endforeach ?>
				</tbody>
			</table>
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





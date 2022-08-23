<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h4 class="page-title">Requisicion de SUP: <?php echo $sup['boy_sup'] ?></h4>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Recepcion de Req</a></li>
				</ol>
			</div>
		</div>
	</div>

</div>




<div class="container-fluid">
	<?php echo form_open('forms/request/' . $sup['id']) ?>
	<div class="row justify-content-center">
		<div class="col-lg-12 col-md-12">

			<input type="hidden" value="0" name="checked" id="checked">

			<?php echo validation_errors(); ?>


			<div class="white-box analytics-info">

				<h3 class="box-title">REQUISICION TOOLING LIST PLUS E INSERTOS <?php echo $sup['boy_sup'] ?></h3>


				<div class="row mt-5">
					<div class="form-group col-lg-2">
						<label for="">Fecha</label>
						<input  class="form-control" name="asistencia_fecha" value="<?php echo date("m-d-Y"); ?>" disabled>
					</div>
					<div class="form-group col-lg-2">
						<label for="">Planta</label>
						<select  class="form-control" name="location"  required>
							<option value="">Seleccione</option>
							<option value="Planta1">Planta 1</option>
							<option value="Planta2">Planta 2</option>
							<option value="Planta3">Planta 3</option>
						</select>
						<small class="text-danger">* Campo requerido</small>
					</div>
				</div>

				<div class="row mt-3">

					<div class="col-lg-3">
						<label for="">ID</label>
						<input type="text" class="form-control" value="<?php echo $sup['id'] ?>" disabled>
					</div>


					<div class="col-lg-3">
						<label for="">Revision</label>
						<input type="text" class="form-control" value="<?php echo $sup['revision'] ?>" disabled>
					</div>


					<div class="col-lg-3">
						<label for="">Numero de parte</label>
						<input type="text" class="form-control" value="<?php echo $sup['partno'] ?>" disabled>
					</div>


					<div class="col-lg-3">
						<label for="">Descripcion de numero de parte</label>
						<input type="text" class="form-control" value="<?php echo $sup['partno_descrip'] ?>" disabled>
					</div>


					<div class="col-lg-3">
						<label for="">SUP</label>
						<input type="text" class="form-control" value="<?php echo $sup['boy_sup'] ?>" disabled>
					</div>


					<div class="col-lg-3">
						<label for="">Maquina</label>
						<input type="text" class="form-control" value="<?php echo $sup['maquina'] ?>" disabled>
					</div>


					<div class="col-lg-3">
						<label for="">Resina</label>
						<input type="text" class="form-control" value="<?php echo $sup['resina'] ?>" disabled>
					</div>

				</div>


				<div class="row">
					<div class="col-lg-12">
						<div class="row">
							<div class="table-responsive card shadow border mt-5">
								<table class="table table-hover table-striped">
									<thead>
									<tr>
										<th>Pedir Inserto</th>
										<th>Numero de parte</th>
										<th>Piezas</th>
										<th>Posicion</th>
										<th>Grupo de insertos</th>
										<th>Descripcion</th>
									</tr>
									</thead>
									<tbody>
									<?php
									$contador = 0;
									foreach ($details as $detail):
										$contador++;

										?>
										<tr>
											<td>
												<input type="checkbox" name="pz_<?php echo $contador ?>" id="" value="<?php echo $detail['r_insert_sup_id'] ?>" onchange="numberOfChecked()" class="custom-checkbox">
												<?php echo $detail['r_insert_sup_id']; ?>
											</td>
											<td><?php echo $detail['insert_no']; ?></td>
											<td><?php echo $detail['r_insert_pz']; ?></td>
											<td><?php echo $detail['r_insert_position']; ?></td>
											<td><?php echo $detail['insert_group']; ?></td>
											<td><?php echo $detail['insert_description']; ?></td>
										</tr>
									<?php
									endforeach;
									?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-lg-12">
						<input type="hidden" name="contador" value="<?php echo $contador ?>">
						<input type="hidden" name="id" value="<?php echo $sup['id'] ?>">
						<input class="btn btn-primary" type="submit" value="PEDIR INSERTOS">
					</div>
				</div>

			</div>




		</div>
	</div>
	<?php echo form_close() ?>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
	function numberOfChecked() {
		var numberOfChecked = $('input:checkbox:checked').length;
		//alert("checked:" + numberOfChecked);
		$('#checked').val(numberOfChecked);
	}
</script>


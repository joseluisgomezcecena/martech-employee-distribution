
<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h4 class="page-title">Requisicion de SUP: <span class="text-primary"><?php echo $request['boy_sup'] ?></span></h4>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal text-primary"><?php echo $request['boy_sup'] ?></a></li>
				</ol>
			</div>
		</div>
	</div>

</div>




<div class="container-fluid">

	<div class="row justify-content-center">
		<div class="col-lg-12 col-md-12">


			<div class="white-box analytics-info">

				<h3 class="box-title">REQUISICION TOOLING LIST PLUS E INSERTOS</h3>

				<div class="row mt-5">
					<div class="col-lg-1 mt-1">
						<label for="">ID</label>
						<input type="text" class="form-control" value="<?php echo $request['id'] ?>" disabled>
					</div>
					<div class="col-lg-2 mt-1">
						<label for="">Fecha del Pedido</label>
						<input type="text" class="form-control" value="<?php echo date_format(date_create($request['created_at']),'m-d-Y')  ?>" disabled>
					</div>

					<div class="col-lg-2 mt-1">
						<label for="">Hora del Pedido</label>
						<input type="text" class="form-control" value="<?php echo date_format(date_create($request['created_at']),'H:i:s')  ?>" disabled>
					</div>

					<div class="col-lg-2 mt-1">
						<label for="">Sup</label>
						<input type="text" class="form-control" value="<?php echo $request['boy_sup'] ?>" disabled>
					</div>


					<div class="col-lg-2 mt-1">
						<label for="">Revision</label>
						<input type="text" class="form-control" value="<?php echo $request['revision'] ?>" disabled>
					</div>

					<div class="col-lg-3 mt-1">
						<label>Maquina</label>
						<input type="text" class="form-control" value="<?php echo $request['maquina'] ?>" disabled>
					</div>


				</div>
				<div class="row mt-3">

					<div class="col-lg-3 mt-1">
						<label for="">Numero de Parte</label>
						<input type="text" class="form-control" value="<?php echo $request['partno'] ?>" disabled>
					</div>
					<div class="col-lg-4 mt-1">
						<label for="">Descripcion de numero de parte</label>
						<input type="text" class="form-control" value="<?php echo $request['partno_descrip'] ?>" disabled>
					</div>


					<div class="col-lg-2 mt-1">
						<label for="">Resina</label>
						<input type="text" class="form-control" value="<?php echo $request['resina'] ?>" disabled>
					</div>

					<div class="col-lg-2 mt-1">
						<label for="">Ubicacion</label>
						<input type="text" class="form-control" value="<?php echo $request['location'] ?>" disabled>
					</div>
				</div>


				<div class="row">
					<div class="col-lg-12">

						<div class="row">

							<div class="table-responsive card shadow border mt-5">
								<table class="table table-hover table-striped">
									<thead>
										<tr>
											<th>Pedido</th>
											<th>Numero de parte</th>
											<th>Piezas</th>
											<th>Posicion</th>
											<th>Grupo de insertos</th>
											<th>Descripcion</th>
										</tr>
									</thead>
									<tbody>
									<?php foreach ($details as $detail): ?>

										<tr>
											<td>
												<?php
												foreach ($parts as $part)
												{
													if($detail['r_insert_sup_id'] == $part['r_insert_sup_id'])
													{
														echo '<i class="fa fa-check-circle fa-2x text-success"></i>';
													}
												}
												?>
											</td>
											<td><?php echo $detail['insert_no']; ?></td>
											<td><?php echo $detail['r_insert_pz']; ?></td>
											<td><?php echo $detail['r_insert_position']; ?></td>
											<td><?php echo $detail['insert_group']; ?></td>
											<td><?php echo $detail['insert_description']; ?></td>
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>


				<div class="row">
					<div class="col-lg-12">
						<?php echo form_open('toolcribs/respond') ?>
						<input type="hidden" name="id" value="<?php echo $request['request_id'] ?>">
						<input class="btn btn-primary" type="submit" value="Piezas Listas">
						<?php echo form_close() ?>
					</div>
				</div>

			</div>


		</div>
	</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type='text/javascript'>
	// baseURL variable
	var baseURL= "<?php echo base_url();?>";

	//Asistencia
	$(document).ready(function() {
		// Plant change
		$('#plant_id').change(function () {

			console.log("Cambio");

			var plant_id = $(this).val();

			// Ajax request
			$.ajax({
				url: '<?=base_url()?>index.php/Forms/get_sites',
				method: 'post',
				data: {plant_id: plant_id},
				dataType: 'json',
				success: function (response) {

					$('#linea_id').find('option').remove();
					// fill select
					$.each(response, function (index, data) {
						$('#linea_id').append('<option value="' + data['linea_id'] + '">' + data['linea_nombre'] + '</option>');
					});
				}
			});
		});


		//Movimientos










		//tiempo extra


	});//end document ready.



</script>



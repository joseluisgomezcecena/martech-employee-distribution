<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Crear una nueva Req</h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Nueva Req</a></li>
				</ol>
			</div>
		</div>
	</div>
	<!-- /.col-lg-12 -->
</div>




<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Contenido -->
	<!-- ============================================================== -->
	<div class="row justify-content-center">
		<div class="col-lg-12 col-md-12">

			<?php if($this->session->flashdata('tiempo')): ?>

				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong class="uppercase"><bdi>Success</bdi></strong>
					Se ha registrado el tiempo extra
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

				</div>

			<?php endif; ?>

			<?php if($this->session->flashdata('asistencia')): ?>

				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong class="uppercase"><bdi>Success</bdi></strong>
					Se ha registrado la asistencia
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>

			<?php endif; ?>

			<?php if($this->session->flashdata('movimiento')): ?>

				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong class="uppercase"><bdi>Success</bdi></strong>
					Se ha registrado el movimiento
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>

			<?php endif; ?>


			<div class="white-box analytics-info">
				<?php echo form_open('forms/create') ?>

				<h3 class="box-title">TOOLING LIST PLUS Y REQ INSERTOS</h3>

				<div class="row">
					<div class="col-lg-12">
						<?php echo validation_errors(); ?>

						<div class="row">
							<div class="form-group col-lg-3">
								<label for="">Fecha</label>
								<input  class="form-control" name="asistencia_fecha" value="<?php echo date("m-d-Y"); ?>" disabled>
							</div>
						</div>

						<div class="row">
							<div class="form-group col-lg-3">
								<label for="">Campos</label>
								<input type="hidden" class="form-control" name="campos" id="campos">
							</div>
						</div>


						<div class="row">

							<div class="form-group col-lg-2">
								<label for="">SUP No.</label>
								<input type="text" class="form-control" name="boy_sup" required>
							</div>


							<div class="form-group col-lg-2">
								<label for="">Maquina</label>
								<input type="text" class="form-control" name="maquina" required>
							</div>

							<div class="form-group col-lg-2">
								<label for="">Resina</label>
								<input type="text" class="form-control" name="resina" required>
							</div>

							<div class="form-group col-lg-2">
								<label for="">Numero Prod</label>
								<input type="text" class="form-control" name="partno" required>
							</div>

							<div class="form-group col-lg-2">
								<label for="">Descripcion Prod</label>
								<input type="text" class="form-control" name="partno_descrip" required>
							</div>



						</div>
					</div>
				</div> <!--end row-->



				<!--newcode-->

				<div class="row">
					<div class="col-lg-12">
						<div id="inputFormRow">
							<div class="row">
							<div class="mb-3 col-lg-2">

								<input type="text" name="insert_no_1" class="form-control m-input" placeholder="No. Parte" autocomplete="off">
								<div class="input-group-append">
								</div>
							</div>

							<div class=" mb-3 col-lg-2">
								<input type="text" name="insert_pz_1" class="form-control m-input" placeholder="No. Piezas" autocomplete="off">
								<div class="input-group-append">
								</div>
							</div>

							<div class=" mb-3 col-lg-2">
								<input type="text" name="insert_position_1" class="form-control m-input" placeholder="Posicion" autocomplete="off">
								<div class="input-group-append">
								</div>
							</div>

							<div class=" mb-3 col-lg-2">
								<input type="text" name="insert_group_1" class="form-control m-input" placeholder="Grupo" autocomplete="off">
								<div class="input-group-append">
								</div>
							</div>

							<div class=" mb-3 col-lg-2">
								<input type="text" name="insert_description_1" class="form-control m-input" placeholder="Descripcion" autocomplete="off">
								<div class="input-group-append">
								</div>
							</div>

							<div class="mb-3 col-lg-2">
								<button id="removeRow" type="button" class="btn btn-danger">Remove</button>
							</div>

							</div>

						</div>

						<div id="newRow"></div>
						<button id="addRow" type="button" class="btn btn-info">Add Row</button>
					</div>
				</div>

				<!--newcode-->

				<div class="form-group">
					<input style="width: 100%" type="submit" name="save_asistencia" class="btn btn-danger text-white btn-lg" value="Guardar Y Pedir Molde">
				</div>

				<?php echo form_close(); ?>

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


		$('#plant_id_one').change(function () {

			console.log("Cambio");

			var plant_id_one = $(this).val();

			// Ajax request
			$.ajax({
				url: '<?=base_url()?>index.php/Forms/get_sites',
				method: 'post',
				data: {plant_id: plant_id_one},
				dataType: 'json',
				success: function (response) {

					$('#line_id_one').find('option').remove();
					// fill select
					$.each(response, function (index, data) {
						$('#line_id_one').append('<option value="' + data['linea_id'] + '">' + data['linea_nombre'] + '</option>');
					});
				}
			});
		});



		$('#plant_id_two').change(function () {

			console.log("Cambio");

			var plant_id_two = $(this).val();

			// Ajax request
			$.ajax({
				url: '<?=base_url()?>index.php/Forms/get_sites',
				method: 'post',
				data: {plant_id: plant_id_two},
				dataType: 'json',
				success: function (response) {

					$('#line_id_two').find('option').remove();
					// fill select
					$.each(response, function (index, data) {
						$('#line_id_two').append('<option value="' + data['linea_id'] + '">' + data['linea_nombre'] + '</option>');
					});
				}
			});
		});




		//tiempo extra


		$('#te_planta').change(function () {

			console.log("Cambio");

			var plant_te = $(this).val();

			// Ajax request
			$.ajax({
				url: '<?=base_url()?>index.php/Forms/get_sites',
				method: 'post',
				data: {plant_id: plant_te},
				dataType: 'json',
				success: function (response) {

					$('#te_linea').find('option').remove();
					// fill select
					$.each(response, function (index, data) {
						$('#te_linea').append('<option value="' + data['linea_id'] + '">' + data['linea_nombre'] + '</option>');
					});
				}
			});
		});

	});//end document ready.


	var contador = 1

	$("#addRow").click(function () {

		contador++;
		$('#campos').val(contador);


		var html = '';
		html += '<div id="inputFormRow">';
		html += '<div class="row">';
		html += '<div class=" mb-3 col-lg-2">';
		html += '<input type="text" name="insert_no_'+contador+'"  class="form-control m-input" placeholder="Enter title" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';

		html += '<div class=" mb-3 col-lg-2">';
		html += '<input type="text" name="insert_pz_'+contador+'"  class="form-control m-input" placeholder="Enter title" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2">';
		html += '<input type="text" name="insert_position_'+contador+'"  class="form-control m-input" placeholder="Enter title" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2">';
		html += '<input type="text" name="insert_group_'+contador+'"  class="form-control m-input" placeholder="Enter title" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2">';
		html += '<input type="text" name="insert_description_'+contador+'"  class="form-control m-input" placeholder="Enter title" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2">';
		html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
		html += '</div>';

		html += '</div>';
		html += '</div>';

		$('#newRow').append(html);
	});

	// remove row
	$(document).on('click', '#removeRow', function () {
		contador --;
		$('#campos').val(contador);

		$(this).closest('#inputFormRow').remove();
	});


	$('#campos').val(contador);


</script>



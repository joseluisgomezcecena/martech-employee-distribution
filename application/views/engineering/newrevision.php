<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h4 class="page-title">Nueva Revision del SUP <?php echo strtoupper($sup['boy_sup']); ?>.</h4>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Registrar Nueva revision</a></li>
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

			<?php if($this->session->flashdata('created')): ?>

				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong class="uppercase"><bdi>Nueva Revision Registrada</bdi></strong>
					Se ha creado una nueva revision para el SUP de este molde y ha quedado registrado por parte de ingenieria, este tooling list
					estara disponible para hacer pedidos sin necesidad de llenar esta forma nuevamente.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>

			<?php endif; ?>


			<div class="white-box analytics-info">
				<?php echo form_open('engineeringforms/newrevision') ?>

				<input type="hidden" name="id" value="<?php echo $sup['id']; ?>">

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

						<div class="row border mb-5 shadow-sm">



							<div class="form-group col-lg-2 mb-4 mt-4 ">
								<label for="">SUP No.</label>
								<input type="text" class="form-control text-uppercase" name="boy_sup" value="<?php echo $sup['boy_sup'] ?>" required>
							</div>


							<div class="form-group col-lg-2 mb-4 mt-4">
								<label for="">Maquina</label>
								<input type="text" class="form-control text-uppercase" name="maquina" value="<?php echo $sup['maquina'] ?>" required>
							</div>


							<!--
							<div class="form-group col-lg-2 mb-4 mt-4">
								<label for="">Resina</label>
								<input type="text" class="form-control text-uppercase" name="resina" value="<?php echo $sup['resina'] ?>" required>
							</div>

							<div class="form-group col-lg-2 mb-4 mt-4">
								<label for="">Numero Prod</label>
								<input type="text" class="form-control text-uppercase" name="partno" value="<?php echo $sup['partno'] ?>" required>
							</div>
							-->

							<div class="form-group col-lg-2 mb-4 mt-4">
								<label for="">Resina</label>
								<input list="rms" name="resina" class="form-control text-uppercase" value="<?php echo $sup['resina'] ?>" required>
								<datalist id="rms">
									<?php foreach ($rms as $rm): ?>
										<option value="<?php echo $rm['NO DE RESINA'] ?>" ></option>
									<?php endforeach; ?>
								</datalist>
								<small class="text-danger">* Campo requerido</small>
							</div>

							<div class="form-group col-lg-2 mb-4 mt-4">
								<label for="">Numero de parte</label>
								<input list="parts" name="partno" class="form-control text-uppercase" value="<?php echo $sup['partno'] ?>" required>
								<datalist id="parts">
									<?php foreach ($parts as $part): ?>
										<option value="<?php echo $part['COL 1'] ?>" ></option>
									<?php endforeach; ?>
								</datalist>
								<small class="text-danger">* Campo requerido</small>
							</div>



							<div class="form-group col-lg-4 mb-4 mt-4">
								<label for="">Descripcion Prod</label>
								<input type="text" class="form-control flip text-uppercase" name="partno_descrip" value="<?php echo $sup['partno_descrip'] ?>" required>
							</div>



						</div>
					</div>
				</div> <!--end row-->



				<!--newcode-->

				<div class="row">
					<div class="col-lg-12">

						<?php
						$contador = 0;
						foreach ($details as $detail):
							$contador++;
						?>

						<div id="inputFormRow">
							<div class="row">

								<div class="mb-3 col-lg-2 inserts">

									<input list="browsers" value="<?php echo $detail['insert_no'] ?>" name="insert_no" id="insert_no_1" class="form-control text-uppercase searchable countme "  onchange="searchnow(1)" placeholder="NUMERO DE PARTE" required>
									<datalist id="browsers">
										<?php
										foreach ($inserts as $insert):
											?>
											<option value="<?php echo $insert['insert_no'] ?>" ></option>
										<?php endforeach; ?>

									</datalist>


									<!--
									<input type="text" name="insert_no_1" class="form-control m-input" placeholder="No. Parte" autocomplete="off">
									-->
									<div class="input-group-append">
									</div>

								</div>

								<div class=" mb-3 col-lg-2 pz">
									<input type="text" value="<?php echo $detail['r_insert_pz'] ?>" name="insert_pz_<?php echo $contador ?>" class="form-control m-input text-uppercase" placeholder="No. Piezas" autocomplete="off" required>
									<div class="input-group-append">
									</div>
								</div>

								<div class=" mb-3 col-lg-2 position">
									<input type="text" value="<?php echo $detail['r_insert_position'] ?>" name="insert_position_<?php echo $contador ?>" class="form-control m-input text-uppercase" placeholder="Posicion" autocomplete="off" required>
									<div class="input-group-append">
									</div>
								</div>

								<div class=" mb-3 col-lg-2 group">
									<input type="text" value="<?php echo $detail['insert_group'] ?>" name="insert_group_<?php echo $contador ?>" id="insert_group_1" class="form-control m-input groupclass text-uppercase" placeholder="Grupo" autocomplete="off" required>
									<div class="input-group-append">
									</div>
								</div>

								<div class=" mb-3 col-lg-2 description">
									<input type="text" value="<?php echo $detail['insert_description'] ?>" name="insert_description_<?php echo $contador ?>" id="insert_description_1"  class="form-control m-input descriptionclass text-uppercase" placeholder="Descripcion" autocomplete="off">
									<div class="input-group-append">
									</div>
								</div>

								<div class="mb-3 col-lg-1">
									<button id="removeRow" type="button" class="btn btn-danger text-white">Remove</button>
								</div>

							</div>

						</div>

						<?php
						endforeach;
						?>

						<div id="newRow"></div>
						<button id="addRow" type="button" class="btn btn-info mt-5 mb-5 text-white">Agregar</button>
					</div>
				</div>

				<!--newcode-->

				<div class="form-group">
					<input style="width: 100%" type="submit" name="save_asistencia" class="btn btn-danger text-white btn-lg" value="Guardar Cambios.">
				</div>

				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type='text/javascript'>

	var contador = <?php echo $contador; ?>

	$("#addRow").click(function () {

		contador++;
		$('#campos').val(contador);


		var html = '';
		html += '<div id="inputFormRow">';
		html += '<div class="row">';



		html += '<div class=" mb-3 col-lg-2 inserts">';
		html += '<input list="browsers" name="insert_no_'+contador+'" id="insert_no_'+contador+'" onchange="searchnow(contador)" class="form-control text-uppercase searchable countme " placeholder="numero de parte">';
		html += '<datalist id="browsers">';
		<?php
		foreach ($inserts as $insert):
		?>
		html += '<option value="<?php echo $insert['insert_no'] ?>" ></option>';
		<?php endforeach; ?>

		html += '</datalist>';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';

		html += '<div class=" mb-3 col-lg-2 pz">';
		html += '<input type="text" name="insert_pz_'+contador+'"  class="form-control m-input text-uppercase" placeholder="no. piezas" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2 position">';
		html += '<input type="text" name="insert_position_'+contador+'"  class="form-control m-input text-uppercase" placeholder="posicion" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2 group">';
		html += '<input type="text" name="insert_group_'+contador+'" id="insert_group_'+contador+'"  class="form-control m-input groupclass text-uppercase" placeholder="grupo" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2 description">';
		html += '<input type="text" name="insert_description_'+contador+'" id="insert_description_'+contador+'"  class="form-control m-input text-uppercase" placeholder="descripcion" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-1">';
		html += '<button id="removeRow" type="button" class="btn btn-danger text-white">Remove</button>';
		html += '</div>';

		html += '</div>';
		html += '</div>';

		$('#newRow').append(html);
		dynamicNaming();
	});

	// remove row
	$(document).on('click', '#removeRow', function () {
		contador --;
		$('#campos').val(contador);

		$(this).closest('#inputFormRow').remove();
		dynamicNaming();
	});


	$('#campos').val(contador);



	/*
	function dynamicCounter(){
		var numItems = $('.countme').length;
		alert(numItems);

	}
	*/

	function dynamicNaming() {

		var insert_number = 0;
		var pz_number = 0;
		var position_number = 0;
		var group_number = 0;
		var description_number = 0;


		$("div.inserts input").each(function (i) {
			 insert_number += 1;
			$(this).attr('name', 'insert_no_'+insert_number);
		});

		$("div.pz input").each(function (i) {
			pz_number += 1;
			$(this).attr('name', 'insert_pz_'+pz_number);
		});

		$("div.position input").each(function (i) {
			position_number += 1;
			$(this).attr('name', 'insert_position_'+position_number);
		});

		$("div.group input").each(function (i) {
			group_number += 1;
			$(this).attr('name', 'insert_group_'+group_number);
		});

		$("div.description input").each(function (i) {
			description_number += 1;
			$(this).attr('name', 'insert_description_'+description_number);
		});
	}
	dynamicNaming();
</script>


<script>
	var baseURL= "<?php echo base_url();?>";

	function searchnow(param) {


		var plant_id = $("#insert_no_"+param).val();

		// Ajax request
		$.ajax({
			url: '<?=base_url()?>index.php/Forms/get_insert_details',
			method: 'post',
			data: {plant_id: plant_id},
			dataType: 'json',
			success: function (response) {
				$.each(response, function (index, data) {


					$('#insert_group_'+param).val(data['insert_group']);
					$('#insert_description_'+param).val(data['insert_description']);

				});
			}
		});
	}

</script>

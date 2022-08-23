<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
			<h4 class="page-title">Registrar SUP.</h4>
		</div>
		<div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Nueva Sup</a></li>
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




			<?php if($this->session->flashdata('creado')): ?>

				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong class="uppercase"><bdi>SUP Registrado</bdi></strong>
					Se ha creado el SUP para este molde y ha quedado registrado por parte de ingenieria, este tooling list
					estara disponible para hacer pedidos sin necesidad de llenar esta forma.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>

			<?php endif; ?>


			<div class="white-box analytics-info">
				<?php echo form_open('engineeringforms/create') ?>

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
								<input type="hidden" class="form-control" name="campos" id="campos">
							</div>
						</div>

						<div class="row border mb-5 shadow-sm">



							<div class="form-group col-lg-2 mb-4 mt-4 ">
								<label for="">SUP No.</label>
								<input type="text" class="form-control text-uppercase" name="boy_sup" required>
								<small class="text-danger">* Campo requerido</small>
							</div>


							<div class="form-group col-lg-2 mb-4 mt-4">
								<label for="">Maquina</label>
								<input type="text" class="form-control text-uppercase" name="maquina" required>
								<small class="text-danger">* Campo requerido</small>
							</div>

							<div class="form-group col-lg-2 mb-4 mt-4">
								<label for="">Resina</label>
								<input list="rms" name="resina" class="form-control text-uppercase" required>
								<datalist id="rms">
									<?php foreach ($rms as $rm): ?>
										<option value="<?php echo $rm['NO DE RESINA'] ?>" ></option>
									<?php endforeach; ?>
								</datalist>
								<small class="text-danger">* Campo requerido</small>
							</div>

							<div class="form-group col-lg-2 mb-4 mt-4">
								<label for="">Numero de parte</label>
								<input list="parts" name="partno" class="form-control text-uppercase" required>
								<datalist id="parts">
									<?php foreach ($parts as $part): ?>
										<option value="<?php echo $part['COL 1'] ?>" ></option>
									<?php endforeach; ?>
								</datalist>
								<small class="text-danger">* Campo requerido</small>
							</div>

							<div class="form-group col-lg-4 mb-4 mt-4">
								<label for="">Descripcion de Producto</label>
								<input type="text" class="form-control flip text-uppercase" name="partno_descrip" required>
								<small class="text-danger">* Campo requerido</small>
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



									<input list="browsers" name="insert_no_1" id="insert_no_1" class="form-control text-uppercase searchable"  onchange="searchnow(1)" placeholder="NUMERO DE PARTE" required>
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

								<div class=" mb-3 col-lg-2">
									<input type="text" name="insert_pz_1" class="form-control m-input text-uppercase" placeholder="No. Piezas" autocomplete="off" required>
									<div class="input-group-append">
									</div>
								</div>

								<div class=" mb-3 col-lg-2">
									<input type="text" name="insert_position_1" class="form-control m-input text-uppercase" placeholder="Posicion" autocomplete="off" required>
									<div class="input-group-append">
									</div>
								</div>

								<div class=" mb-3 col-lg-2">
									<input type="text" name="insert_group_1" id="insert_group_1" class="form-control m-input groupclass text-uppercase" placeholder="Grupo" autocomplete="off" required>
									<div class="input-group-append">
									</div>
								</div>

								<div class=" mb-3 col-lg-2">
									<input type="text" name="insert_description_1" id="insert_description_1"  class="form-control m-input descriptionclass text-uppercase" placeholder="Descripcion" autocomplete="off">
									<div class="input-group-append">
									</div>
								</div>

								<div class="mb-3 col-lg-1">
									<button id="removeRow" type="button" class="btn btn-danger text-white">Remove</button>
								</div>

							</div>

						</div>

						<div id="newRow"></div>
						<button id="addRow" type="button" class="btn btn-info mt-5 mb-5 text-white">Agregar</button>
					</div>
				</div>

				<!--newcode-->

				<div class="form-group">
					<input style="width: 100%" type="submit" name="save_asistencia" class="btn btn-danger text-white btn-lg" value="Guardar Molde">
				</div>

				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script type='text/javascript'>

	var contador = 1

	$("#addRow").click(function () {

		contador++;
		$('#campos').val(contador);


		var html = '';
		html += '<div id="inputFormRow">';
		html += '<div class="row">';



		html += '<div class=" mb-3 col-lg-2">';
		html += '<input list="browsers" name="insert_no_'+contador+'" id="insert_no_'+contador+'" onchange="searchnow(contador)" class="form-control text-uppercase searchable" placeholder="numero de parte">';
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

		html += '<div class=" mb-3 col-lg-2">';
		html += '<input type="text" name="insert_pz_'+contador+'"  class="form-control m-input text-uppercase" placeholder="no. piezas" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2">';
		html += '<input type="text" name="insert_position_'+contador+'"  class="form-control m-input text-uppercase" placeholder="posicion" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2">';
		html += '<input type="text" name="insert_group_'+contador+'" id="insert_group_'+contador+'"  class="form-control m-input groupclass text-uppercase" placeholder="grupo" autocomplete="off">';
		html += '<div class="input-group-append">';
		html += '</div>';
		html += '</div>';


		html += '<div class=" mb-3 col-lg-2">';
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
	});

	// remove row
	$(document).on('click', '#removeRow', function () {
		contador --;
		$('#campos').val(contador);

		$(this).closest('#inputFormRow').remove();
	});


	$('#campos').val(contador);




</script>


<script>
	// baseURL variable
	var baseURL= "<?php echo base_url();?>";

	//$(document).ready(function(){
	function searchnow(param) {
		//$(".searchable").change(function () {

		//alert("flip "+param);

		//var plant_id = $(this).val();


		var plant_id = $("#insert_no_"+param).val();
		//alert(plant_id);

		// Ajax request
		$.ajax({
			url: '<?=base_url()?>index.php/Forms/get_insert_details',
			method: 'post',
			data: {plant_id: plant_id},
			dataType: 'json',
			success: function (response) {

				$.each(response, function (index, data) {

					//$(".groupclass:first").val(data['insert_id']);

					$('#insert_group_'+param).val(data['insert_group']);
					$('#insert_description_'+param).val(data['insert_description']);

					//$('#linea_id').append('<option value="' + data['linea_id'] + '">' + data['linea_nombre'] + '</option>');
				});

			}
		});


		//});
	}
	//});

</script>

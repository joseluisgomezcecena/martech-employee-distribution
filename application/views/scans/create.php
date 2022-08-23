<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h4 class="page-title">Toma de asistencia <b class="text-primary"><?php echo $location['location_name'] ?></b>.</h4>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="d-md-flex">
				<ol class="breadcrumb ms-auto">
					<li><a href="#" class="fw-normal">Asistencia.</a></li>
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

				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong class="uppercase"><bdi>Asistencia registrada!</bdi></strong>
					Se ha registrado la asistencia.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>

				<?php $this->session->flashdata('creado'); ?>


			<?php endif; ?>


			<div style="border-radius: 15px;" class="white-box analytics-info shadow">
				<?php echo form_open('scans/create') ?>

				<h3 class="box-title mb-5 text-center">Toma de asistencia a linea.</h3>

				<div class="row">
					<div class="col-lg-12">
						<?php echo validation_errors(); ?>

						<input type="hidden" name="location_id" value="<?php echo $location['location_id'] ?>">
						<div class="row">
							<div class="col-lg-12 text-center">
								<img style="width: 325px;" class="img-fluid text-center" src="<?php echo base_url() ?>assets/img/scan2.gif" alt="scan image">
							</div>
							<div style="opacity: 0;" class="col-lg-12">
								<div class="form-group">
									<label for="contador">Numero de empleado</label>
									<input  type="text" class="form-control" id="code" name="work_id" value="" autofocus >
								</div>
							</div>
						</div>

					</div>
				</div> <!--end row-->



				<div class="form-group">
					<input style="width: 100%; opacity: 0;" type="submit" name="save_asistencia" id="submitbarcode" class="btn btn-danger text-white btn-lg" value="Guardar">
				</div>

				<?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
	$(document).ready(function(){
		var interval = 1000;
		setInterval(function(){
			$("#code").val('');
		}, interval);
	})


	$('#code').keyup(function(){
		if(this.value.length <= 9){
			$('#submitbarcode').click();
		}
	});
</script>


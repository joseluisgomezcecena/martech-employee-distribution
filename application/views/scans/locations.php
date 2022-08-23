<div class="page-breadcrumb bg-white">
	<div class="row align-items-center">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h4 class="page-title">Toma de asistencia.</h4>
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
	<!-- Three charts -->
	<!-- ============================================================== -->
	<div class="row">

		<?php foreach ($locations as $location): ?>
		<div class=" col-lg-3">

			<div style="border-radius: 5%; min-height: 290px" class="card border shadow ">

				<div class="card-body">

					<h3 class="font-weight-bolder text-uppercase mb-5"><b><?php echo $location['location_name'] ?></b></h3>
					<p><?php echo $location['planner_id'] ?></p>
					<div class="text-center mt-5">
						<a href="<?php echo base_url() ?>scans/new/<?php echo $location['location_id'] ?>" class="btn btn-primary ">Seleccionar</a>
					</div>

				</div>
			</div>
		</div>
		<?php endforeach; ?>

	</div>
</div>




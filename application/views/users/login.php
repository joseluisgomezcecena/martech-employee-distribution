

<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Contenido -->
	<!-- ============================================================== -->
	<div class="justify-content-center">
		<div class="col-lg-12">
			<div class="gray-box analytics-info">
				<h3 class="box-title"></h3>

				<div class="row">

					<div class="row mt-5">
						<div class="col-lg-12 ">

							<div id="messages" class="col-lg-4 offset-lg-4 col-sm-6 offset-sm-3">
								<?php if($this->session->flashdata('login_success')): ?>

									<div class="alert alert-success alert-dismissible fade show" role="alert">
										<strong class="uppercase"><bdi>Inicio de Sesión Exitoso</bdi></strong>
										El usuario ha sido autorizado exitosamente.
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>

								<?php endif; ?>

								<?php if($this->session->flashdata('login_failed')): ?>

									<div class="alert alert-danger alert-dismissible fade show" role="alert">
										<strong class="uppercase"><bdi>Error de Autenticación</bdi></strong>
										Usuario y/o Contraseña Incorrecta.
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>

								<?php endif; ?>

								<?php echo validation_errors(); ?>

							</div>



							<div style="border-radius: 5%;" class="card border shadow col-lg-4 offset-lg-4 col-sm-8 offset-sm-2">

								<div style="background-color: transparent !important;" class="card-header font-bold">TOOLING SOFTWARE</div>

								<?php echo form_open(base_url() . 'users/login') ?>
								<div class="card-body">


									<div class="col-lg-12 mt-4">
										<label for="username">Usuario</label>
										<input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
									</div>


									<div class="col-lg-12 mb-5 mt-3">
										<label for="password">Contraseña</label>
										<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
									</div>


									<div class="col-lg-12 mb-3 mt-3">
										<button style="width:100%" class="btn btn-primary btn-block" type="submit"> <i class="fa fa-accessible-icon"></i> Iniciar Sesión</button>
									</div>
								</div>
								<?php echo form_close() ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>





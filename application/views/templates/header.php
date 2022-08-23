<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- AMPLE ADMIN BOOTSTRAP FRAMEWORK -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description"
		  content="ddTool for Martech Medical.">
	<meta name="robots" content="noindex,nofollow">

	<title>DDTool | Molding Tooling and Insert Req.</title>

	<link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>plugins/images/favicon.png">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
	<link href="<?php echo base_url() ?>assets/css/style.min.css" rel="stylesheet">


	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>


	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->

	<style>
		table{
			text-transform: uppercase;
			font-size: 12px !important;
		}

		table tbody tr{
			font-size: 12px !important;
		}

		table thead tr th{
			font-size: 12px !important;
			font-weight: bold !important;
			color: #0d6efd !important;
		}

		input{
			text-transform: uppercase;
		}

		/* Small screen devices (600px and above) */
		@media only screen and (min-width: 600px) {
			.tablet{
				display: none;
			}
		}

		/* Medium screen devices (768px and above) */
		@media only screen and (min-width: 882px) {
			.tablet{
				display: block;
			}
		}

		.circles{
			height: 35px;
			width: 35px;
			background-color: #2c92ef;
			border-radius: 50%;
			display: inline-block;
			color: #252525;
		}


		.paginate_button {
			background-color: #707cd2 !important;
			color: #fff !important;
			box-shadow: 0 4px 6px rgb(50 50 93 / 11%), 0 1px 3px rgb(0 0 0 / 8%) !important;
			display: inline-block;
			font-weight: 400;
			line-height: 1.5;
			color: #313131;
			text-align: center;
			text-decoration: none;
			vertical-align: middle;
			cursor: pointer;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
			background-color: transparent;
			border: 1px solid transparent;
			padding: 0.375rem 0.75rem !important;
			margin: 5px !important;
			font-size: 0.875rem;
			border-radius: 2px;
			-webkit-transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
			transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
			-o-transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
			transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
			transition: color 0.15s ease-in-out,background-color 0.15s ease-in-out,border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out,-webkit-box-shadow 0.15s ease-in-out;
		}

		#entries-list_info{
			font-weight: bolder;
			color: #707cd2 !important;
		}

	</style>

</head>

<body>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->

<?php
if($this->session->userdata('logged_in'))
{
	$logged = 1;
	$user_id = $this->session->userdata('user_id');
	$department = $user_id['user_department_id'];
	$department_name = $user_id['department_name'];
}
else
{
	$logged = 0;
	//die('<h1>You are not logged in</h1>');
}
?>

<div class="preloader">
	<div class="lds-ripple">
		<div class="lds-pos"></div>
		<div class="lds-pos"></div>
	</div>
</div>
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
	 data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
	<!-- ============================================================== -->
	<!-- Topbar header - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<header class="topbar" data-navbarbg="skin5">
		<nav class="navbar top-navbar navbar-expand-md navbar-dark">
			<div class="navbar-header" data-logobg="skin6">
				<!-- ============================================================== -->
				<!-- Logo -->
				<!-- ============================================================== -->
				<a class="navbar-brand" href="<?php echo base_url() ?>">
					<!-- Logo icon -->
					<b class="logo-icon">
						<!-- Dark Logo icon -->
						<img src="<?php echo base_url() ?>assets/img/logo.png" alt="homepage" class="img-fluid tablet" />
					</b>
					<!--End Logo icon -->

				</a>
				<!-- ============================================================== -->
				<!-- End Logo -->
				<!-- ============================================================== -->
				<!-- ============================================================== -->
				<!-- toggle and nav items -->
				<!-- ============================================================== -->
				<a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
				   href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
			</div>
			<!-- ============================================================== -->
			<!-- End Logo -->
			<!-- ============================================================== -->
			<div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
				<ul class="navbar-nav d-none d-md-block d-lg-none">
					<li class="nav-item">
						<a class="nav-toggler nav-link waves-effect waves-light text-white"
						   href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
					</li>
				</ul>
				<!-- ============================================================== -->
				<!-- Right side toggle and nav items -->
				<!-- ============================================================== -->
				<ul class="navbar-nav ms-auto d-flex align-items-center">

					<!-- ============================================================== -->
					<!-- Search -->
					<!-- ==============================================================
					<li class=" in">
						<form role="search" class="app-search d-none d-md-block me-3">
							<input type="text" placeholder="Search..." class="form-control mt-0">
							<a href="" class="active">
								<i class="fa fa-search"></i>
							</a>
						</form>
					</li>
					-->
					<!-- ============================================================== -->
					<!-- User profile and search -->
					<!-- ================================================================-->
					<li>
						<span style="font-size: 24px;" class="circles text-uppercase font-bold ">
							&nbsp;
							<?php
							if($logged == 1)
							{
								echo  substr($this->session->userdata('user_name'), 0, 1);
							}

							?>

						</span>

						<a class="profile-pic" href="#">


							<span class="text-white font-medium">

								<?php
								if($this->session->userdata('logged_in'))
								{
									$user_id = $this->session->userdata('user_id');
									echo $this->session->userdata('user_name');
									echo "&nbsp;|&nbsp;";
									echo $user_id['department_name'];
								}
								?>

							</span>
						</a>
					</li>

					<!-- ============================================================== -->
					<!-- User profile and search -->
					<!-- ============================================================== -->
				</ul>
			</div>
		</nav>
	</header>
	<!-- ============================================================== -->
	<!-- End Topbar header -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Left Sidebar - style you can find in sidebar.scss  -->
	<!-- ============================================================== -->
	<aside class="left-sidebar" data-sidebarbg="skin6">
		<!-- Sidebar scroll-->
		<div class="scroll-sidebar">
			<!-- Sidebar navigation-->
			<nav class="sidebar-nav">
				<ul id="sidebarnav">
					<!-- User Profile-->






					<li class="sidebar-item pt-2">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>"
						   aria-expanded="false">
							<i class="fa fa-tablet" aria-hidden="true"></i>
							<span class="hide-menu">Inicio</span>
						</a>
					</li>


					<li class="sidebar-item pt-2">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>scans/location/"
						   aria-expanded="false">
							<i class="fa fa-tablet" aria-hidden="true"></i>
							<span class="hide-menu">Toma de Asistencia</span>
						</a>
					</li>

					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url()?>reports"
						   aria-expanded="false">
							<i class="fa fa-clock" aria-hidden="true"></i>
							<span class="hide-menu">Reportes</span>
						</a>
					</li>

					<?php if($logged == 1): ?>

					<?php if($user_id['level'] == 2 || $user_id['department_name'] == 'Produccion (Moldeo)'): ?>
						<li class="sidebar-item">
							<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url()?>home_status"
							   aria-expanded="false">
								<i class="fa fa-clock" aria-hidden="true"></i>
								<span class="hide-menu">Moldeo (Status de Insertos)</span>
							</a>
						</li>
					<?php endif; ?>


					<?php if($user_id['level'] == 2 || $user_id['department_name'] == 'Produccion (Moldeo)'): ?>
					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url()?>request_mold"
						   aria-expanded="false">
							<i class="fa fa-edit" aria-hidden="true"></i>
							<span class="hide-menu">Moldeo (Req. de Insertos)</span>
						</a>
					</li>
					<?php endif; ?>




					<?php if($user_id['level'] == 2 || $user_id['department_name'] == 'Almacen (ToolCrib)'): ?>
					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>toolcrib/pending"
						   aria-expanded="false">
							<i class="fa fa-wrench" aria-hidden="true"></i>
							<span class="hide-menu">ToolCrib</span>
						</a>
					</li>
					<?php endif; ?>




					<?php if($user_id['level'] == 2 || $user_id['department_name'] == 'Ingenieria'): ?>
					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>engineering/index"
						   aria-expanded="false">
							<i class="fa fa-folder-open" aria-hidden="true"></i>
							<span class="hide-menu">Administrar SUPS (Ingenieria)</span>
						</a>
					</li>
					<?php endif; ?>




					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>reports/"
						   aria-expanded="false">
							<i class="fa  fa-file-alt" aria-hidden="true"></i>
							<span class="hide-menu">Reportes</span>
						</a>
					</li>



					<?php if($user_id['level'] == 2): ?>
					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>home_users"
						   aria-expanded="false">
							<i class="fa  fa-users" aria-hidden="true"></i>
							<span class="hide-menu">Usuarios</span>
						</a>
					</li>
					<?php endif; ?>





					<!--
					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo base_url() ?>reports/index"
						   aria-expanded="false">
							<i class="fa fa-table" aria-hidden="true"></i>
							<span class="hide-menu">Reporte de horas ganadas</span>
						</a>
					</li>
					-->
					<!--
					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="fontawesome.html"
						   aria-expanded="false">
							<i class="fa fa-font" aria-hidden="true"></i>
							<span class="hide-menu">Icon</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="map-google.html"
						   aria-expanded="false">
							<i class="fa fa-globe" aria-hidden="true"></i>
							<span class="hide-menu">Google Map</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="blank.html"
						   aria-expanded="false">
							<i class="fa fa-columns" aria-hidden="true"></i>
							<span class="hide-menu">Blank Page</span>
						</a>
					</li>
					<li class="sidebar-item">
						<a class="sidebar-link waves-effect waves-dark sidebar-link" href="404.html"
						   aria-expanded="false">
							<i class="fa fa-info-circle" aria-hidden="true"></i>
							<span class="hide-menu">Error 404</span>
						</a>
					</li>
					-->
					<li class="text-center p-20 upgrade-btn">
						<a href="<?php echo base_url() ?>users/logout"
						   class="btn d-grid btn-danger text-white" >

								<i class="fa fa-power-off"></i>
								Logout

						</a>
					</li>
					<?php endif; ?>
				</ul>

			</nav>
			<!-- End Sidebar navigation -->
		</div>
		<!-- End Sidebar scroll-->
	</aside>
	<!-- ============================================================== -->
	<!-- End Left Sidebar - style you can find in sidebar.scss  -->
	<!-- ============================================================== -->
	<!-- ============================================================== -->
	<!-- Page wrapper  -->
	<!-- ============================================================== -->
	<div class="page-wrapper" style="min-height: 250px;">

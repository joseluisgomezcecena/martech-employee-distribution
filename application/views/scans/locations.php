
<section class="breadcrumb">
	<h1>Escaneo de Gafetes</h1>
	<ul>
		<li><a href="#">Elección de Ubicación</a></li>
		<li class="divider la la-arrow-right"></li>
		<li>Escaneo de Gafetes</li>
	</ul>
</section>



<div class="grid lg:grid-cols-1 gap-5">
	<div class="grid sm:grid-cols-3 gap-5">





		<?php foreach ($locations as $location): ?>


			<div class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
				<a href="<?php echo base_url() ?>scans/new/<?php echo $location['location_id'] ?>">
					<div>
						<span class="text-primary text-5xl leading-none la la-id-card"></span>
						<p class="mt-2"><?php echo $location['location_name'] ?></p>
						<div class="text-primary mt-5 text-3xl leading-none"><?php echo $location['planner_id'] ?></div>
					</div>
				</a>
			</div>

		<?php endforeach; ?>

	</div>
</div>




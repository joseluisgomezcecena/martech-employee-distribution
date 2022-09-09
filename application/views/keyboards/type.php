
<section class="breadcrumb">
	<h1>Captura Manual de Empleados</h1>
	<ul>
		<li><a href="#">Elección de horario</a></li>
		<li class="divider la la-arrow-right"></li>
		<li>Captura Manual de Empleados</li>
	</ul>
</section>


<div class="grid lg:grid-cols-1 gap-5">
	<div class="grid lg:grid-cols-4 gap-5">


		<div class="div" data-content="">
			<div class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
				<a href="<?php echo base_url() ?>keyboards/location/regular">
					<div>
						<span class="text-primary text-5xl leading-none la la-id-card"></span>
						<p class="mt-2">Horario Normal</p>
						<div class="text-dark mt-5 text-xl leading-none">Para 1er, 2do y 3er turno.</div>
					</div>
				</a>
			</div>
		</div>



		<div class="div" data-content="">
			<div class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
				<a href="<?php echo base_url() ?>keyboards/location/rotating">
					<div>
						<span class="text-primary text-5xl leading-none la la-id-card"></span>
						<p class="mt-2">Horario 3 X 4</p>
						<div class="text-dark mt-5 text-xl leading-none">Para Horarios 3 x 4.</div>
					</div>
				</a>
			</div>
		</div>




		<div class="div" data-content="">
			<div class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
				<a href="<?php echo base_url() ?>keyboards/location/overtime">
					<div>
						<span class="text-primary text-5xl leading-none la la-id-card"></span>
						<p class="mt-2">Tiempo Extra</p>
						<div class="text-dark mt-5 text-xl leading-none">Para Tiempos Extra.</div>
					</div>
				</a>
			</div>
		</div>



		<div class="div" data-content="">
			<div class="card px-4 py-8 flex justify-center items-center text-center lg:transform hover:scale-110 hover:shadow-lg transition-transform duration-200">
				<a href="<?php echo base_url() ?>keyboards/location/weekend">
					<div>
						<span class="text-primary text-5xl leading-none la la-id-card"></span>
						<p class="mt-2">Fin de Semana</p>
						<div class="text-dark mt-5 text-xl leading-none">Para Fines de Semana.</div>
					</div>
				</a>
			</div>
		</div>




	</div>
</div>

<!--
<script
		src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>
-->
<script src="<?php echo base_url() ?>assets/datatables/jquery.js"></script>

<script>
	function filterTextInput()
	{
		var input, radios, radio_filter, text_filter, td0, i, divList;
		input = document.getElementById("myInput");
		text_filter = input.value.toUpperCase();
		divList = $(".div");

		// Loop through all table rows, and hide those who don't match the search query
		for (i = 0; i < divList.length; i++)
		{
			td0 = divList[i].getAttribute('data-content');
			if (td0)
			{
				if (td0.toUpperCase().indexOf(text_filter) > -1) {
					divList[i].style.display = "";
				}
				else
				{
					divList[i].style.display = "none";
				}
			}
		}
	}
</script>



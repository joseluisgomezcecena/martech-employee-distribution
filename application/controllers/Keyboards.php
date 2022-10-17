<?php

class Keyboards extends CI_Controller {


	public function create($location = NULL, $type = NULL)
	{
		$data['title'] = 'Crear nuevo request';
		$data['employees'] = $this->ReportModel->get_employees();
		$data['location_id'] = $location;
		$data['type'] = $type;
		$data['location'] = $this->ScanModel->get_single_location($location);
		$shift = $data['shift'] = $this->ShiftModel->get_shift(date('H:i:s'), $type); //send shift to create function.
		//$shift = $data['shift'] = $this->ShiftModel->get_shift(date('23:59:25'), $type); //test send shift to create function.

		$this->form_validation->set_rules('work_id', 'Numero de empleado', 'required');
		$this->form_validation->set_rules('date', 'Fecha y Hora', 'required');



		//error styles.
		$this->form_validation->set_error_delimiters(
			'<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong class="uppercase"><bdi>Error</bdi></strong> &nbsp;',
			'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
		);


		if($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('templates/sidebar');
			$this->load->view('templates/workspace_start');
			$this->load->view('keyboards/create', $data);
			$this->load->view('templates/footer');
		}
		else
		{
			$shift_excel = $data['shift_excel'] = $this->ShiftModel->get_shift_excel(date('H:i:s'));

			$found = $this->KeyBoardModel->create($shift, $shift_excel, $type);




			if($found == "notfound")
			{
				$notes = "<br><span style='color:#f13c3c; font-weight: bolder'>NO SE ENCONTRO EN TEMPUS, VERIFIQUE EL NUMERO DE EMPLEADO Y RECUERDE CHECAR ENTRADAS Y SALIDAS DE PLANNING GROUP</span>.";
			}else{
				$notes = "";
			}
			//session message
			$this->session->set_flashdata('creado', '<br> Se ha registrado el empleado: ' . $this->input->post('work_id') . $notes);
			redirect(base_url() . 'keyboards/new/' . $location . '/' . $type);
		}
	}





	public function location($type = NULL)
	{
		$data['title'] = 'Locations';
		$data['locations'] = $this->ScanModel->get_locations();
		$data['type'] = $type;

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('keyboards/locations', $data);
		$this->load->view('templates/footer');
	}




	public function type()
	{
		$data['title'] = 'Type of registration.';


		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('keyboards/type', $data);
		$this->load->view('templates/footer');
	}





}

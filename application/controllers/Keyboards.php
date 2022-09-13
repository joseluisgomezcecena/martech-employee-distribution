<?php

class Keyboards extends CI_Controller {


	public function create($location = NULL, $type = NULL)
	{
		$data['title'] = 'Crear nuevo request';
		$data['location_id'] = $location;
		$data['type'] = $type;
		$data['location'] = $this->ScanModel->get_single_location($location);
		$shift = $data['shift'] = $this->ScanModel->get_shift(date('H:i:s'), $type);

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
			$this->KeyBoardModel->create($shift);

			//session message
			$this->session->set_flashdata('creado', '<br> Se ha registrado el empleado: ' . $this->input->post('work_id'));
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

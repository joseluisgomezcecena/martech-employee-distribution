<?php

class Records extends CI_Controller{

	public function index()
	{
		$data['title'] = "Registros";
		$data['scans'] = $this->ReportModel->get_scans();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('records/index', $data); //loading page and data
		$this->load->view('templates/footer');
	}


	public function edit($id = NULL)
	{
		$data['title'] = "Editar Registro";
		$data['scan'] = $this->RecordModel->get_record($id);

		if(empty($data['scan']))
		{
			show_404();
		}



		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('records/edit', $data); //loading page and data
		$this->load->view('templates/footer');
	}




}

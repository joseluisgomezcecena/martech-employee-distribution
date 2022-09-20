<?php

class Records extends CI_Controller{

	public function index()
	{
		$data['title'] = "Registros";
		$data['scans'] = $this->ReportModel->get_scans();
		$data['groups'] = $this->ReportModel->get_scans_by_location();
		$data['employees'] = $this->ReportModel->get_scans_by_location_employee();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('records/index', $data); //loading page and data
		$this->load->view('templates/footer');
	}




}

<?php

class Pages extends CI_Controller
{
	public function view($page = 'home')
	{
		if(!file_exists(APPPATH . 'views/pages/' . $page . '.php'))
		{
			show_404();
		}

		$data['title'] = ucfirst($page);
		//$data['sups'] = $this->SupModel->get_sups();
		//$data['requests'] = $this->ToolCribModel->get_pending_requests();


		//load header, page & footer
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('templates/workspace_start');
		$this->load->view('pages/' . $page, $data); //loading page and data
		$this->load->view('templates/footer');
	}





}

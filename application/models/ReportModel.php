<?php

class ReportModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}




	//reports
	public function get_scans()
	{
		if($this->input->post('date_start'))
		{
			$start_date = $this->input->post('date_start');
			$end_date = $this->input->post('date_end');
			$this->db->where('created_at >=', $start_date . " 00:00:00");
			$this->db->where('created_at <=', $end_date . " 23:59:59");
		}
		else
		{
			$today = date('Y-m-d');
			$this->db->where('created_at >=', $today . " 00:00:00");
			$this->db->where('created_at <=', $today . " 23:59:59");
		}


		$this->db->order_by('id', 'DESC');
		$this->db->select('*');
		$this->db->from('scans');
		$this->db->join('locations', 'scans.location = locations.location_id', 'left');
		$query = $this->db->get();

		//$lastone = $this->db->last_query();
		//print_r($lastone);

		return $query->result_array();
	}



	//reports
	public function get_scans_by_location()
	{
		//SELECT COUNT(id) as cuenta,locations.location_name,type FROM `scans`
		// left join locations on scans.location = locations.location_id GROUP by locations.location_name;
		if($this->input->post('date_start'))
		{
			$start_date = $this->input->post('date_start');
			$end_date = $this->input->post('date_end');
			$this->db->where('created_at >=', $start_date . " 00:00:00");
			$this->db->where('created_at <=', $end_date . " 23:59:59");
		}
		else
		{
			$today = date('Y-m-d');
			$this->db->where('created_at >=', $today . " 00:00:00");
			$this->db->where('created_at <=', $today . " 23:59:59");
		}



		$this->db->select('COUNT(id) as cuenta,locations.location_name,type');
		$this->db->from('scans');
		$this->db->join('locations', 'scans.location = locations.location_id', 'left');
		$this->db->group_by('locations.location_name');
		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		//print_r($last_query);

		return $query->result_array();
	}






	public function get_scans_by_location_employee()
	{
		//SELECT COUNT(id) as cuenta,locations.location_name,type FROM `scans`
		// left join locations on scans.location = locations.location_id GROUP by locations.location_name;
		if($this->input->post('date_start'))
		{
			$start_date = $this->input->post('date_start');
			$end_date = $this->input->post('date_end');
			$this->db->where('created_at >=', $start_date . " 00:00:00");
			$this->db->where('created_at <=', $end_date . " 23:59:59");
		}
		else
		{
			$today = date('Y-m-d');
			$this->db->where('created_at >=', $today . " 00:00:00");
			$this->db->where('created_at <=', $today . " 23:59:59");
		}



		$this->db->select('COUNT(id) as cuenta,locations.location_name,type');
		$this->db->from('scans');
		$this->db->join('locations', 'scans.location = locations.location_id', 'left');
		$this->db->where('mod(type,2) <> ', 0);
		$this->db->group_by('locations.location_name');
		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		//print_r($last_query);

		return $query->result_array();
	}




	public function get_hours(){

		$data = array();
		$data2 = array();


		if($this->input->post('date_start'))
		{
			$start_date = $this->input->post('date_start');
			$end_date = $this->input->post('date_end');
			$this->db->where('created_at >=', $start_date . " 00:00:00");
			$this->db->where('created_at <=', $end_date . " 23:59:59");
		}
		else
		{
			$today = date('Y-m-d');
			$this->db->where('created_at >=', $today . " 00:00:00");
			$this->db->where('created_at <=', $today . " 23:59:59");
		}



		$this->db->select('COUNT(id) as cuenta,locations.location_name,type,emp_number');
		$this->db->from('scans');
		$this->db->join('locations', 'scans.location = locations.location_id', 'left');
		$this->db->group_by('locations.location_name');
		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		//print_r($last_query);

		//return $query->result_array();

		foreach ($query->result_array() as $row)
		{
			$data[$row['location_name']] = $row['cuenta'];
		}

	}



}

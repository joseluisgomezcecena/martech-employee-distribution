<?php

class ScanModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function create()
	{
		$emp_number = $this->input->post('work_id');
		$date = date('Y-m-d');

		$this->db->order_by('id', 'DESC');
		$this->db->select('*');
		$this->db->from('scans');
		$this->db->where('emp_number', $emp_number);
		$this->db->where('created_at >=', $date . " 00:00:00");
		$this->db->where('created_at <=', $date . " 23:59:59");
		$this->db->limit(1);

		$query = $this->db->get();
		$data_result =  $query->row_array();
		$type = $data_result['type'] + 1;

		$data = array(
			'emp_number' => $this->input->post('work_id'),
			'location' => $this->input->post('location_id'),
			'created_at' => date('Y-m-d H:i:s'),
			'type' => $type,
		);
		return $id = $this->db->insert('scans', $data);

	}



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
		$this->db->where('mod(type,2) <> 0;');
		$this->db->group_by('locations.location_name');
		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		//print_r($last_query);

		return $query->result_array();
	}







	public function get_locations()
	{
		$this->db->order_by('location_id', 'DESC');
		$this->db->select('*');
		$this->db->from('locations');
		$query = $this->db->get();
		return $query->result_array();
	}




	public function get_single_location($location)
	{
		$this->db->select('*');
		$this->db->from('locations');
		$this->db->where('location_id', $location);
		$query = $this->db->get();

		//$last_query = $this->db->last_query();
		//print_r($last_query);

		return $query->row_array();
	}





	public function check_work_id_exists($work_id)
	{
		$date = date('Y-m-d');

		$this->db->select('*');
		$this->db->where('created_at >=', $date . " 00:00:00");
		$this->db->where('created_at <=', $date . " 23:59:59");
		$this->db->where('emp_number', $work_id);
		$query = $this->db->get('scans');

		if(empty($query->row_array()))
		{
			return true;
		}
		else
		{
			return false;
		}
	}








}

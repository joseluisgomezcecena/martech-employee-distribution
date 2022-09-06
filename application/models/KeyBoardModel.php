<?php

class KeyBoardModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function create()
	{

		//$shift = $this->get_shift(date('H:i:s'));

		$emp_number = $this->input->post('work_id');
		$date_time = $this->input->post('date');
		$date = date('Y-m-d', strtotime($date_time));

		$shift = $this->get_shift(date('H:i:s', strtotime($date_time)));

		if($shift == 1)
		{
			$end = '15:36:00';
		}
		elseif($shift == 2)
		{
			$end = '23:30:00';
		}
		else
		{
			$end = '05:59:59';
		}



		//$date = date('Y-m-d');

		$this->db->order_by('id', 'DESC');
		$this->db->select('*');
		$this->db->from('scans');
		$this->db->where('emp_number', $emp_number);
		$this->db->where('created_at >=', $date . " 00:00:00");
		$this->db->where('created_at <=', $date . " 23:59:59");
		$this->db->limit(1);

		$query = $this->db->get();

		if($query->num_rows() > 0)
		{
			$data_result =  $query->row_array();
			$id = $data_result['id'];
			$check_in = $data_result['check_in'];

			$t1 = strtotime($check_in);
			$t2 = strtotime($date_time);
			$diff = $t2 - $t1;
			$hours = $diff / ( 60 * 60 );

			//updating the record for checkout before checking in.
			$data_update = array(
				'check_out' => $date_time,
				'hours_worked' => $hours,
				'type' => 2,
			);
			$this->db->update('scans', $data_update, array('id' => $id));



			//checking in to the new location.
			$t1 = strtotime($date_time);
			$t2 = strtotime($date . ' '. $end);
			$diff = $t2 - $t1;
			$hours = $diff / ( 60 * 60 );

			$data = array(
				'emp_number' => $this->input->post('work_id'),
				'location' => $this->input->post('location_id'),
				'check_in' => $date_time,
				'check_out' => $date . ' '. $end,
				'type' => 1,
				'hours_worked' => $hours,
			);


		}
		else
		{
			//checking in to the new location if there were no previous records.
			$t1 = strtotime($date_time);
			$t2 = strtotime($date . ' '. $end);
			$diff = $t2 - $t1;
			$hours = $diff / ( 60 * 60 );

			$data = array(
				'emp_number' => $this->input->post('work_id'),
				'location' => $this->input->post('location_id'),
				'check_in' => $date_time,
				'check_out' => $date . ' '. $end,
				'type' => 1,
				'hours_worked' => $hours,
			);
		}

		return $id = $this->db->insert('scans', $data);

	}






	public function get_shift($date){

		if($date > date('H:i:s', strtotime('06:00:00')) && $date <= date('H:i:s', strtotime('15:36:00'))){
			$shift = 1;
		}
		elseif($date > date('H:i:s', strtotime('15:36:00')) && $date <= date('H:i:s', strtotime('23:35:00'))){
			$shift = 2;
		}
		else
		{
			$shift = 3;
		}
		return $shift;
	}


	/*
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

	*/














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

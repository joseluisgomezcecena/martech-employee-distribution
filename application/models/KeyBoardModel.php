<?php

class KeyBoardModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function create()
	{
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









}

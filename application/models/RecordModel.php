<?php

class RecordModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}


	public function get_record($id)
	{
		$query = $this->db->get_where('scans', array('id' => $id));
		return $query->row_array();
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




}

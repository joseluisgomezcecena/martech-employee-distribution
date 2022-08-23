<?php

class ReportModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_completed_requests()
	{
		//$this->db->select('*');
		$this->db->select('request_id, sup, location, sup_requests.created_at, ready_at, pickup_by, delivered_by, status, id, partno, partno_descrip, boy_sup, maquina, resina, revision');
		$this->db->from('sup_requests');
		$this->db->join('sup', 'sup.id = sup_requests.sup', 'left');
		$this->db->where('status','=2');
		$query = $this->db->get();

		//#$lastone = $this->db->last_query();
		//#print_r($lastone);

		return $query->result_array();

	}
}

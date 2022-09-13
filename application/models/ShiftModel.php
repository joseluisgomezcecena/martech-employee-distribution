<?php

class ShiftModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_shift($date, $type){

		switch ($type){
			case 'regular':
				if
				(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('15:36:00'))
				)
				{
					$shift = "reg1";
				}
				elseif
				(
					$date > date('H:i:s', strtotime('15:36:00'))
					&& $date <= date('H:i:s', strtotime('23:35:00'))
				)
				{
					$shift = "reg2";
				}
				else
				{
					$shift = "reg3";
				}
				break;

			case 'rotating':
				if(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('18:00:00'))
				)
				{
					$shift = "rot1";
				}
				else
				{
					$shift = "rot2";
				}
				break;

			case 'overtime':
				$shift = "ot1";
				break;

			case 'weekend':
				if(
					$date > date('H:i:s', strtotime('06:00:00')) &&
					$date <= date('H:i:s', strtotime('15:36:00'))
				)
				{
					$shift = "w1";
				}
				elseif(
					$date > date('H:i:s', strtotime('15:36:00')) &&
					$date <= date('H:i:s', strtotime('23:35:00'))
				)
				{
					$shift = "w2";
				}
				else
				{
					$shift = "w3";
				}
				break;


			default:
				$shift = 'N/A';
				break;

		}

		return array(
			'shift' => $shift,//'reg1',reg2,reg3,rot1,rot2,ot1,w1,w2,w3
			'type' => $type, //regular, rotating, overtime, weekend
		);

	}


}

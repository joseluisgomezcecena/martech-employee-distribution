<?php

class ShiftModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_shift($date, $type){

		//$day = date("Y-m-d");
		$day = date("2022-09-15");

		switch ($type){
			case 'regular':
				if
				(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('15:36:00'))
				)
				{
					$shift = "reg1";
					$end = '15:36:00';
				}
				elseif
				(
					$date > date('H:i:s', strtotime('15:36:00'))
					&& $date <= date('H:i:s', strtotime('23:35:59'))
				)
				{
					$shift = "reg2";
					$end = '23:35:59';
				}
				else
				{
					$shift = "reg3";
					$end = '05:59:59';
					$day = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
				}
				break;


			case 'rotating':
				if(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('18:00:00'))
				)
				{
					$shift = "rot1";
					$end = '18:00:00';
				}
				else
				{
					$shift = "rot2";
					$end = '05:59:59';
					if(
						$date >= date('H:i:s', strtotime('18:00:01'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
					}

					//$day = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
				}
				break;


			case 'overtime':
				$shift = "ot1";
				$end = '00:00:00';
				break;


			case 'weekend':
				if(
					$date > date('H:i:s', strtotime('06:00:00')) &&
					$date <= date('H:i:s', strtotime('15:36:00'))
				)
				{
					$shift = "w1";
					$end = '15:36:00';
				}
				elseif(
					$date > date('H:i:s', strtotime('15:36:00')) &&
					$date <= date('H:i:s', strtotime('23:35:00'))
				)
				{
					$shift = "w2";
					$end = '23:35:00';
				}
				else
				{
					$shift = "w3";
					$end = '05:59:59';
				}
				break;


			default:
				$shift = 'N/A';
				$end = 'N/A';
				break;

		}

		return array(
			'shift' => $shift,//'reg1',reg2,reg3,rot1,rot2,ot1,w1,w2,w3
			'type' => $type, //regular, rotating, overtime, weekend
			'end' => $end, //end of shift
			'day' => $day //day of shift
		);

	}


}

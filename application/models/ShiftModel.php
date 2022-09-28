<?php

class ShiftModel extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_shift($date, $type){

		$day = date("Y-m-d");
		$day_end = date("Y-m-d"); //code review result.
		//$day = date("2022-09-15"); //test

		switch ($type){
			case 'regular':
				if
				(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('15:36:00'))
				)
				{
					$shift = "reg1";
					$start = "06:00:00";
					$end = '15:36:00';
				}
				elseif
				(
					/*
					$date > date('H:i:s', strtotime('15:36:00'))
					&& $date <= date('H:i:s', strtotime('23:35:59'))
					*/
					$date > date('H:i:s', strtotime('15:36:00'))
					&& $date <= date('H:i:s', strtotime('23:53:59'))
				)
				{
					$shift = "reg2";
					$start = "15:36:00";
					$end = '23:53:59';
				}
				else
				{
					$shift = "reg3";
					$start = "23:00:00";
					$end = '05:59:59';

					if(
						/*
						$date >= date('H:i:s', strtotime('23:36:00'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
						*/
						$date >= date('H:i:s', strtotime('23:00:00'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
					}

				}
				break;


			case 'rotating':
				if(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('18:00:00'))
				)
				{

					$shift = "rot1";
					$start = '06:00:00';
					$end = '18:00:00';
				}
				else
				{
					$shift = "rot2";
					$start = '18:00:00';
					$end = '05:59:59';

					if(
						$date >= date('H:i:s', strtotime('18:00:01'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')); //changed to day end as result of code review.
					}

					//$day = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
				}
				break;


			case 'overtime':
				$shift = "ot1";
				$start = '00:00:00';
				$end = '23:59:59';
				break;


			case 'weekend':
				if(
					$date > date('H:i:s', strtotime('06:00:00'))
					&& $date <= date('H:i:s', strtotime('18:00:00'))
				)
				{

					$shift = "w1";
					$start = '06:00:00';
					$end = '18:00:00';
				}
				else
				{
					$shift = "w2";
					$start = '18:00:00';
					$end = '05:59:59';

					if(
						$date >= date('H:i:s', strtotime('18:00:01'))
						&& $date <= date('H:i:s', strtotime('23:59:59'))
					)
					{
						$day_end = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day')); //changed to day end as result of code review.
					}

					//$day = date('Y-m-d', strtotime(date('Y-m-d') . ' +1 day'));
				}
				break;


			default:
				$shift = 'N/A';
				$start = '00:00:00';
				$end = '00:00:00';
				//$end = 'N/A'; changed to 00:00:00 as result of code review.
				break;

		}

		return array(
			'shift' => $shift,//'reg1',reg2,reg3,rot1,rot2,ot1,w1,w2,w3
			'type' => $type, //regular, rotating, overtime, weekend
			'start' => $start, //start of shift time
			'end' => $end, //end of shift time
			'day' => $day, //day of shift
			'day_end'=> $day_end, //day of shift end
			'hours'=> $date //in H:i:s format
		);

	}

}


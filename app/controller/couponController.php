<?php

class couponController extends appController 
{
	public $models = array('coupon', 'bid');
	
	function index() {
		if (!empty($_POST)) {
			$coupon = $this->coupon->getByCode(strtoupper(tools::filter($_POST['code'])));
			if (!empty($coupon)) {
				if (!$this->coupon->checkIsSubmitted($coupon['id'], $userID)) {
					tools::setFlash($this->l('Coupon already submitted'), 'error');
					tools::redirect('/account');
				} elseif ($this->coupon->checkNbSubmitted($coupon['id']) >= $coupon['nb_limit'] && $coupon['nb_limit'] > 0) {
					tools::setFlash($this->l('Validated coupons reached limit'), 'error');
					tools::redirect('/account');
				} else {
					$now = time();
					if ($coupon['type'] == 3) {
						if ($now >= strtotime($coupon['date_start']) && $now <= strtotime($coupon['date_end'])) {
							$this->bid->add(array(
								'user_id' => $userID,
								'description' => $this->l('Free bids with coupon'),
								'credit' => $coupon['saving']
							));
							$this->coupon->addSubmitted($coupon['id'], $userID);
							unlink(_DIR_ .'/cache/bids_balance_'.$userID);
							tools::setFlash($this->l('Bids added to your account'), 'success');
							tools::redirect('/account');
						} else {
							tools::setFlash($this->l('Coupon outdated'), 'error');
							tools::redirect('/account');
						}
					} else {
						if ($now >= strtotime($coupon['date_start']) && $now <= strtotime($coupon['date_end'])) {
							$_SESSION['coupon_id'] = $coupon['id'];
							tools::setFlash($this->l('Coupon added'), 'success');
							tools::redirect('/packages');
						} else {
							tools::setFlash($this->l('Coupon outdated'), 'error');
							tools::redirect('/account');
						}
					}
				}
			} else {
				tools::setFlash(ERROR_COUPON, 'error');
				tools::redirect('/account');
			}
		}
	}
	
	function admin_index() {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toInsert = array(
				'code' => $data['code'],
				'saving' => $data['saving'],
				'type' => $data['type'],
				'description' => $data['description'],
				'date_start' => $data['start_time_year']."-".$data['start_time_month']."-".$data['start_time_day']." ".$data['start_time_hour'].":".$data['start_time_min'].":".$data['start_time_sec'],
				'date_end' => $data['end_time_year']."-".$data['end_time_month']."-".$data['end_time_day']." ".$data['end_time_hour'].":".$data['end_time_min'].":".$data['end_time_sec'],
				'limit' => $data['limit']
			);
			
			if ($this->coupon->add($toInsert)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/coupon');
		}
		
		$datenow = array(
			'hour' => date("H"),
			'minute' => date("i"),
			'second' => date("s"),
			'day' => date("d"),
			'month' => date("m"),
			'year' => date("Y")
		);
		
		$seconds = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$minutes = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$hours = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
		$days = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
		$years = array("2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024", "2025");
		
		$this->smarty->assign(array(
			'coupons' => $this->coupon->getAll(),
			'datenow' => $datenow,
			'seconds' => $seconds,
			'minutes' => $minutes,
			'hours' => $hours,
			'days' => $days,
			'years' => $years
		));
		$this->smarty->display('admin/settings/coupons.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toUpdate = array(
				'code' => $data['code'],
				'saving' => $data['saving'],
				'type' => $data['type'],
				'description' => $data['description'],
				'date_start' => $data['start_time_year']."-".$data['start_time_month']."-".$data['start_time_day']." ".$data['start_time_hour'].":".$data['start_time_min'].":".$data['start_time_sec'],
				'date_end' => $data['end_time_year']."-".$data['end_time_month']."-".$data['end_time_day']." ".$data['end_time_hour'].":".$data['end_time_min'].":".$data['end_time_sec'],
				'limit' => $data['limit']
			);
			
			if ($this->coupon->update((int)$id, $toUpdate)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/coupon');
		}
		
		$coupon = $this->coupon->getByID((int)$id);
		
		$time_data = array();
		$start_time_explode = explode(" ", $coupon['date_start']);
		$ymd_explode = explode("-", $start_time_explode[0]);
		$time_data['start_year'] = $ymd_explode[0];
		$time_data['start_month'] = $ymd_explode[1];
		$time_data['start_day'] = $ymd_explode[2];
		$hms_explode = explode(":", $start_time_explode[1]);
		$time_data['start_hour'] = $hms_explode[0];
		$time_data['start_minute'] = $hms_explode[1];
		$time_data['start_second'] = $hms_explode[2];
		
		$end_time_explode = explode(" ", $coupon['date_end']);
		$ymd_explode = explode("-", $end_time_explode[0]);
		$time_data['end_year'] = $ymd_explode[0];
		$time_data['end_month'] = $ymd_explode[1];
		$time_data['end_day'] = $ymd_explode[2];
		$hms_explode = explode(":", $end_time_explode[1]);
		$time_data['end_hour'] = $hms_explode[0];
		$time_data['end_minute'] = $hms_explode[1];
		$time_data['end_second'] = $hms_explode[2];
		
		$seconds = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$minutes = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$hours = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
		$days = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
		$years = array("2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024", "2025");
		
		$this->smarty->assign(array(
			'coupon' => $coupon,
			'time_data' => $time_data,
			'seconds' => $seconds,
			'minutes' => $minutes,
			'hours' => $hours,
			'days' => $days,
			'years' => $years
		));
		$this->smarty->display('admin/settings/edit_coupon.tpl');
	}
	
	function admin_delete($id) {
		if ($this->coupon->delete((int)$id)) tools::setFlash($this->l('Request processed'), 'success');
		else tools::setFlash($this->l('An error has occurred'), 'error');
		tools::redirect('/admin/coupon');
	}
}
?>
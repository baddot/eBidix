<?php

Class coupon
{
	public function getByID($id) {
		return Database::getInstance()->select('fetch', 'coupons', '*', array('id' => (int)$id));
	}
	
	public function getByCode($code) {
		return Database::getInstance()->select('fetch', 'coupons', '*', array('code' => $code));
	}
	
	public function checkIsSubmitted($id) {
		return Database::getInstance()->select('fetch', 'coupons_submitted', 'id', array('coupon_id' => $id));
	}
	
	public function checkNbSubmitted($id) {
		return Database::getInstance()->select('fetch', 'coupons_submitted', 'count(id) as count', array('coupon_id' => $id));
	}
	
	public function getAll() {
		$coupons_data = Database::getInstance()->select('fetchAll', 'coupons');
		$coupons = array();
		$i=0;
		foreach($coupons_data as $coupon) {
			$coupons[$i]['id'] = $coupon['id'];
			$coupons[$i]['code'] = $coupon['code'];
			$coupons[$i]['saving'] = $coupon['saving'];
			$coupons[$i]['type'] = $coupon['type'];
			$coupons[$i]['description'] = substr($coupon['description'], 0, 15);
			$coupons[$i]['date_start'] = $coupon['date_start'];
			$coupons[$i]['date_end'] = $coupon['date_end'];
			$coupons[$i]['nb_limit'] = $coupon['nb_limit'];
			$return = Database::getInstance()->select('fetch', 'coupons_submitted', 'count(id) as total', array('coupon_id' => $coupon['id']));
			$coupons[$i]['return'] = $return['total'];
			$i++;
		}
		return $coupons;
	}
	
	public function addSubmitted($id, $userID) {
		return Database::getInstance()->insert('coupons_submitted', array('coupon_id' => $id , 'user_id' => $userID));
	}
	
	public function update($id, $values) {
		return Database::getInstance()->update('coupons', $values, array('id' => (int)$id));
	}
	
	public function delete($id) {
		return Database::getInstance()->delete('coupons', array('id' => (int)$id));
	}
}

?>
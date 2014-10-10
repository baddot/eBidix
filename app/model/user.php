<?php

Class user
{	
	public function add($values) {
		return Database::getInstance()->insert('users', $values);
	}
	
	public function update($id, $values) {
		return Database::getInstance()->update('users', $values, array('id' => (int)$id));
	}
	
	public function addReferral($values) {
		return Database::getInstance()->insert('referrals', $values);
	}
	
	public function logAccess($values) {
		return Database::getInstance()->insert('connections', array('user_id' => $_SESSION['user_id'], 'ip' => $_SERVER['REMOTE_ADDR']));
	}
	
	public function getById($id) {
		return Database::getInstance()->select('fetch', 'users', '*', array('id' => (int)$id));
	}
	
	public function getByUsername($username) {
		return Database::getInstance()->select('fetch', 'users', array('id', 'username', 'firstname', 'ppasswd', 'admin', 'active'), array('username' => $username));
	}
	
	public function getByName($name) {
		return Database::getInstance()->select('fetch', 'users', array('id', 'username', 'firstname', 'admin', 'active'), array('lastname' => $name));
	}
	
	public function getByEmail($email) {
		return Database::getInstance()->select('fetch', 'users', array('id', 'username', 'email'), array('email' => $email));
	}
	
	public function getByKey($key) {
		return Database::getInstance()->select('fetch', 'users', array('id', 'username'), array('validation_key' => $key));
	}
	
	public function getPassword($username) {
		$row = Database::getInstance()->select('fetch', 'users', array('ppasswd'), array('username' => $username));
		return $row['ppasswd'];
	}
	
	public function getReferrer($id) {
		$row = Database::getInstance()->select('fetch', 'referrals', 'referrer_id', array('user_id' => $id));
		return $row['referrer_id'];
	}
	
	public function getExtends() {
		return Database::getInstance()->select('fetchAll', 'users', array('id', 'username', 'active'), array('autobidder' => 1));
	}
	
	public function checkStatus($userID, $status) {
		$check = Database::getInstance()->select('fetch', 'auctions', 'id', array('winner_id' => (int)$userID, 'status_id' => (int)$status));
		return ($check) ? true : false;
	}
	
	public function checkPackages($userID) {
		$check = Database::getInstance()->select('fetch', 'bids', 'id', "user_id = {$userID} description LIKE 'package#%'");
		return ($check) ? true : false;
	}
	
	public function checkAddress($userID) {
		$check = Database::getInstance()->select('fetch', 'addresses', 'id', array('user_id' => (int)$userID));
		return ($check) ? true : false;
	}
	
	public function checkMessages($userID) {
		$check = Database::getInstance()->select('fetch', 'messages', 'id', array('receiver_id' => (int)$userID, 'open' => 0));
		return ($check) ? true : false;
	}
}
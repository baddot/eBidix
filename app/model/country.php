<?php

Class country
{
	public function getByID($id) {
		return Database::getInstance()->select('fetch', 'countries', '*', array('id' => $id));
	}
	
	public function getAll() {
		return Database::getInstance()->select('fetchAll', 'countries', array('id', 'name', 'code'));
	}
	
	public function add($values) {
		return Database::getInstance()->insert('countries', $values);
	}
	
	public function update($id, $values) {
		return Database::getInstance()->update('countries', $values, array('id' => $id));
	}
	
	public function delete($id) {
		return Database::getInstance()->delete('countries', array('id' => $id));
	}
}

?>
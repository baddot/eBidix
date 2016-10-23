<?php

Class category
{
	public function getByID($id) {
		return Database::getInstance()->select('fetch', 'categories', '*', array('id' => $id));
	}
	
	public function getAll() {
		return Database::getInstance()->select('fetchAll', 'categories', array('id', 'name'));
	}
	
	public function add($values) {
		return Database::getInstance()->insert('categories', $values);
	}
	
	public function update($id, $values) {
		return Database::getInstance()->update('categories', $values, array('id' => $id));
	}
	
	public function delete($id) {
		return Database::getInstance()->delete('categories', array('id' => $id));
	}
}

?>
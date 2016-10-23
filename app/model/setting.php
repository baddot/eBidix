<?php

Class setting
{
	public function getAll() {
		return Database::getInstance()->select('fetchAll', 'settings', '*');
	}
	
	public function getByName($name) {
		$row = Database::getInstance()->select('fetch', 'settings', array('value'), array('name' => $name));
		return $row['value'];
	}
	
	public function getById($id) {
		return Database::getInstance()->select('fetch', 'settings', '*', array('id' => $id));
	}
	
	public function update($id, $values) {
		return Database::getInstance()->update('settings', $values, array('id' => (int)$id));
	}
	
	public function delete($id) {
		return Database::getInstance()->delete('settings', array('id' => (int)$id));
	}
}

?>
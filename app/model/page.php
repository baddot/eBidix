<?php

Class page
{
	public function add($values) {
		return Database::getInstance()->insert('pages', $values);
	}
	
	public function getByName($name) {
		$row = Database::getInstance()->select('fetch', 'pages', array('title', 'content'), array('name' => $name));
		foreach($row as $key => $value) {
			$row[$key] = html_entity_decode($value, ENT_QUOTES, 'UTF-8');
		}
		return $row;
	}
	
	public function getByID($id) {
		return Database::getInstance()->select('fetch', 'pages', '*', array('id' => $id));
	}
	
	public function getAll() {
		return Database::getInstance()->select('fetchAll', array('pages'));
	}
	
	public function update($id, $values) {
		return Database::getInstance()->update('pages', $values, array('id' => (int)$id));
	}
	
	public function delete($id) {
		return Database::getInstance()->delete('pages', array('id' => (int)$id));
	}
}

?>
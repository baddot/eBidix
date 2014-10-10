<?php

Class advert
{
	public function getByID($id) {
		return Database::getInstance()->select('fetch', 'adverts', '*', array('id' => (int)$id));
	}
	
	public function getAll() {
		return Database::getInstance()->select('fetchAll', 'adverts');
	}
	
	public function update($id, $values) {
		return Database::getInstance()->update('adverts', $values, array('id' => (int)$id));
	}
	
	public function delete($id) {
		return Database::getInstance()->delete('adverts', array('id' => (int)$id));
	}
	
	public function getContent($id) {
		$row = Database::getInstance()->select('fetch', 'adverts', array('active, content'), array('id' => $id));
		$row['content'] = html_entity_decode($row['content'], ENT_QUOTES, 'UTF-8');
		return $row;
	}
}
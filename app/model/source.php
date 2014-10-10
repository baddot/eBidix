<?php

Class source
{
	public function getAll() {
		return Database::getInstance()->select('fetchAll', 'sources', array('id', 'name'));
	}
}

?>
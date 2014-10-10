<?php

Class bid
{	
	public function add($values) {
		return Database::getInstance()->insert('bids', $values);
	}
}
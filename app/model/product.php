<?php

Class product
{
	public function add($values) {
		return Database::getInstance()->insert('products', $values);
	}
	
	public function get($id) {
		return Database::getInstance()->select('fetch', 'products', '*', array('id' => (int)$id));
	}
	
	public function getAll($conditions) {
		$columns = 'p.id, p.name, c.name AS category_name, p.price, p.delivery_cost, p.stock_number';
		return Database::getInstance()->select('fetchAll', array('products p', 'categories c'), $columns, $conditions);
	}
	
	public function search($conditions) {
		"WHERE c.id=p.category_id AND p.name LIKE '%".$_GET['search_name']."%";
		Database::getInstance()->select('fetchAll', 'products', $conditions);
	}
	
	public function update($id, $values) {
		return Database::getInstance()->update('products', $values, array('id' => (int)$id));
	}
	
	public function delete($id) {
		return Database::getInstance()->delete('products', array('id' => (int)$id));
	}
	
	public function getImageById($id) {
		return Database::getInstance()->select('fetch', 'images', 'link, product_id', array('id' => (int)$id));
	}
	
	public function getImageByProductId($id) {
		return Database::getInstance()->select('fetch', 'images', 'id', array('product_id' => (int)$id));
	}
	
	public function getAllImages($productID) {
		return Database::getInstance()->select('fetchAll', 'images', 'id, link, product_id, by_default', array('product_id' => (int)$productID));
	}
	
	public function insertImage($values) {
		return Database::getInstance()->insert('images', $values);
	}
	
	public function setDefaultImage($id) {
		$db = Database::getInstance();
		$image = $db->select('fetch', 'images', 'product_id', array('id' => (int)$id));
		$db->update('images', array('by_default' => '1'), array('id' => (int)$id));
		return $db->update('images', array('by_default' => '0'), "product_id = {$image['product_id']} AND id != {$id}");
	}
	
	public function deleteImage($id) {
		return Database::getInstance()->delete('images', array('id' => (int)$id));
	}
}

?>
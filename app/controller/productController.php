<?php

class productController extends appController 
{
	public $models = array('product', 'category');
	
	function admin_index() {
		if (!empty($_POST)) {
			$data = tools::filter($_POST);
			$toInsert = array(
				'name' => $data['name'],
				'category_id' => $data['category_id'],
				'price' => (strpos($data['price'], ',')) ? str_replace(',', '.', $data['price']) : $data['price'],
				'description' => $data['description'],
				'delivery_cost' => (strpos($data['delivery_cost'], ',')) ? str_replace(',', '.', $data['delivery_cost']) : $data['delivery_cost'],
				'delivery_information' => $data['delivery_information'],
				'stock_number' => $data['stock_number'],
				'created' => date("Y-m-d H:i:s")
			);
			
			if ($this->product->add($toInsert)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/product');
		}
		
		$conditions = 'c.id = p.category_id';
		if (!empty($_GET)) {
			$data = tools::filter($_GET);
			if (isset($data['actions'])) {
				$conditions['c.id'] = $data['actions'];
			} elseif (isset($data['search'])) {
				$conditions['p.name'] = array('like' => "%{$data['search_name']}%");
			}
		}
		$products = $this->product->getAll($conditions);
		
		$this->smarty->assign(array(
			'products' => $products,
			'number' => count($products),
			'categories' => $this->category->getAll()
		));
		$this->smarty->display('admin/auction/products.tpl');
	}
	
	function admin_add() {
		$this->smarty->assign('categories', $this->category->getAll());
		$this->smarty->display('admin/auction/add_product.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {	
			$data = tools::filter($_POST);
			$toUpdate = array(
				'name' => $data['name'],
				'category_id' => $data['category_id'],
				'description' => $data['description'],
				'price' => (strpos($data['price'], ',')) ? str_replace(',', '.', $data['price']) : $data['price'],
				'delivery_cost' => (strpos($data['delivery_cost'], ',')) ? str_replace(',', '.', $data['delivery_cost']) : $data['delivery_cost'],
				'delivery_information' => $data['delivery_information'],
				'stock_number' => $data['stock_number']
			);
			
			if ($this->product->update($id, $toUpdate)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/product');
		}
		
		$this->smarty->assign(array(
			'product' => $this->product->get($id),
			'categories' => $this->category->getAll()
		));
		$this->smarty->display('admin/auction/edit_product.tpl');
	}
	
	function admin_delete($id) {
		if ($this->product->delete($id)) tools::setFlash($this->l('Request processed'), 'success');
		else tools::setFlash($this->l('An error has occurred'), 'error');
		tools::redirect('/admin/product');
	}
	
	function admin_images($productID) {
		if(!empty($_FILES)) {
			$upload_dir = _DIR_ .'/assets/img/product/';
			$upload = tools::upload($_FILES, $upload_dir);
			if (!$upload) {
				tools::setFlash($this->l('An error has occurred'), 'error');
				tools::redirect("/admin/product/images/{$productID}");
			} else {
				foreach($upload as $img) {
					// generate the thumbnails
					$original = $upload_dir.$img;
					$thumbnails_dir = "{$upload_dir}thumb/{$productID}/";
					
					// create the folder if not exists
					if (!is_dir($thumbnails_dir)) {
						mkdir($thumbnails_dir, 0777);       
					}
					
					tools::thumbnail($original, $thumbnails_dir.'home_label.jpg', $this->settings['thumbnails']['home_label']['width'], $this->settings['thumbnails']['home_label']['height']);
					tools::thumbnail($original, $thumbnails_dir.'home_list.jpg', $this->settings['thumbnails']['home_list']['width'], $this->settings['thumbnails']['home_list']['height']);
					tools::thumbnail($original, $thumbnails_dir.'product_full.jpg', $this->settings['thumbnails']['product_full']['width'], $this->settings['thumbnails']['product_full']['height']);
					tools::thumbnail($original, $thumbnails_dir.'product_gallery.jpg', $this->settings['thumbnails']['product_gallery']['width'], $this->settings['thumbnails']['product_gallery']['height']);
					tools::thumbnail($original, $thumbnails_dir.'product_thumb.jpg', $this->settings['thumbnails']['product_thumb']['width'], $this->settings['thumbnails']['product_thumb']['height']);
					
					// add the image link to db
					$toInsert = array(
						'product_id' => $productID,
						'link' => $img,
						'created' => date("Y-m-d H:i:s")
					);
					if(!$this->product->getImageByProductId($productID)) {
						$toInsert['by_default'] = 1;	
					}
					$this->product->insertImage($toInsert);
				}
				
				tools::setFlash($this->l('Request processed'), 'success');
				tools::redirect('/admin/product/images/'.$productID);
			}
		}
		
		$this->smarty->assign(array(
			'images' => $this->product->getAllImages($productID),
			'product' => $this->product->get($productID)
		));
		$this->smarty->display('admin/auction/product_images.tpl');
	}
	
	function admin_regenerate_thumbnails($id) {
		$image = $this->product->getImageById($id);
		
		$toDelete = array(
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/home_label.jpg',
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/home_list.jpg',
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/product_full.jpg',
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/product_gallery.jpg',
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/product_thumb.jpg'
		);
		foreach($toDelete as $name) {
			if(file_exists($name)) unlink($name);
		}
		
		$original = _DIR_ .'/assets/img/product/'.$image['link'];
		$thumbnails_dir = _DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/';
		tools::thumbnail($original, $thumbnails_dir.'home_label.jpg', $this->settings['thumbnails']['home_label']['width'], $this->settings['thumbnails']['home_label']['height']);
		tools::thumbnail($original, $thumbnails_dir.'home_list.jpg', $this->settings['thumbnails']['home_list']['width'], $this->settings['thumbnails']['home_list']['height']);
		tools::thumbnail($original, $thumbnails_dir.'product_full.jpg', $this->settings['thumbnails']['product_full']['width'], $this->settings['thumbnails']['product_full']['height']);
		tools::thumbnail($original, $thumbnails_dir.'product_gallery.jpg', $this->settings['thumbnails']['product_gallery']['width'], $this->settings['thumbnails']['product_gallery']['height']);
		tools::thumbnail($original, $thumbnails_dir.'product_thumb.jpg', $this->settings['thumbnails']['product_thumb']['width'], $this->settings['thumbnails']['product_thumb']['height']);
		
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/product/images/'.$image['product_id']);
	}
	
	function admin_set_default_image($id) {
		$image = $this->product->getImageById($id);
		
		if ($this->product->setDefautImage($id)) tools::setFlash($this->l('Request processed'), 'success');
		else tools::setFlash($this->l('An error has occurred'), 'error');
		tools::redirect('/admin/product/images/'.$image['product_id']);
	}
	
	function admin_delete_image($id) {	
		$image = $this->product->getImageById($id);
		
		$toDelete = array(
			_DIR_ .'/assets/img/product/'.$image['link'],
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/home_label.jpg',
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/home_list.jpg',
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/product_full.jpg',
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/product_gallery.jpg',
			_DIR_ .'/assets/img/product/thumb/'.$image['product_id'].'/product_thumb.jpg'
		);
		foreach($toDelete as $name) {
			if(file_exists($name)) unlink($name);
		}
		
		if ($this->product->deleteImage($id)) tools::setFlash($this->l('Request processed'), 'success');
		else tools::setFlash($this->l('An error has occurred'), 'error');
		tools::redirect('/admin/product/images/'.$image['product_id']);
	}
}
?>
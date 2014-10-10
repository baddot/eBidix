<?php

class categoryController extends appController 
{
	public $models = array('category');
	
	function admin_index() {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toInsert = array(
				'name' => $data['name']
			);
			
			if ($this->category->add($toInsert)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/product');
		}
		
		$categories = $this->category->getAll();
		
		$this->smarty->assign(array(
			'categories' => $categories,
			'nb' => count($categories)
		));
		$this->smarty->display('admin/auction/categories.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toUpdate = array(
				'name' => $data['name']
			);
			
			if ($this->category->update((int)$id, $toUpdate)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/category');
		}
		
		$this->smarty->assign('category', $this->category->getByID($id));
		$this->smarty->display('admin/auctions/edit_category.tpl');
	}
	
	function admin_delete($id) {
		if ($this->category->delete((int)$id)) tools::setFlash($this->l('Request processed'), 'success');
		else tools::setFlash($this->l('An error has occurred'), 'error');
		tools::redirect('/admin/category');
	}
}
?>
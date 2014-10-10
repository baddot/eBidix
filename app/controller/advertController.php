<?php

class adController extends appController 
{
	public $models = array('advert');
	
	function admin_index() {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toInsert = array(
				'name' => $data['name'],
				'content' => $data['content'],
				'active' => $data['active']
			);
			
			if ($this->advert->add($toInsert)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/advert');
		}
		
		$this->smarty->assign('adverts' => $this->advert->getAll());
		$this->smarty->display('admin/content/adverts.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toUpdate = array(
				'name' => $data['name'],
				'content' => $data['content'],
				'active' => $data['active']
			);
			
			if ($this->advert->update((int)$id, $toUpdate)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/advert');
		}
		
		$this->smarty->assign('advert' => $this->advert->getByID($id));
		$this->smarty->display('admin/content/edit_advert.tpl');
	}
	
	function admin_delete($id) {
		if ($this->advert->delete((int)$id)) tools::setFlash($this->l('Request processed'), 'success');
		else tools::setFlash($this->l('An error has occurred'), 'error');
		tools::redirect('/admin/advert');
	}
}
?>
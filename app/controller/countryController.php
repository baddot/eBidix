<?php

class countryController extends appController 
{
	public $models = array('country');
	
	function admin_index() {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toInsert = array(
				'name' => $data['name'],
				'code' => strtoupper($data['code'])
			);
			
			if ($this->country->add($toInsert)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/country');
		}
		
		$this->smarty->assign('countries', $this->country->getAll());
		$this->smarty->display('admin/settings/countries.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$data = tools::filter($_POST);
			$toUpdate = array(
				'name' => $data['name'],
				'code' => strtoupper($data['code'])
			);
			
			if ($this->country->update((int)$id, $toUpdate)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/country');
		}
		
		$this->smarty->assign('country', $this->country->getByID((int)$id));
		$this->smarty->display('admin/settings/edit_country.tpl');
	}
	
	function admin_delete($id) {
		if ($this->country->delete((int)$id)) tools::setFlash($this->l('Request processed'), 'success');
		else tools::setFlash($this->l('An error has occurred'), 'error');
		tools::redirect('/admin/country');
	}
}
?>
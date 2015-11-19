<?php
class sourceController extends appController 
{
	function admin_index() {
		$sources = $this->exec_all("SELECT * FROM ". DB_PREFIX ."sources");
		$this->smarty->assign('sources', $sources);
		$this->smarty->display('admin/settings/sources.tpl');
	}
	
	function admin_add() {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			$this->exec("INSERT INTO ". DB_PREFIX ."sources VALUES('', '".$post_data['name']."')");
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/source');
		}	
		$this->smarty->display('admin/settings/add_source.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			$this->exec("UPDATE ". DB_PREFIX ."sources SET name='".$post_data['name']."' WHERE id=".$id."");
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/sources');
		}
		
		$source = $this->exec_one("SELECT * FROM ". DB_PREFIX ."sources WHERE id=".$id."");
		$this->smarty->assign('source', $source);
		$this->smarty->display('admin/settings/edit_source.tpl');
	}
	
	function admin_delete($id) {
		$this->exec("DELETE FROM ". DB_PREFIX ."sources WHERE id=".$id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/sources');
	}
}
?>
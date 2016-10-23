<?php

class pageController extends appController 
{
	public $models = array('page', 'user');
	
	public function view($name) {
		$this->smarty->assign(array(
			'active' => ($name == 'how-it-works') ? 4 : null,
			'page' => $this->page->getByName($name)
		));
		$this->smarty->display('page.tpl');
	}
	
	public function contact() {
		if (!empty($_POST)) {
			$data = tools::filter($_POST);
			if (isset($_SESSION['user_id'])) {
				$user = $this->user->get($_SESSION['user_id']);
				$email = $user['email'];
			} else $email = $data['email'];
			
			tools::sendMail($this->settings['app']['contact_email'], $user['email'], $data['object'], $data['message']);
			
			tools::setFlash(SUCCESS_SENT, 'success');
			tools::redirect('/contact');
		}
		
		$this->smarty->display('contact.tpl');
	}
	
	public function admin_index() {
		if (!empty($_POST)) {
			$data = tools::filter($_POST);
			$toInsert = array(
				'name' => tools::filter($data['name'], 'accents'),
				'title' => $data['title'],
				'meta_description' => $data['meta_description'],
				'meta_keywords' => $data['meta_keywords'],
				'content' => $data['content'],
				'created' => date("Y-m-d H:i:s")
			);
			
			if ($this->page->add($toInsert)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/page');
		}
		
		$this->smarty->assign('pages', $this->page->getAll());
		$this->smarty->display('admin/content/pages.tpl');
	}
	
	public function admin_edit($id) {
		if (!empty($_POST)) {
			$data = tools::filter($_POST);
			$toUpdate = array(
				'name' => tools::filter($data['name'], 'accents'),
				'title' => $data['title'],
				'meta_description' => $data['meta_description'],
				'meta_keywords' => $data['meta_keywords'],
				'content' => $_POST['content']
			);
			
			if ($this->page->update((int)$id, $toUpdate)) tools::setFlash($this->l('Request processed'), 'success');
			else tools::setFlash($this->l('An error has occurred'), 'error');
			tools::redirect('/admin/page');
		}
		
		$this->smarty->assign('page', $this->page->getByID((int)$id));
		$this->smarty->display('admin/content/edit_page.tpl');
	}
	
	public function admin_delete($id) {
		if ($this->page->delete((int)$id)) tools::setFlash($this->l('Request processed'), 'success');
		else tools::setFlash($this->l('An error has occurred'), 'error');
		tools::redirect('/admin/page');
	}
}
?>
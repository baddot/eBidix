<?php

class newsletterController extends appController 
{
	function admin_index() {
		if(!empty($_POST)) {	
			$post_data = tools::filter($_POST);
			$this->exec("INSERT INTO ". DB_PREFIX ."newsletters (name, object, content) 
			VALUES('".$post_data['name']."', '".$post_data['object']."', '".$post_data['content']."')");
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/newsletter');
		}
		
		$newsletters_data = $this->exec_all("SELECT * FROM ". DB_PREFIX ."newsletters");
		$newsletters = array();
		$i=0;
		foreach($newsletters_data as $newsletter) {
			$newsletters[$i]['id'] = $newsletter['id'];
			$newsletters[$i]['name'] = $newsletter['name'];
			$newsletters[$i]['object'] = $newsletter['object'];
			$nb_users = $this->exec_one("SELECT count(id) as count FROM ". DB_PREFIX ."users WHERE desired_category_id=".$newsletter['id']."");
			$newsletters[$i]['nb_users'] = $nb_users['count'];
			$newsletters[$i]['sent'] = $newsletter['sent'];
			$newsletters[$i]['sent_date'] = $newsletter['sent_date'];
			$i++;
		}
		
		$this->smarty->assign(array('newsletters' => $newsletters));
		$this->smarty->display('admin/content/newsletters.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			$this->exec("UPDATE ". DB_PREFIX ."newsletters SET name='".$post_data['name']."', 
			object='".$post_data['object']."', content='".$post_data['content']."' WHERE id=".$id."");
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/newsletter');
		}
		
		$newsletter = $this->exec_one("SELECT * FROM ". DB_PREFIX ."newsletters WHERE id=".$id."");
		$this->smarty->assign(array('newsletter' => $newsletter));
		$this->smarty->display('admin/content/edit_newsletter.tpl');
	}
	
	function admin_send($id) {
		$newsletter = $this->exec_one("SELECT object, content FROM ". DB_PREFIX ."newsletters WHERE id=".$id."");
		$users = $this->exec_all("SELECT username, email FROM ". DB_PREFIX ."users WHERE newsletter=1");
		foreach($users as $user) {
			$message = str_replace("%username%",$user['username'],$newsletter['content']);
			tools::sendMail($user['email'], $newsletter['object'], $message);
		}
		$this->exec("UPDATE ". DB_PREFIX ."newsletters SET sent=1, sent_date='".date("Y-m-d H:i:s")."' WHERE id=".$id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/newsletter');
	}
	
	function admin_delete($id) {
		$this->exec("DELETE FROM ". DB_PREFIX ."newsletters WHERE id=".$id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/newsletter');
	}
}
?>
<?php
class pollController extends appController 
{
	function submit($id) {
		if(!empty($_POST)) {
			if(isset($_SESSION['user_id'])) {
				if(isset($_SESSION['polled_'.$id])) {
					tools::setFlash(ALREADY_POLLED, 'error');
					tools::redirect('/');
				} else {
					$user_id = $_SESSION['user_id'];
					$post_data = tools::filter($_POST);
					$sql_request = $this->exec("INSERT INTO ". _DB_PREFIX_ ."polls_stats (poll_id, 
																						  user_id, 
																						  response) 
												VALUES('".$id."', 
													   '".$user_id."', 
													   '".$post_data['response']."')");
					if($sql_request) {
						$_SESSION['polled_'.$id] = 'yes';
						tools::setFlash(SUCCESS_POLLED, 'success');
						tools::redirect('/');
					}
				}
			} else tools::redirect('/user/login');
		}
	}
	
	function admin_index() {
		if(!empty($_POST)) {	
			
			$post_data = tools::filter($_POST);
			$sql_request = $this->exec("INSERT INTO ". _DB_PREFIX_ ."polls (question, 
																			response_1, 
																			response_2, 
																			response_3, 
																			response_4, 
																			active, 
																			created) 
										VALUES('".$post_data['question']."', 
											   '".$post_data['response_1']."', 
											   '".$post_data['response_2']."', 
											   '".$post_data['response_3']."', 
											   '".$post_data['response_4']."', 
											   '".$post_data['active']."', 
											   '".date("Y-m-d H:i:s")."')");

			$poll = $this->exec_one("SELECT id FROM ". _DB_PREFIX_ ."polls WHERE question='".$post_data['question']."'");
			$this->exec("INSERT INTO ". _DB_PREFIX_ ."polls_stats (poll_id) VALUES('".$poll['id']."')");
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/poll');
		}
		
		$polls = $this->exec_all("SELECT * FROM ". _DB_PREFIX_ ."polls");
		$this->smarty->assign('polls', $polls);
		$this->smarty->display('admin/content/polls.tpl');
	}
	
	function admin_stats($id) {
		$poll = $this->exec_one("SELECT * FROM ". _DB_PREFIX_ ."polls WHERE id=".$id."");
		$response_1_nb = $this->exec_one("SELECT count(id) as number FROM ". _DB_PREFIX_ ."polls_stats WHERE poll_id=".$id." AND response=1");
		$response_2_nb = $this->exec_one("SELECT count(id) as number FROM ". _DB_PREFIX_ ."polls_stats WHERE poll_id=".$id." AND response=2");
		$response_3_nb = $this->exec_one("SELECT count(id) as number FROM ". _DB_PREFIX_ ."polls_stats WHERE poll_id=".$id." AND response=3");
		$response_4_nb = $this->exec_one("SELECT count(id) as number FROM ". _DB_PREFIX_ ."polls_stats WHERE poll_id=".$id." AND response=4");
		$poll_stats = $this->exec_all("SELECT s.id, 
											  s.poll_id, 
											  s.user_id, 
											  s.response, 
											  u.username,
											  s.created
									   FROM ". _DB_PREFIX_ ."polls_stats s, ". _DB_PREFIX_ ."users u 
									   WHERE s.poll_id=".$id." AND u.id=s.user_id");
		$this->smarty->assign(array(
			'poll'          => $poll,
			'response_1_nb' => $response_1_nb['number'],
			'response_2_nb' => $response_2_nb['number'],
			'response_3_nb' => $response_3_nb['number'],
			'response_4_nb' => $response_4_nb['number'],
			'poll_stats'    => $poll_stats
		));
		$this->smarty->display('admin/content/poll_stats.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			$sql_request = $this->exec("UPDATE ". _DB_PREFIX_ ."polls SET question='".$post_data['question']."', 
																		  response_1='".$post_data['response_1']."', 
																		  response_2='".$post_data['response_2']."', 
																		  response_3='".$post_data['response_3']."', 
																		  response_4='".$post_data['response_4']."', 
																		  active='".$post_data['active']."' 
										WHERE id=".$id."");
			
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/poll');
		}
		
		$poll = $this->exec_one("SELECT * FROM ". _DB_PREFIX_ ."polls WHERE id=".$id."");
		$this->smarty->assign('poll', $poll);
		$this->smarty->display('admin/content/edit_poll.tpl');
	}
	
	function admin_delete($id) {
		$this->exec("DELETE FROM ". _DB_PREFIX_ ."polls WHERE id=".$id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/poll');
	}
}
?>
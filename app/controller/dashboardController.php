<?php

class DashboardController extends appController 
{	
	public $models = array('bid', 'user');
	
	function admin_index() {
		$today_income_sql = $this->exec_all("SELECT credit FROM ". DB_PREFIX ."bids WHERE description LIKE 'package%' AND DATE_FORMAT(created, '%Y-%m-%d') = '".date("Y-m-d")."'");
		$today_income = 0;
		foreach($today_income_sql as $t_income) {
			if($t_income['credit'] == 1) $today_income += 1.80;
			elseif($t_income['credit'] == 2) $today_income += 3;
			else $today_income += $t_income['credit'];
		}
		
		$yesterdayStartTime = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d')-1, date('Y')));
		$yesterdayEndTime = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-1, date('Y')));
		$yesterday_income_sql = $this->exec_all("SELECT credit FROM ". DB_PREFIX ."bids WHERE description LIKE 'package%' AND created BETWEEN '".$yesterdayStartTime."' AND '".$yesterdayEndTime."'");
		$yesterday_income = 0;
		foreach($yesterday_income_sql as $y_income) {
			if($y_income['credit'] == 1) $yesterday_income += 1.80;
			elseif($y_income['credit'] == 2) $yesterday_income += 3;
			else $yesterday_income += $y_income['credit'];
		}
		
		$firstDay = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1, date("Y")));
		$lastDay = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d"), date("Y")));	
		$weekly_income_sql = $this->exec_all("SELECT credit FROM ". DB_PREFIX ."bids WHERE description LIKE 'package%' AND created BETWEEN '".$firstDay."' AND '".$lastDay."'");
		$weekly_income = 0;
		foreach($weekly_income_sql as $w_income) {
			if($w_income['credit'] == 1) $weekly_income += 1.80;
			elseif($w_income['credit'] == 2) $weekly_income += 3;
			else $weekly_income += $w_income['credit'];
		}
		
		$monthly_income_sql = $this->exec_all("SELECT credit FROM ". DB_PREFIX ."bids WHERE description LIKE 'package%' AND DATE_FORMAT(created, '%Y-%m') = '".date("Y-m")."'");
		$monthly_income = 0;
		foreach($monthly_income_sql as $m_income) {
			if($m_income['credit'] == 1) $monthly_income += 1.80;
			elseif($m_income['credit'] == 2) $monthly_income += 3;
			else $monthly_income += $m_income['credit'];
		}
		
		$firstMday = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
		$lastMday = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-date('j'), date('Y')));
		$last_month_income_sql = $this->exec_all("SELECT credit FROM ". DB_PREFIX ."bids WHERE description LIKE 'package%' AND created BETWEEN '".$firstMday."' AND '".$lastMday."'");
		$last_month_income = 0;
		foreach($last_month_income_sql as $lm_income) {
			if($lm_income['credit'] == 1) $last_month_income += 1.80;
			elseif($lm_income['credit'] == 2) $last_month_income += 3;
			else $last_month_income += $lm_income['credit'];
		}
		
		$yearly_income_sql = $this->exec_all("SELECT credit FROM ". DB_PREFIX ."bids WHERE description LIKE 'package%' AND DATE_FORMAT(created, '%Y') = '".date("Y")."'");
		$yearly_income = 0;
		foreach($yearly_income_sql as $ye_income) {
			if($ye_income['credit'] == 1) $yearly_income += 1.80;
			elseif($ye_income['credit'] == 2) $yearly_income += 3;
			else $yearly_income += $ye_income['credit'];
		}
		
		$users = $this->exec_one("SELECT count(id) as number FROM ". DB_PREFIX ."users WHERE autobidder=0");
		$nb_messages = $this->exec_one("SELECT count(id) as total FROM ". DB_PREFIX ."messages WHERE receiver_id=1 AND open=0");
		
		$data = array(
			'today_income' => (!empty($today_income)) ? $today_income : 0,
			'yesterday_income' => (!empty($yesterday_income)) ? $yesterday_income : 0,
			'weekly_income' => (!empty($weekly_income)) ? $weekly_income : 0,
			'monthly_income' => (!empty($monthly_income)) ? $monthly_income : 0,
			'last_month_income' => (!empty($last_month_income)) ? $last_month_income : 0,
			'yearly_income' => (!empty($yearly_income)) ? $yearly_income : 0,
			'registered_users' => $users['number'],
			'online_users' => $this->get_online_users()
		);
		
		$days = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
		
		$month_now = date("m");
		if($month_now == '01') $month = "Janvier";
		elseif($month_now == '02') $month = "Février";
		elseif($month_now == '03') $month = "Mars";
		elseif($month_now == '04') $month = "Avril";
		elseif($month_now == '05') $month = "Mai";
		elseif($month_now == '06') $month = "Juin";
		elseif($month_now == '07') $month = "Juillet";
		elseif($month_now == '08') $month = "Août";
		elseif($month_now == '09') $month = "Septembre";
		elseif($month_now == '10') $month = "Octobre";
		elseif($month_now == '11') $month = "Novembre";
		elseif($month_now == '12') $month = "Décembre";
		
		$this->smarty->assign(array(
			'nb_messages' => $nb_messages['total'],
			'data'        => $data,
			'days'        => $days,
			'month'       => $month
		));
		$this->smarty->display('admin/index.tpl');
	}
	
	function get_online_users(){
		$dir   = _DIR_ .'/data/';
		$files = scandir($dir);
		$count = 0;
		foreach($files as $filename) {
			if(is_dir($dir . $filename)) continue;
			if(substr($filename, 0, 11) == 'user_count_') {
				$isOnline = tools::readCache($filename);
				if(!empty($isOnline)) $count++;
				else tools::deleteCache($filename);			
			}
		}
		return $count;
	}
	
	function admin_online_users() {
		$nb_users = tools::getOnlineUsers();
		$dir   = _DIR_ .'/data/';
		$files = scandir($dir);
		$users = array();
		foreach($files as $filename){
			if(is_dir($dir . $filename)) continue;
			if(substr($filename, 0, 11) == 'user_count_') {
				$data = explode('_', $filename);
				$user_data = $this->exec_one("SELECT id, username, admin, last_access FROM ". DB_PREFIX ."users WHERE id=".$data[2]."");
				$beforeConnect = $this->exec_one("SELECT created, deconnected FROM ". DB_PREFIX ."connexions WHERE user_id=".$user_data['id']." AND created != '".$user_data['last_access']."' ORDER BY created DESC");
				if($beforeConnect['deconnected'] != '0000-00-00 00:00:00') {
					$duration = strtotime($beforeConnect['deconnected']) - strtotime($beforeConnect['created']);
				} else {
					$duration = strtotime($user_data['last_access']) - strtotime($beforeConnect['created']);	
				}
				$user_data['duration'] = date("H:i:s", $duration);
				$users[] = $user_data;
			}
		}
		$this->smarty->assign(array(
			'nb_users' => $nb_users,
			'users' => $users
		));
		$this->smarty->display('admin/dashboard/online_users.tpl');
	}
	
	function admin_messages() {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			tools::sendMail($post_data['email'], $post_data['object'], $post_data['message']);
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/dashboard/messages');
		}
		
		if(isset($_POST['actions'])) {
			if($_POST['actions'] == 'set_read') {
				foreach($_POST as $key => $value) {
					if(is_numeric($value)) $this->exec("UPDATE ". DB_PREFIX ."messages SET open=1 WHERE id=".$value."");
					tools::setFlash($this->l('Request processed'), 'success');
					tools::redirect('/admin/dashboard/messages');
				}
			} elseif($_POST['actions'] == 'archive') {
				foreach($_POST as $key => $value) {
					if(is_numeric($value)) $this->exec("UPDATE ". DB_PREFIX ."messages SET archive=1 WHERE id=".$value."");
					tools::setFlash($this->l('Request processed'), 'success');
					tools::redirect('/admin/dashboard/messages');
				}
			} elseif($_POST['actions'] == 'delete') {
				foreach($_POST as $key => $value) {
					if(is_numeric($value)) $this->exec("DELETE FROM ". DB_PREFIX ."messages WHERE id=".$value."");
					tools::setFlash($this->l('Request processed'), 'success');
					tools::redirect('/admin/dashboard/messages');
				}
			}
		}
		
		$messages = $this->exec_all("SELECT id, object, message, open FROM ". DB_PREFIX ."messages WHERE receiver_id=1 AND archive=0 ORDER BY created DESC");
		$archived_messages = $this->exec_all("SELECT id, object, message, open FROM ". DB_PREFIX ."messages WHERE receiver_id=1 AND archive=1 ORDER BY created DESC");
		
		$this->smarty->assign(array(
			'messages' => $messages,
			'archived_messages' => $archived_messages
		));
		$this->smarty->display('admin/dashboard/messages.tpl');
	}
	
	function admin_view_message($id) {
		if(!empty($id)) {
			$message = $this->exec_one("SELECT id, email, object, message, sender_id, open, created FROM ". DB_PREFIX ."messages WHERE id=".$id."");
			$sender = $this->exec_one("SELECT firstname, lastname, username FROM ". DB_PREFIX ."users WHERE id=".$message['sender_id']."");
			$message['lastname'] = $sender['lastname'];
			$message['firstname'] = $sender['firstname'];
			$message['username'] = $sender['username'];
			if($message['open'] == 0) $this->exec("UPDATE ". DB_PREFIX ."messages SET open=1 WHERE id=".$id."");
			$this->smarty->assign('message', $message);
			$this->smarty->display('admin/dashboard/view_message.tpl');
		} else tools::redirect('/admin');
	}
	
	function admin_send_message($id) {
		if(isset($_POST['message'])) {
			$message = $this->exec_one("SELECT id, object, sender_id FROM ". DB_PREFIX ."messages WHERE id=".$id."");
			if(!empty($message)) {
				$post_data = tools::filter($_POST);
				$sql_request = $this->exec("INSERT INTO ". DB_PREFIX ."messages (object, message, sender_id, receiver_id, discuss_id, created) 
								VALUES('".$message['object']."', '".$_POST['message']."', '1', '".$message['sender_id']."', '".$message['id']."', '".date("Y-m-d H:i:s")."')");
				$email_template = $this->exec_one("SELECT object, content FROM ". DB_PREFIX ."email_templates WHERE name = 'contact_response' AND language = '".$this->settings['app']['language']."'");
				$user = $this->exec_one("SELECT username, email FROM ". DB_PREFIX ."users WHERE id=".$message['sender_id']."");
				$message = str_replace("%username%",$user['username'],$email_template['content']);
				tools::sendMail($user['email'], $email_template['object'], $message);
				tools::setFlash(SUCCESS_SENT, 'success');
				tools::redirect('/admin/dashboard/messages');
			}
		}
	}
	
	function admin_delete_message($id) {
		$this->exec("DELETE FROM ". DB_PREFIX ."messages WHERE id=".$id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/dashboard/messages');
	}
	
	function admin_do_selected() {
		if(!empty($_POST)) {
			switch($type){
				case 'delete_message' :	
					foreach($_POST as $message_id) {
						$this->exec("DELETE FROM ". DB_PREFIX ."messages WHERE id=".$message_id."");
					}
					tools::setFlash($this->l('Request processed'), 'success');
					tools::redirect('/admin/dashboard/messages');
					break;
					
				default:
					break;
			}
		}
	}
}
?>
<?php

class emailController extends appController 
{
	function user_alerts() {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			$alerts = $this->exec_all("
              SELECT e.id, e.auction_id, e.created, e.validated, p.name AS product_name, a.status_id 
              FROM ". _DB_PREFIX_ ."email_alerts e, ". _DB_PREFIX_ ."auctions a, ". _DB_PREFIX_ ."products p 
              WHERE e.user_id = ".$user_id." AND a.id = e.auction_id AND p.id = a.product_id 
              ORDER BY created DESC"
            );

            $this->smarty->assign(array(
				'alerts'   => $alerts,
				'active'   => 8
			));

			$this->smarty->display('user/email_alerts.tpl');
		} else {
			$this->set_flash(ERROR_LOGIN, 'error');
			$this->redirect('/users/login');
		}
	}
	
	function validate($id) {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			$email = $this->exec_one("SELECT * FROM ". _DB_PREFIX_ ."email_alerts WHERE id=".$this->safe($id)."");
			$auction = $this->exec_one("SELECT status_id FROM ". _DB_PREFIX_ ."auctions WHERE id=".$email['auction_id']."");
			$date_limit = date("Y-m-d H:i:s", time() - 30*24*3600);
			$won_credits = $this->exec_one("SELECT SUM(credits_offered) AS limit FROM ". _DB_PREFIX_ ."email_alerts WHERE user_id=".$user_id." AND validated=1 AND created > ".$date_limit."");
			$limit_credits = $this->exec_one("SELECT value FROM ". _DB_PREFIX_ ."settings WHERE name='limit_alert_credits'");
			
			if($auction['status_id'] > 2) {
				$this->set_flash(ERROR_AUCTION_EMAIL_ALERT, 'error');
				$this->redirect('/emails/user_alerts');
			} elseif($auction['status_id'] == 1) {
				$this->set_flash(ERROR_AUCTION_2_EMAIL_ALERT, 'error');
				$this->redirect('/emails/user_alerts');
			} else {
				if($won_credits['limit'] >= $limit_credits['value']) {
					$this->set_flash(ERROR_CREDITS_EMAIL_ALERT, 'error');
					$this->redirect('/emails/user_alerts');
				} else {
					$date = date("Y-m-d H:i:s");
					if($this->exec("INSERT INTO ". _DB_PREFIX_ ."bids VALUES('', '".$user_id."', '0', '". EMAIL_ALERT_BIDS ."', '".$email['credits_offered']."', '', '".$date."')")) {
						$this->exec("UPDATE ". _DB_PREFIX_ ."email_alerts SET validated=1, credits_offered=0 WHERE id=".$email['id']."");
						$this->set_flash(CREDITS_EMAIL_ALERT_SUCCESS, 'success');
						$this->redirect('/emails/user_alerts');
					}
				}
			}
		} else {
			$this->set_flash(ERROR_LOGIN, 'error');
			$this->redirect('/users/login');
		}
	}
	
	function add($id) {
		if(!empty($id)) {
			if(isset($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'];
				$date = date("Y-m-d H:i:s");
				$auction = $this->exec_one("SELECT credits_offered FROM ". _DB_PREFIX_ ."auctions WHERE id=".$this->safe($id)."");
				$already_add = $this->exec_one("SELECT * FROM ". _DB_PREFIX_ ."email_alerts WHERE auction_id=".$this->safe($id)."");
				if(!empty($already_add)) {
					$this->set_flash(ALREADY_EMAIL_ADD, 'success');
					$this->redirect('/');
				} else {
					if($this->exec("INSERT INTO ". _DB_PREFIX_ ."email_alerts VALUES('', '".$user_id."', '".$this->safe($id)."', '', '".$auction['credits_offered']."', '0', '".$date."')")) {
						$this->set_flash(SUCCESS_ADD, 'success');
						$this->redirect('/email/user_alerts/');
					}
				}
			} else $this->redirect('/users/login');
		} else $this->redirect('/');
	}
	
	function delete_alert($id) {
		if(!empty($id)) {
			if(isset($_SESSION['user_id'])) {
				if($this->exec("DELETE FROM ". _DB_PREFIX_ ."email_alerts WHERE id=".$this->safe($id)."")) {
					$this->set_flash(SUCCESS_DEL, 'success');
					$this->redirect('/emails/user_alerts/');
				} else $this->print_error();
			} else $this->redirect('/users/login');
		} else $this->redirect('/');
	}
}
?>
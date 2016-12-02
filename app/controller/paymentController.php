<?php

class paymentController extends appController
{
	function index() {
		if(isset($_SESSION['user_id'])) {
			if(!isset($_GET['name']) || !isset($_GET['model']) || !isset($_GET['id'])) {
				tools::setFlash(EMPTY_FIELDS , 'error');
				tools::redirect('/');
			} else {
				$name = tools::filter($_GET['name']);
				$model = tools::filter($_GET['model']);
				$id = tools::filter($_GET['id']);
			}

			switch($name){
				case 'paypal':
					$this->paypal($model, $id);
					break;

				default:
					tools::setFlash(ERROR_GATEWAY , 'error');
					tools::redirect('/');
			}
		} else tools::redirect('/user/login');
	}

	function select() {
		$data = array(
			"id" => $_GET["id"],
			"model" => $_GET["model"]
		);
		$this->smarty->assign('data', $data);
		$this->smarty->display('payment/select.tpl');
	}

	function paypal($model, $id) {
		if(isset($_SESSION['user_id'])) {
			$user_id                 = $_SESSION['user_id'];
			$user                    = $this->exec_one("SELECT first_name, last_name, email FROM ". DB_PREFIX ."users WHERE id = ".$user_id."");
			$address                 = $this->exec_one("SELECT address, postcode, city FROM ". DB_PREFIX ."addresses WHERE user_id = ".$user_id."");

			// Formating paypal data
			$paypal_data = $this->exec_one("SELECT account FROM ". DB_PREFIX ."payments WHERE name = 'paypal'");
			$paypal                  = array();
			$paypal['cancel_return'] = $this->settings['app']['site_url'].'/user';
			$paypal['return'] 	     = $this->settings['app']['site_url'].'/payment/valid';
			$paypal['notify_url']    = $this->settings['app']['site_url'].'/payment/paypal_ipn';
			$paypal['url']           = $this->settings['paypal']['url'];
			$paypal['business']      = (isset($paypal_data['account']) && !empty($paypal_data['account'])) ? $paypal_data['account'] : $this->settings['paypal']['account'];
			$paypal['lc'] 	 	     = $this->settings['paypal']['lc'];
			$paypal['currency_code'] = $this->settings['app']['currency'];

			if(isset($_SESSION['coupon_id'])) $coupon_id = $_SESSION['coupon_id'];
			else $coupon_id = 0;

			$paypal['custom']		 = $model.'#'.$id.'#'.$user_id.'#'.$coupon_id;

			switch($model){
				case 'auction':
					$auction = $this->exec_one("SELECT a.id, p.name AS product_name, a.price, a.winner_id, p.delivery_cost FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id= ".$id." AND p.id = a.product_id");

					$paypal['item_name']   = $auction['product_name'];
					$paypal['item_number'] = $auction['id'];
					$amount = $auction['price'] + $auction['delivery_cost'];
					$paypal['amount']      = number_format($amount, 2);
					$paypal['first_name']  = $user['first_name'];
					$paypal['last_name']   = $user['last_name'];
					$paypal['email']       = $user['email'];
					$paypal['address1']    = $address['address'];
					$paypal['city']    	   = $address['city'];
					$paypal['zip']    	   = $address['postcode'];

					break;

				case 'credits':
					$auction = $this->exec_one("SELECT a.id, p.name AS product_name, a.price, a.winner_id FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id= ".$id." AND p.id = a.product_id");

					$paypal['item_name']   = CREDITS_DEAL .': '.$auction['product_name'];
					$paypal['item_number'] = $auction['id'];
					$amount = $auction['price'];
					$paypal['amount']      = number_format($amount, 2);
					$paypal['first_name']  = $user['first_name'];
					$paypal['last_name']   = $user['last_name'];
					$paypal['email']       = $user['email'];
					$paypal['address1']    = $address['address'];
					$paypal['city']    	   = $address['city'];
					$paypal['zip']    	   = $address['postcode'];

					break;

				case 'package':
					$package               = $this->exec_one("SELECT id, name, price FROM ". DB_PREFIX ."packages WHERE id = ".$id."");

					$paypal['item_name']   = $package['name'];
					$paypal['item_number'] = $package['id'];
					$paypal['amount']      = number_format($package['price'], 2);
					$paypal['first_name']  = $user['first_name'];
					$paypal['last_name']   = $user['last_name'];
					$paypal['email']       = $user['email'];

					break;
				default:
					tools::setFlash(ERROR_GATEWAY , 'error');
					tools::redirect('/');
			}

			$this->smarty->assign('paypal', $paypal);
			$this->smarty->display('payment/paypal.tpl');
		} else tools::redirect('/user/login');
	}

	function paypal_ipn() {
		$req = 'cmd=_notify-validate';

		foreach ($_POST as $key => $value) {
			$value = trim(urlencode(stripslashes($value)));
			$req .= "&$key=$value";
		}

		$header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
		//$header = "POST https://www.sandbox.paypal.com/cgi-bin/webscr HTTP/1.0\r\n";
		$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
		$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
		$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);

		// variables
		$control   = explode('#', $_POST['custom']);
		$model = $control[0];
		$id = $control[1];
		$user_id = $control[2];
		$coupon_id = $control[3];
		$price = $_POST['mc_gross'];

		if (!$fp) {
			tools::sendMail($this->settings['app']['contact_email'], "Paypal IPN error", ERROR_PAYPAL_IPN);
		} else {
			fputs($fp, $header.$req);
			while (!feof($fp)) {
				$res = fgets ($fp, 1024);
				if (strcmp ($res, "VERIFIED") == 0) {
					switch($model){
						case 'auction':
							$auction = $this->exec_one("SELECT a.id, a.product_id, p.name, p.price as product_price FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id=".$id." AND p.id=a.product_id");
							$user = $this->exec_one("SELECT email, username FROM ". DB_PREFIX ."users WHERE id = ".$this->safe($user_id)."");

							// update auction status
							$this->exec("UPDATE ". DB_PREFIX ."auctions SET status_id=5, payment='1#".date("Y-m-d H:i:s")."', modified='".date("Y-m-d H:i:s")."' WHERE id=".$id."");

							// add product buy
							$this->exec("INSERT INTO ". DB_PREFIX ."products_buys (auction_id, price, payment_id, created) VALUES('".$id."', '".$this->safe($price)."', '1', '".date("Y-m-d H:i:s")."')");

							// update product stock
							$this->exec("UPDATE ". DB_PREFIX ."products SET stock_number=stock_numer-1 WHERE id=".$auction['product_id']."");

							// send confirmation email
							$email_template = $this->exec_one("SELECT object, content FROM ". DB_PREFIX ."email_templates WHERE name = 'email_confirm_payment_auction' AND language = '".$this->settings['app']['language']."'");
							$message = str_replace("%username%",$user['username'],$email_template['content']);
							$message = str_replace("%auction_id%",$id,$message);
							tools::sendMail($user['email'], $email_template['object'], $message);

							// add credits if pack auction
							if (strpos($auction['name'], 'Pack')) {
								$credits = $auction['product_price'] * $this->settings['app']['bid_value'];
								$this->exec("INSERT INTO ". DB_PREFIX ."bids (user_id, description, credit, created)
											 VALUES('".$this->safe($user_id)."', 'package_win#".$auction['name']."', '".$credits."', '".date("Y-m-d H:i:s")."')");
								unlink(_DIR_ .'/data/bids_balance_'.$user_id);
							}

							break;

						case 'credits':

							$auction = $this->exec_one("SELECT p.name, p.price as product_price, a.product_id, a.price FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id=".$id." AND p.id=a.product_id");
							$user    = $this->exec_one("SELECT email, username FROM ". DB_PREFIX ."users WHERE id = ".$this->safe($user_id)."");
							$email_template = $this->exec_one("SELECT object, content FROM ". DB_PREFIX ."email_templates WHERE name = 'email_confirm_payment_credits' AND language = '".$this->settings['app']['language']."'");
							$message = str_replace("%username%",$user['username'],$email_template['content']);
							$message = str_replace("%auction_id%",$id,$message);
							$message = str_replace("%product_name%",$auction['name'],$message);
							$nb_credits = $auction['product_price'] / $this->settings['app']['bid_value'];
							$message = str_replace("%credits%",$nb_credits,$message);
							$message = str_replace("%price%",$auction['price'],$message);
							$this->send_mail($user['email'], $email_template['object'], $message);
							$this->exec("UPDATE ". DB_PREFIX ."auctions SET status_id=5, payment='1#".date("Y-m-d H:i:s")."', modified='".date("Y-m-d H:i:s")."' WHERE id=".$id."");

							// restart the auction
							if ($this->settings['app']['auction_autostart']) $this->exec("INSERT INTO ". DB_PREFIX ."auctions (product_id, status_id, active, created) VALUES('".$auction['product_id']."', '1', '1', '".date("Y-m-d h:i:s")."')");

							// add credits
							$credits = round($auction['product_price'] / $this->settings['app']['bid_value']);
							$this->exec("INSERT INTO ". DB_PREFIX ."bids (user_id, auction_id, description, credit, created)
										 VALUES('".$user_id."', '".$id."', 'credits_deal#".$auction['name']."#".$auction['product_id']."#".$auction['product_price']."', '".$credits."', '".date("Y-m-d H:i:s")."')");

							unlink(_DIR_ .'/data/bids_balance_'.$user_id);

							break;

						case 'package':
							$package = $this->exec_one("SELECT id, name, bids FROM ". DB_PREFIX ."packages WHERE id=".$id."");
							$user = $this->exec_one("SELECT username, email FROM ". DB_PREFIX ."users WHERE id=".$this->safe($user_id)."");

							//check first time buying
							$first_time = $this->exec_one("SELECT id FROM ". DB_PREFIX ."bids WHERE user_id=".$this->safe($user_id)." AND description LIKE 'package#%'");
							if (empty($first_time)) {
								$free_first_buy_credits = $this->exec_one("SELECT value FROM ". DB_PREFIX ."settings WHERE name='free_first_buy_credits'");
								$bids = ceil($package['bids']*$free_first_buy_credits['value']/100);
								$this->exec("INSERT INTO ". DB_PREFIX ."bids (user_id, description, credit, created) VALUES('".$user_id."', 'package#".$package['name']."#1', '".$package['bids']."', '".date("Y-m-d H:i:s")."')");

								//add free credits
								$this->exec("INSERT INTO ". DB_PREFIX ."bids (user_id, description, credit, created) VALUES('".$user_id."', 'free#package', '".$bids."', '".date("Y-m-d H:i:s")."')");
							} else {
								$this->exec("INSERT INTO ". DB_PREFIX ."bids (user_id, description, credit, created) VALUES('".$user_id."', 'package#".$package['name']."#1', '".$package['bids']."', '".date("Y-m-d H:i:s")."')");
							}

							// check for submitted coupon
							if (!empty($coupon_id)) {
								$coupon = $this->exec_one("SELECT id, type, saving FROM ". DB_PREFIX ."coupons WHERE id=".$this->safe($coupon_id)."");
								if ($coupon['type'] == 2) {
									$this->exec_one("INSERT INTO ". DB_PREFIX ."bids (user_id, description, credit, created) VALUES('".$user_id."', 'free#coupon#".$coupon['id']."', '".$coupon['saving']."', '".date("Y-m-d H:i:s")."')");
								} elseif ($coupon['type'] == 3) {
									$credits = $package['bids'] * $coupon['saving'] / 100;
									$this->exec_one("INSERT INTO ". DB_PREFIX ."bids (user_id, description, credit, created) VALUES('".$user_id."', 'free#coupon#".$coupon['id']."', '".$credits."', '".date("Y-m-d H:i:s")."')");
								}
								$this->exec("INSERT INTO ". DB_PREFIX ."coupons_submitted (user_id, coupon_id, created) VALUES('".$user_id."', '".$coupon['id']."', '".date("Y-m-d H:i:s")."')");
								unset($_SESSION['coupon_id']);
							}

							unlink(_DIR_ .'/data/bids_balance_'.$user_id);

							// check referrer and add credits if referred
							$referral = $this->exec_one("SELECT referrer_id FROM ". DB_PREFIX ."referrals WHERE user_id=".$this->safe($user_id)." AND confirmed=0");
							if ($referral) {
								$referrer = $this->exec_one("SELECT username, email FROM ". DB_PREFIX ."users WHERE id=".$referral['referrer_id']."");
								$this->exec("INSERT INTO ". DB_PREFIX ."bids (user_id, description, credit, created) VALUES('".$referral['referrer_id']."', 'free#referral#".$user['id']."', '".$this->settings['app']['free_referral_buy_credits']."', '".date("Y-m-d H:i:s")."')");
								$this->exec("UPDATE ". DB_PREFIX ."referrals SET confirmed=1 WHERE user_id=".$this->safe($user_id)."");
								unlink(_DIR_ .'/cache/bids_balance_'.$referral['referrer_id']);

								$email_template = $this->exec_one("SELECT object, content FROM ". DB_PREFIX ."email_templates WHERE name = 'email_referrer' AND language = '".$this->settings['app']['language']."'");
								$message = str_replace("%username%",$referrer['username'],$email_template['content']);
								tools::sendMail($referrer['email'], $email_template['object'], $message);
							}

							// send notification
							$email_template = $this->exec_one("SELECT object, content FROM ". DB_PREFIX ."email_templates WHERE name = 'email_confirm_payment_package' AND language = '".$this->settings['app']['language']."'");
							$message = str_replace("%username%",$user['username'],$email_template['content']);
							$message = str_replace("%package%",$package['name'],$message);
							tools::sendMail($user['email'], $email_template['object'], $message);

							break;
					}
				} else if (strcmp ($res, "INVALID") == 0) {
					tools::sendMail($this->settings['app']['contact_email'], "INVALID PAYPAL IPN", "");
				}
			}
			fclose($fp);
		}
	}

	function valid() {
		$this->smarty->display('payment/valid.tpl');
	}

	function admin_index() {
		$payments = $this->exec_all("SELECT * FROM ". DB_PREFIX ."payments");
		$this->smarty->assign('payments', $payments);
		$this->smarty->display('admin/settings/payments.tpl');
	}

	function admin_edit($id) {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			$this->exec("UPDATE ". DB_PREFIX ."payments SET account = '".$post_data['account']."',
																			 fixed_fees = '".$post_data['fixed_fees']."',
																			 variable_fees = '".$post_data['variable_fees']."',
																			 active='".$post_data['active']."'
																		 WHERE id = ".$id."");
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/payment');
		}

		$payment = $this->exec_one("SELECT * FROM ". DB_PREFIX ."payments WHERE id=".$id."");
		$this->smarty->assign('payment', $payment);

		$this->smarty->display('admin/settings/edit_payment.tpl');
	}
}
?>

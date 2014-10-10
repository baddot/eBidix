<?php

class packageController extends appController 
{
	function index() {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			if(isset($_POST['code_coupon'])) {
				$code = strtoupper(tools::filter($_POST['code_coupon']));
				$coupon = $this->exec_one("SELECT id, date_start, date_end, nb_limit FROM ". DB_PREFIX ."coupons WHERE code='".$this->safe($code)."'");
				$date_now = date("Y-m-d H:i:s");
				if(!empty($coupon)) {
					$already_submitted = $this->exec_one("SELECT id FROM ". DB_PREFIX ."coupons_submitted WHERE user_id=".$user_id." AND coupon_id=".$coupon['id']."");
					$nb_submitted = $this->exec_one("SELECT count(id) as count FROM ". DB_PREFIX ."coupons_submitted WHERE coupon_id=".$coupon['id']."");
					if(!empty($already_submitted)) {
						tools::setFlash(ERROR_ALREADY_COUPON, 'error');
						tools::redirect('/packages');
					} elseif($nb_submitted['count'] >= $coupon['nb_limit'] && $coupon['nb_limit'] > 0) {
						tools::setFlash(ERROR_LIMIT_COUPON, 'error');
						tools::redirect('/packages');
					} else {
						if($coupon['type'] == 3) {
							if($date_now >= $coupon['date_start'] && $date_now <= $coupon['date_end']) {
								$this->exec("INSERT INTO ". DB_PREFIX ."bids (user_id, description, credit, created) VALUES('".$user_id."', '". COUPON_BIDS ."', '".$coupon['saving']."', '".$date_now."')");
								$this->exec("INSERT INTO ". DB_PREFIX ."coupons_submitted (user_id, coupon_id, created) VALUES('".$user_id."', '".$coupon['id']."', '".$date_now."')");
								unlink(_DIR_ .'/data/bids_balance_'.$user_id);
								tools::setFlash(SUCCESS_COUPON_2, 'success');
								tools::redirect('/account');
							} else {
								tools::setFlash(ERROR_DATE_COUPON, 'error');
								tools::redirect('/account');
							}
						} else {
							if($date_now >= $coupon['date_start'] && $date_now <= $coupon['date_end']) {
								$_SESSION['coupon_id'] = $coupon['id'];
								tools::setFlash(SUCCESS_COUPON, 'success');
								tools::redirect('/packages');
							} else {
								tools::setFlash(ERROR_DATE_COUPON, 'error');
								tools::redirect('/packages');
							}
						}
					}
				} else {
					tools::setFlash(ERROR_COUPON, 'error');
					tools::redirect('/packages');
				}
			}
		
			$paypal = $this->exec_one("SELECT * FROM ". DB_PREFIX ."payments WHERE name='paypal'");
			$packages = $this->exec_all("SELECT * FROM ". DB_PREFIX ."packages ORDER BY price ASC");
			
			if(isset($_SESSION['coupon_id'])) {
				$coupon = $this->exec_one("SELECT * FROM ". DB_PREFIX ."coupons WHERE id=".$_SESSION['coupon_id']."");
			} else $coupon = null;
			$ft_data = $this->exec_one("SELECT * FROM ". DB_PREFIX ."bids WHERE description='package' AND user_id=".$user_id."");
			if(!empty($ft_data)) $first_time = false;
			else $first_time = true;
			
			$this->smarty->assign(array(
				'active' => 5,
				'packages' => $packages,
				'paypal' => $paypal,
				'coupon' => $coupon,
				'first_time' => $first_time
			));
			$this->smarty->display('packages.tpl');
		} else tools::redirect('/user/login');
	}
	
	function image($packID) {
		$width = 109;
		$height = 147;
		$fontSize = 25;
		$angle = 18;
		$x = 40;
		$y = 97;
		$textFont = _DIR_ .'/assets/fonts/VeraBd.ttf';
		$text = '10';
		$img = imagecreatetruecolor($width, $height);
		imagesavealpha($img, true); 		
		$color = imagecolorallocatealpha($img,0x00,0x00,0x00,127); 
		imagefill($img, 0, 0, $color); 		
		$bg = imagecreatefrompng(_DIR_ .'/assets/img/pack.png');
		imagecopy($img, $bg, 0, 0, 0, 0, $width, $height);
        imagedestroy($bg);
		$textColor = imagecolorallocate($img, 255, 255, 255);
		imagefttext($img, $fontSize, $angle, $x, $y, $textColor, $textFont, $text, array());
		
		header("Content-Type: image/png");
		imagepng($img,null,9);
		imagedestroy($img);
	}
	
	function delete_coupon() {
		if(isset($_SESSION['user_id'])) {
			if(isset($_SESSION['coupon_id'])) {
				unset($_SESSION['coupon_id']);
				tools::redirect('/packages');
			}
		} else {
			tools::setFlash(ERROR_COUPON, 'error');
			tools::redirect('/packages');
		}
	}
	
	function admin_index() {
		if(!empty($_POST)) {			
			$post_data = tools::filter($_POST);
			$this->exec("INSERT INTO ". DB_PREFIX ."packages (name, bids, price) 
										VALUES('".$post_data['name']."', 
											   '".$post_data['bids']."', 
											   '".$post_data['price']."')");
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/package');
		}
		
		$packages = $this->exec_all("SELECT * FROM ". DB_PREFIX ."packages ORDER BY price ASC");
		$this->smarty->assign('packages', $packages);
		$this->smarty->display('admin/settings/packages.tpl');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			$this->exec("UPDATE ". DB_PREFIX ."packages SET name='".$post_data['name']."', bids='".$post_data['bids']."', price='".$post_data['price']."' WHERE id=".$id."");
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/package');
		}
		
		$package = $this->exec_one("SELECT * FROM ". DB_PREFIX ."packages WHERE id=".$id."");
		$this->smarty->assign('package', $package);
		$this->smarty->display('admin/settings/edit_package.tpl');
	}
	
	function admin_delete($id) {
		$this->exec("DELETE FROM ". DB_PREFIX ."packages WHERE id=".$id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/package');
	}
}
?>
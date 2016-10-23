<?php
class testimonialController extends appController 
{
	function add($id) {
		if(!empty($id)) {
			if(isset($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'];
				
				if(!empty($_POST)) {
					$post_data = tools::filter($_POST);
					
					if(isset($_FILES['image'])) {
						$dir = 'upload/';
						$file = basename($_FILES['image']['name']);
						$max_size = 1000000;
						$size = filesize($_FILES['image']['tmp_name']);
						$extensions = array('.png', '.gif', '.jpg', '.jpeg');
						$extension = strrchr($_FILES['image']['name'], '.'); 

						if(!in_array($extension, $extensions)) $message = WRONG_UPLOAD;
						if($size>$max_size) $message = BIG_FILE;
						if(!isset($message)) {
							$file = strtr($file, 
							  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
							  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
							$file = preg_replace('/([^.a-z0-9]+)/i', '-', $file);
							$date = date("dmYHis");
							$tmp_file = explode(".", $file);
							$new_file = $tmp_file[0]."-".$date.".".$tmp_file[1];
							if(move_uploaded_file($_FILES['image']['tmp_name'], $dir.$new_file)) {
								$date = date("Y-m-d H:i:s");
								$image_link = $new_file;
							} else {
								tools::setFlash(ERROR_UPLOAD, 'error');
								tools::redirect('/testimonials/add/'.tools::filter($id));
							}
						}
					} else $image_link = null;
					
					$sql_request = $this->exec("INSERT INTO ". DB_PREFIX ."testimonials (user_id, auction_id, text, image, note, active, created)
												VALUES('".$user_id."',
													   '".$this->safe($id)."',
													   '".$this->safe($post_data['text'])."', 
													   '".$image_link."', 
													   '".$this->safe($post_data['note'])."', 
													   '1', 
													   '".date("Y-m-d H:i:s")."')");
					tools::setFlash($this->l('Request processed'), 'success');
					tools::redirect('/account');
				}
				
				// check if the user won the auction
				$auction = $this->exec_one("SELECT winner_id FROM ". DB_PREFIX ."auctions WHERE id= ".$this->safe($id)."");	
				if($user_id != $auction['winner_id']) {
					tools::setFlash(ERROR_WINNER , 'error');
					tools::redirect('/account');
				}
				
				// check if the user already leaved a comment
				$testimonial = $this->exec_one("SELECT id FROM ". DB_PREFIX ."testimonials WHERE user_id=".$user_id." AND auction_id=".$this->safe($id)."");
				if(!empty($testimonial)) {
					tools::setFlash(ALREADY_LEAVE_COMMENT , 'error');
					tools::redirect('/account');
				}
				
				$this->smarty->assign(array(
					'id' => tools::filter($id)
				));
				$this->smarty->display('user/add_testimonial.tpl');
			} else tools::redirect('/user/login');
		} else tools::redirect('/');
	}
	
	function admin_index() {
		if(!empty($_POST)) {	
			
			// image upload
			if(isset($_FILES['image'])) $image = tools::upload($_FILES['image']);
			else $image = null;
			
			// data add
			$post_data = tools::filter($_POST);
			$auction = $this->exec_one("SELECT winner_id FROM ". DB_PREFIX ."auctions WHERE id=".$post_data['auction_id']."");
			
			$sql_request = $this->exec("INSERT INTO ". DB_PREFIX ."testimonials (user_id, 
																				   auction_id, 
																				   text, 
																				   image, 
																				   note, 
																				   active, 
																				   created) 
										VALUES('".$auction['winner_id']."',
											   '".$post_data['auction_id']."',
											   '".$post_data['text']."', 
											   '".$image."', 
											   '".$post_data['note']."', 
											   '".$post_data['active']."', 
											   '".date("Y-m-d H:i:s")."')");
			
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/testimonial');
		}
		
		$auctions = $this->exec_all("SELECT a.id FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."users u WHERE a.closed=1 AND a.winner_id=u.id AND u.autobidder=1 ORDER by a.id DESC");
		$testimonials_data = $this->exec_all("SELECT * FROM ". DB_PREFIX ."testimonials");
		$testimonials = array();
		$i=0;
		foreach($testimonials_data as $testimonial) {
			$testimonials[$i]['id'] = $testimonial['id'];
			$testimonials[$i]['user_id'] = $testimonial['user_id'];
			$testimonials[$i]['auction_id'] = $testimonial['auction_id'];
			$user = $this->exec_one("SELECT id, username FROM ". DB_PREFIX ."users WHERE id=".$testimonial['user_id']."");
			$testimonials[$i]['username'] = $user['username'];
			$testimonials[$i]['text'] = substr($testimonial['text'], 0, 20);
			$testimonials[$i]['note'] = $testimonial['note'];
			$testimonials[$i]['active'] = $testimonial['active'];
			$testimonials[$i]['validate'] = $testimonial['validate'];
			//$testimonials[$i]['show_home'] = $testimonial['show_home'];
			$testimonials[$i]['created'] = $testimonial['created'];
			$i++;
		}
		$this->smarty->assign(array(
			'auctions'     => $auctions,
			'testimonials' => $testimonials
		));
		$this->smarty->display('admin/content/testimonials.tpl');
	}
	
	function admin_preview($id) {
		$testimonial = $this->exec_one("SELECT t.image, t.text, u.username FROM ". DB_PREFIX ."testimonials t, ". DB_PREFIX ."users u WHERE t.id=".$id." AND u.id=t.user_id");
		$this->smarty->assign('testimonial', $testimonial);
		$this->smarty->display('admin/content/preview_testimonial.tpl');
	}
	
	function admin_validate($id) {
		$this->exec("UPDATE ". DB_PREFIX ."testimonials SET validate='1' WHERE id=".$id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/testimonials');
	}
	
	function admin_display($id) {
		if(!empty($id)) {
			$firstDay = date("d")-date("w")+1;
			$lastDay = 7-date("w")+date("d");
			$months = array(
				'1' => 'janvier',
				'2' => 'février',
				'3' => 'mars',
				'4' => 'avril',
				'5' => 'mai',
				'6' => 'juin',
				'7' => 'juillet',
				'8' => 'août',
				'9' => 'septembre',
				'10' => 'octobre',
				'11' => 'novembre',
				'12' => 'décembre'
			);
			$month = $months[date("m")];
			$year = date("Y");
			$week_text = "du ".$firstDay." au ".$lastDay." ".$month." ".$year."";
			$already_week_winner = $this->exec_one("SELECT id FROM ". DB_PREFIX ."testimonials WHERE week = '".$week_text."'");
			
			if(empty($already_week_winner['id'])) {
				$this->exec("UPDATE ". DB_PREFIX ."testimonials SET show_home=1, week='".$week_text."' WHERE id=".$id."");
				tools::setFlash($this->l('Request processed'), 'success');
				tools::redirect('/admin/testimonial');
			} else {
				tools::setFlash(ALREADY_WEEK_WINNER, 'error');
				tools::redirect('/admin/testimonial');
			}
		} else tools::redirect('/admin/testimonial');
	}
	
	function admin_withdraw($id) {
		$this->exec("UPDATE ". DB_PREFIX ."testimonials SET show_home=0 WHERE id=".$this->safe($id)."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/testimonial');
	}
	
	function admin_edit($id) {
		if(!empty($_POST)) {
			
			// image upload
			if(isset($_FILES['image'])) $image = tools::upload($_FILES['image']);
			else $image = null;
			if(!empty($image)) $this->exec("UPDATE ". DB_PREFIX ."testimonials SET image='".$image."' WHERE id=".$id."");
			
			// data edit
			$post_data = tools::filter($_POST);
			$sql_request = $this->exec("UPDATE ". DB_PREFIX ."testimonials SET text='".$post_data['text']."',  
																				 active='".$post_data['active']."' 
										WHERE id=".$id."");
			if($sql_request) {
				tools::setFlash($this->l('Request processed'), 'success');
				tools::redirect('/admin/testimonial');
			}
		}
		
		$testimonial = $this->exec_one("SELECT * FROM ". DB_PREFIX ."testimonials WHERE id=".$id."");
		$this->smarty->assign('testimonial', $testimonial);
		$this->smarty->display('admin/content/edit_testimonial.tpl');
	}
	
	function admin_delete($id) {
		$this->exec("DELETE FROM ". DB_PREFIX ."testimonials WHERE id=".$id."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/testimonial');
	}
}
?>
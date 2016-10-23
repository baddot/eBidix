<?php
class autobidController extends appController 
{
	public $models = array('autobid');
	
	function index() {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			
			$autobids = array();
			$autobids_data = $this->exec_all("SELECT * FROM ". _DB_PREFIX_ ."autobids WHERE user_id=".$user_id." ORDER BY id DESC");
			$i=0;
			foreach($autobids_data as $data) {
				$auction = $this->exec_one("SELECT id, product_id, price FROM ". _DB_PREFIX_ ."auctions WHERE id=".$data['auction_id']."");
				$autobids[$i]['id'] = $data['id'];
				$autobids[$i]['auction_id'] = $auction['id'];
				$autobids[$i]['auction_price'] = $auction['price'];
				$autobids[$i]['auction_leader'] = $auction['id'];
				$autobids[$i]['minimum_price'] = $data['minimum_price'];
				$autobids[$i]['maximum_price'] = $data['maximum_price'];
				$autobids[$i]['total_bids'] = $data['total_bids'];
				$autobids[$i]['bids'] = $data['bids'];
				$autobids[$i]['active'] = $data['active'];
				$autobids[$i]['date'] = tools::niceShort($data['created']);
				$i++;
			}
			$this->smarty->assign(array('autobids' => $autobids));
			$this->smarty->display('user/autobids.tpl');
		} else {
			tools::setFlash(ERROR_LOGIN, 'error');
			tools::redirect('/user/login');
		}
	}
	
	function set($auction_id) {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			$post_data = tools::filter($_POST);

			if (!empty($_POST))	{
				if (empty($_POST['maximum_price']) || empty($_POST['bids'])) {
					tools::setFlash(EMPTY_FIELDS, 'error');
					tools::redirect('/'.$auction_id);
				} else {
					if (strpos($post_data['minimum_price'], ',')) $post_data['minimum_price'] = str_replace(',', '.', $post_data['minimum_price']);
					if (strpos($post_data['maximum_price'], ',')) $post_data['maximum_price'] = str_replace(',', '.', $post_data['maximum_price']);

                    $this->autobid->add(array(
                        'user_id' => $user_id,
                        'auction_id' => $auction_id,
                        'minimum_price' => $post_data['minimum_price'],
                        'maximum_price' => $post_data['maximum_price'],
                        'total_bids' => $post_data['bids'],
                        'bids' => $post_data['bids'],
                        'active' => 1,
                        'created' => date("Y-m-d H:i:s")
                    ));
					
					tools::setFlash(SUCCESS_AUTOBID_ADD, 'success');
					tools::redirect('/'.$auction_id);
				}
			} else tools::redirect('/');
		} else {
			tools::setFlash(ERROR_LOGIN, 'error');
			tools::redirect('/user/login');
		}
	}
	
	function edit($id) {
		if(isset($_SESSION['user_id'])) {
			$autobid_id = tools::filter($id);
			$user_id = $_SESSION['user_id'];
			
			if(!empty($_POST)) {
				$post_data = tools::filter($_POST);
			
				$this->exec("UPDATE ". _DB_PREFIX_ ."autobids SET minimum_price = ".$post_data['minimum_price']." WHERE id = ".$autobid_id." AND user_id = ".$user_id."");
				tools::setFlash($this->l('Request processed'), 'success');
				tools::redirect('/autobids');
			}
			
			$autobid = $this->exec_one("SELECT * FROM ". _DB_PREFIX_ ."autobids WHERE id = ".$autobid_id." AND user_id = ".$user_id."");
			
			$this->smarty->assign(array('autobid' => $autobid));
			$this->smarty->display('user/edit_autobid.tpl');
		}
	}
	
	function activate($id) {
		if(isset($_SESSION['user_id'])) {
			$autobid_id = tools::filter($id);
			$user_id = $_SESSION['user_id'];
			
			$this->exec("UPDATE ". _DB_PREFIX_ ."autobids SET active=1 WHERE id = ".$this->safe($autobid_id)." AND user_id = ".$user_id."");
			tools::setFlash(SUCCESS_AUTOBID_ACTIVATE, 'success');
			tools::redirect('/autobids');
		} else {
			tools::setFlash(ERROR_LOGIN, 'error');
			tools::redirect('/user/login');
		}
	}
	
	function suspend($id) {
		if(isset($_SESSION['user_id'])) {
			$autobid_id = tools::filter($id);
			$user_id = $_SESSION['user_id'];
			
			$this->exec("UPDATE ". _DB_PREFIX_ ."autobids SET active=0 WHERE id = ".$autobid_id." AND user_id = ".$user_id."");
			tools::setFlash(SUCCESS_AUTOBID_PAUSE, 'success');
			tools::redirect('/autobids');
		} else {
			tools::setFlash(ERROR_LOGIN, 'error');
			tools::redirect('/user/login');
		}
	}
	
	function delete($id) {
		if(isset($_SESSION['user_id'])) {
			$autobid_id = tools::filter($id);
			$user_id = $_SESSION['user_id'];
			
			$this->exec("DELETE FROM ". _DB_PREFIX_ ."autobids WHERE id = ".$autobid_id." AND user_id = ".$user_id."");
			tools::setFlash(SUCCESS_AUTOBID_CANCEL, 'success');
			tools::redirect('/autobids');
		} else {
			tools::setFlash(ERROR_LOGIN, 'error');
			tools::redirect('/user/login');
		}
	}
}
?>
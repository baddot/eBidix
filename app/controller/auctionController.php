<?php

class auctionController extends appController
{
	public $models = array('auction', 'user', 'advert');

	function index() {
		// referrer's link
		if(isset($_GET['pid'])) {
			$_SESSION['referrer'] = tools::filter($_GET['pid']);
		}

		// ongoing auctions
		$auctions_data = $this->exec_all("SELECT a.id, a.product_id, p.name, p.price AS product_price, a.price, a.closed, a.label, a.status_id
										  FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p
										  WHERE a.product_id = p.id AND a.active=1 AND a.closed=0 AND a.status_id=3
										  ORDER BY a.end_time ".$this->settings['app']['auctions_order']." LIMIT ".$this->settings['auction']['home_limit']."");
		$ongoing_auctions = array();
		$i=0;
		foreach($auctions_data as $auction) {
			$ongoing_auctions[$i]['id'] = $auction['id'];
			$ongoing_auctions[$i]['name'] = $auction['name'];
			$ongoing_auctions[$i]['link_name'] = strtolower(str_replace(" ", "-", $auction['name']));
			$ongoing_auctions[$i]['product_id'] = $auction['product_id'];
			$ongoing_auctions[$i]['product_price'] = $auction['product_price'];
			$ongoing_auctions[$i]['price'] = $auction['price'];
			$ongoing_auctions[$i]['closed'] = $auction['closed'];
			$ongoing_auctions[$i]['label'] = $auction['label'];
			$ongoing_auctions[$i]['status_id'] = $auction['status_id'];
			$i++;
		}

		// upcoming auctions
		$soon_auctions_data = $this->exec_all("SELECT a.id, a.product_id, p.name, p.price as product_price, a.price, a.closed, a.status_id
											   FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p
											   WHERE a.product_id = p.id AND a.active=1 AND a.closed=0 AND a.status_id=1
											   ORDER BY a.end_time DESC LIMIT 10");
		$soon_auctions = array();
		$j=0;
		foreach($soon_auctions_data as $auction) {
			$soon_auctions[$j]['id'] = $auction['id'];
			$soon_auctions[$j]['name'] = $auction['name'];
			$soon_auctions[$j]['link_name'] = strtolower(str_replace(" ", "-", $auction['name']));
			$soon_auctions[$j]['product_id'] = $auction['product_id'];
			$soon_auctions[$j]['product_price'] = $auction['product_price'];
			$soon_auctions[$j]['price'] = $auction['price'];
			$soon_auctions[$j]['closed'] = $auction['closed'];
			$soon_auctions[$j]['status_id'] = $auction['status_id'];
			$image = $this->exec_one("SELECT link FROM ". DB_PREFIX ."images WHERE product_id=".$auction['product_id']." AND by_default=1");
			$soon_auctions[$j]['image'] = $image['link'];
			$j++;
		}

		if($this->settings['app']['last_purchases'] == true) {
			$closed_auctions = $this->exec_all("SELECT a.id, a.product_id, a.type, p.name, p.price as product_price, a.price, a.fixed_price, a.winner_id
												FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p
												WHERE a.product_id = p.id AND a.active=1 AND a.closed=1 AND a.status_id > 3 AND status_id != 6
												ORDER BY a.end_time DESC LIMIT 4");

			$last_purchases = array();
			if(!empty($closed_auctions)) {
				$i=0;
				foreach($closed_auctions as $auction) {
					$last_purchases[$i]['id'] = $auction['id'];
					$last_purchases[$i]['product_id'] = $auction['product_id'];
					$last_purchases[$i]['name'] = $auction['name'];
					$last_purchases[$i]['link_name'] = strtolower(str_replace(" ", "-", $auction['name']));
					$last_purchases[$i]['product_price'] = $auction['product_price'];
					$last_purchases[$i]['price'] =  ($auction['type'] == 4) ? $auction['fixed_price'] : $auction['price'];
					$user_data = $this->exec_one("SELECT username FROM ". DB_PREFIX ."users WHERE id=".$auction['winner_id']."");
					$last_purchases[$i]['winner'] = $user_data['username'];
					$image = $this->exec_one("SELECT link FROM ". DB_PREFIX ."images WHERE product_id=".$auction['product_id']." AND by_default=1");
					$last_purchases[$i]['image'] = $image['link'];
					$i++;
				}
			}
		} else $last_purchases = null;

		$poll = ($this->settings['app']['poll'] == true) ? $this->exec_one("SELECT * FROM ". DB_PREFIX ."polls WHERE active=1 ORDER BY rand()") : null;



		$this->smarty->assign(array(
			'active' => 1,
			'home_text' => $this->settings['app']['home_text'],
			'sort' => (isset($_GET['sort'])) ? tools::filter($_GET['sort']) : $this->settings['app']['auctions_display'],
			'top_ad' => $this->advert->getContent('1'),
			'right_ad' => $this->advert->getContent('2'),
			'ongoing_auctions' => $ongoing_auctions,
			'soon_auctions' => $soon_auctions,
			'last_purchases' => $last_purchases,
			'poll' => $poll
		));
		$this->smarty->display('home.tpl');
	}

	function view($id) {
		$auction_id = tools::filter($id);
		$user_id = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : null;

		$auction = $this->exec_one("SELECT a.id, a.product_id, p.name AS product_name, p.price AS product_price, p.category_id, p.description, p.delivery_cost, p.delivery_information, a.type, a.price, a.fixed_price, a.pred_nb_users, a.active, a.closed, a.status_id, a.autobids, a.podium, a.second_credits, a.third_credits, a.buynow
									FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p
									WHERE a.id = ".$auction_id." AND a.product_id = p.id");

		$auction['product_price'] = number_format($auction['product_price'],0);
		$auction['delivery_cost'] = number_format($auction['delivery_cost'],0);
		$auction['description'] = html_entity_decode($auction['description'], ENT_QUOTES, 'UTF-8');

		// get auction increments
		$increments = $this->exec_one("SELECT time_increment, price_increment, bid_debit FROM ". DB_PREFIX ."increments WHERE auction_id=".$auction_id."");
		$auction['time_increment'] = $increments['time_increment'];
		$auction['price_increment'] = $increments['price_increment'];
		$auction['bid_debit'] = $increments['bid_debit'];

		// product images
		$images = $this->exec_all("SELECT link FROM ". DB_PREFIX ."images WHERE product_id=".$auction['product_id']." ORDER BY id ASC LIMIT 4");

		if(!empty($user_id)) {
			$get_spent_credits = $this->exec_one("SELECT SUM(debit) AS total FROM ". DB_PREFIX ."bids WHERE auction_id=".$auction['id']." AND user_id=".$user_id);
			$auction['spent_credits'] = $get_spent_credits['total'] * $this->settings['app']['bid_value'];
		} else $auction['spent_credits'] = 0;

		$this->smarty->assign(array(
			'auction' => $auction,
			'images'  => $images
		));
		$this->smarty->display('auction/view.tpl');
	}

	function category($id) {
		$date_now = date("Y-m-d H:i:s");
		$per_page = 20;
		$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
		$offset = ($page - 1) * $per_page;
		$limit = 'LIMIT '.$offset.','.$per_page;
		$category = $this->exec_one("SELECT name FROM ". DB_PREFIX ."categories WHERE id=".$id."");
		$auctions_data = $this->exec_all("SELECT a.id, a.product_id, p.name, p.category_id, p.price AS product_price, a.price, a.status_id, a.closed FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.product_id = p.id AND a.active=1 AND a.closed=0 AND p.category_id=".$id." ORDER BY a.end_time ".$this->settings['app']['auctions_order']." ".$limit."");
		$auctions = array();
		$i=0;
		foreach($auctions_data as $auction) {
			$auctions[$i]['id'] = $auction['id'];
			$auctions[$i]['name'] = $auction['name'];
			$auctions[$i]['link_name'] = strtolower(str_replace(" ", "-", $auction['name']));
			$auctions[$i]['product_id'] = $auction['product_id'];
			$auctions[$i]['product_price'] = $auction['product_price'];
			$auctions[$i]['price'] = $auction['price'];
			$auctions[$i]['closed'] = $auction['closed'];
			$auctions[$i]['status_id'] = $auction['status_id'];
			$i++;
		}

		$pagination = array();
		$pagination['per_page'] = $per_page;
		$pagination['page'] = $page;
		$total_auctions = $this->exec_one("SELECT count(a.id) as nb, p.category_id FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.active=1 AND a.closed=0 AND a.status_id=1 AND p.category_id=".$id."");
		$pagination['total'] = $total_auctions['nb'];

		if(isset($_GET['sort'])) $sort = tools::filter($_GET['sort']);
		else $sort = $this->settings['app']['auctions_display'];

		$this->smarty->assign(array(
			'active' => 2,
			'sort' => $sort,
			'category_name' => $category['name'],
			'auctions' => $auctions,
			'pagination' => $pagination
		));
		$this->smarty->display('auction/category.tpl');
	}

	function closed() {
		$per_page = 20;
		$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
		$offset = ($page - 1) * $per_page;
		$limit = 'LIMIT '.$offset.','.$per_page;
		$auctions_data = $this->exec_all("SELECT a.id, a.product_id, p.name, p.category_id, p.price AS product_price, a.price, a.status_id, a.winner_id, a.closed FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.product_id = p.id AND a.end_time < '".date("Y-m-d H:i:s")."' AND a.active=1 AND a.closed=1 AND a.status_id > 3 ORDER BY a.end_time DESC ".$limit."");
		$auctions = array();
		$i=0;
		foreach($auctions_data as $auction) {
			$auctions[$i]['id'] = $auction['id'];
			$auctions[$i]['name'] = $auction['name'];
			$auctions[$i]['link_name'] = strtolower(str_replace(" ", "-", $auction['name']));
			$auctions[$i]['product_id'] = $auction['product_id'];
			$auctions[$i]['product_price'] = $auction['product_price'];
			$auctions[$i]['price'] = $auction['price'];
			$auctions[$i]['status_id'] = $auction['status_id'];
			$auctions[$i]['closed'] = $auction['closed'];
			$image = $this->exec_one("SELECT link FROM ". DB_PREFIX ."images WHERE product_id=".$auction['product_id']." AND by_default=1");
			$auctions[$i]['image'] = $image['link'];
			$category_data = $this->exec_one("SELECT name FROM ". DB_PREFIX ."categories WHERE id=".$auction['category_id']."");
			$auctions[$i]['category'] = $category_data['name'];
			$testimonial = $this->exec_one("SELECT * FROM ". DB_PREFIX ."testimonials WHERE auction_id=".$auction['id']." AND user_id=".$auction['winner_id']." AND active=1 AND validate=1");
			if(!empty($testimonial)) {
				$auctions[$i]['testimonial'] = $testimonial['text'];
				$auctions[$i]['first_name'] = $testimonial['first_name'];
				$auctions[$i]['last_name'] = $testimonial['last_name'];
				$auctions[$i]['city'] = $testimonial['city'];
				$auctions[$i]['image'] = $testimonial['image'];
				$auctions[$i]['note'] = $testimonial['note'];
			} else $auctions[$i]['testimonial'] = null;
			$i++;
		}

		$pagination = array();
		$pagination['per_page'] = $per_page;
		$pagination['page'] = $page;
		$total_auctions = $this->exec_one("SELECT count(a.id) as nb FROM ". DB_PREFIX ."auctions WHERE active=1 AND closed=1");
		$pagination['total'] = $total_auctions['nb'];

		$this->smarty->assign(array(
			'active'     => 3,
			'sort'       => 'list',
			'auctions'   => $auctions,
			'pagination' => $pagination
		));
		$this->smarty->display('auction/closed.tpl');
	}

	function alert($id) {
		if(isset($_SESSION['user_id'])) {
			$auction_id = tools::filter($id);
			$user_id = $_SESSION['user_id'];
			//$auction = $this->exec_one("SELECT credits_offered FROM ". DB_PREFIX ."auctions WHERE id=".$id."");
			$already_add = $this->exec_one("SELECT * FROM ". DB_PREFIX ."email_alerts WHERE auction_id=".$auction_id." AND user_id=".$user_id."");
			if(!empty($already_add)) {
				tools::setFlash(ALREADY_EMAIL_ADD, 'success');
				tools::redirect('/'.$auction_id);
			} else {
				$this->exec("INSERT INTO ". DB_PREFIX ."email_alerts (user_id, auction_id, created)
				VALUES('".$user_id."', '".$auction_id."', '".date("Y-m-d H:i:s")."')");
				tools::setFlash($this->l('Request processed'), 'success');
				tools::redirect('/'.$auction_id);
			}
		} else tools::redirect('/user/login');
	}

	function watchlist() {
		if(isset($_SESSION['user_id'])) {
				$user_id = $_SESSION['user_id'];
				$follows_data = $this->exec_all("SELECT f.id, f.auction_id, a.product_id, a.end_time, a.price FROM ". DB_PREFIX ."follows f, ". DB_PREFIX ."auctions a WHERE f.user_id=".$user_id." AND a.id=f.auction_id");
				$follows = array();
				$i=0;
				foreach($follows_data as $follow) {
					$follows[$i]['id'] = $follow['id'];
					$follows[$i]['auction_id'] = $follow['auction_id'];
					$follows[$i]['product_id'] = $follow['product_id'];
					$product = $this->exec_one("SELECT name FROM ". DB_PREFIX ."products WHERE id=".$follow['product_id']."");
					$follows[$i]['auction_name'] = $product['name'];
					$follows[$i]['price'] = $follow['price'];
					$follows[$i]['end_time'] = $follow['end_time'];
					$i++;
				}


				$this->smarty->assign(array('follows' => $follows));
				$this->smarty->display('auction/watchlist.tpl');
		} else tools::redirect('/user/login');
	}

	function add_watch($id) {
		if(isset($_SESSION['user_id'])) {
			$id = tools::filter($id);
			$user_id = $_SESSION['user_id'];

			$this->exec("INSERT INTO ". DB_PREFIX ."follows (auction_id, user_id, created)
			VALUES('".$id."', '".$user_id."', '".date("Y-m-d H:i:s")."')");
			tools::setFlash(SUCCESS_FOLLOW, 'success');
			tools::redirect('/watchlist');
		} else tools::redirect('/user/login');
	}

	function delete_watch($id) {
		if(isset($_SESSION['user_id'])) {
			$id = tools::filter($id);
			$user_id = $_SESSION['user_id'];

			$this->exec("DELETE FROM ". DB_PREFIX ."follows WHERE id=".$id." AND user_id=".$user_id."");
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/watchlist');
		} else tools::redirect('/user/login');
	}

	function buy($id) {
		if(isset($_SESSION['user_id'])) {
			if($this->settings['app']['buy_now']) {
				$user_id = $_SESSION['user_id'];
				$auction_id = tools::filter($_GET['id']);
				$auction = $this->exec_one("SELECT a.id,
												   a.product_id,
												   a.end_time,
												   a.buynow,
												   a.closed,
												   a.created,
												   p.name AS product_name,
												   p.price AS product_price,
												   p.delivery_cost
											FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p
											WHERE a.id = ".$this->safe($auction_id)." AND p.id = a.product_id");

				// check if buynow activated on this auction
				if(empty($auction['buynow'])) {
					tools::setFlash(ERROR_BUYNOW, 'error');
					tools::redirect('/'.$auction_id);
				}

				// check if user already buy this auction
				$already_buy = $this->exec_one("SELECT id FROM ". DB_PREFIX ."auctions WHERE winner_id=".$user_id." AND buy_id=".$this->safe($auction_id)."");
				if($already_buy) {
					tools::setFlash(ERROR_ALREADY_BUY, 'error');
					tools::redirect('/'.$auction_id);
				}

				// check if the user is reached the buynow limit
				$nb_buynow = $this->exec_one("SELECT count(id) as count FROM ". DB_PREFIX ."auctions WHERE user_id=".$user_id." AND buy_id NOT NULL");
				if($nb_buynow['count'] > $this->settings['app']['buy_now_nb_limit']) {
					tools::setFlash(ERROR_REACHED_BUYNOW, 'error');
					tools::redirect('/'.$auction_id);
				}

				// check if the auction buynow is obsolete
				if(!empty($auction['closed'])) {
					$limitDate = date("d", time() - strtotime($auction['end_time']));
					if($limitDate > $this->settings['app']['buy_now_limit']) {
						tools::setFlash(ERROR_OBSOLETE_BUYNOW, 'error');
						tools::redirect('/'.$auction_id);
					}
				}

				// check if the user reach the necessary number of bids to buy
				$user = $this->exec_one("SELECT count(id) as count FROM ". DB_PREFIX ."bids WHERE user_id = ".$user_id." AND auction_id = ".$this->safe($auction_id)." AND debit > 0");
				$user['cost'] = $user['count'] * $this->settings['app']['bid_value'];
				$price_to_reach = $auction['product_price'] * $this->settings['app']['percent_bids_to_buy'] / 100;
				$auction['price_to_buy'] = $auction['product_price'] + $auction['delivery_cost'] - $user['cost'];
				$price = $auction['product_price'] - $user['cost'];

				if($user['cost'] < $price_to_reach) $can_buy = false;
				else $can_buy = true;

				if(isset($_POST['confirm'])) {
					$sql_request = $this->exec("INSERT INTO ". DB_PREFIX ."auctions (product_id, end_time, price, winner_id, closed, status_id, buy_id, created)
									VALUES('".$auction['product_id']."', '".date("Y-m-d H:i:s")."', '".$price."', '".$user_id."', '1', '4', '".$auction['id']."', '".date("Y-m-d H:i:s")."')");
					if($sql_request) {
						// delete the user autobids
						$this->exec("DELETE FROM ". DB_PREFIX ."autobids WHERE auction_id=".$auction['id']." AND user_id=".$user_id."");

						tools::setFlash(SUCCESS_BUY, 'success');
						tools::redirect('/won-auctions');
					}
				}

				$this->smarty->assign(array(
					'can_buy' => $can_buy,
					'auction' => $auction
				));
				$this->smarty->display('auction/buy.tpl');
			} else tools::redirect('/'.$id);
		} else {
			tools::setFlash(ERROR_LOGIN, 'error');
			tools::redirect('/user/login');
		}
	}

	function won() {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];

			/*
			if(isset($_GET['page'])) $page = tools::filter($_GET['page']);
			else $page = 1;
			$sql = "SELECT a.id, DATE_FORMAT(a.end_time, '%d-%m-%Y %H:%i:%s') AS end_time, p.name, a.price, a.status_id, i.link FROM ". DB_PREFIX ."auctions AS a, ". DB_PREFIX ."products AS p, ". DB_PREFIX ."images AS i";
			$conditions = "WHERE winner_id=".$user_id." AND closed=1 AND a.product_id = p.id AND a.product_id = i.product_id ORDER BY a.end_time DESC";
			list($auctions, $pagination) = tools::paginate($sql, $conditions, "". DB_PREFIX ."auctions AS a, ". DB_PREFIX ."products AS p, ". DB_PREFIX ."images AS i", $page, PER_PAGE);
			*/

			$auctions_data = $this->exec_all("SELECT a.id, DATE_FORMAT(a.end_time, '%d-%m-%Y %H:%i:%s') AS end_time, p.name, (a.price + p.delivery_cost) as paid_price, a.status_id
										 FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p
										 WHERE a.winner_id=".$user_id." AND a.closed=1 AND a.product_id = p.id ORDER BY a.end_time DESC");

			$auctions = array();
			$i=0;
			foreach($auctions_data as $auction) {
				$auctions[$i]['id'] = $auction['id'];
				$auctions[$i]['name'] = $auction['name'];
				$auctions[$i]['end_time'] = $auction['end_time'];
				$auctions[$i]['paid_price'] = $auction['paid_price'];
				$auctions[$i]['status_id'] = $auction['status_id'];
				$status = $this->exec_one("SELECT name FROM ". DB_PREFIX ."auctions_statuses WHERE status_id=".$auction['status_id']."");
				$auctions[$i]['status'] = $status['name'];
				$comment = $this->exec_one("SELECT id FROM ". DB_PREFIX ."testimonials WHERE user_id=".$user_id." AND auction_id=".$auction['id']."");
				$auctions[$i]['comment'] = $comment['id'];
				$i++;
			}

			$this->smarty->assign(array(
				'auctions' => $auctions,
				//'pagination' => $pagination
			));
			$this->smarty->display('user/won_auctions.tpl');
		} else tools::redirect('/user/login');
	}

	function pay($id) {
		if(isset($_SESSION['user_id'])) {
			$user_id = $_SESSION['user_id'];
			$auction_id = tools::filter($id);
			$auction = $this->exec_one("SELECT a.id, a.price, a.winner_id, a.status_id, p.price as product_price, p.delivery_cost FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id = ".$this->safe($auction_id)." AND p.id=a.product_id");

			if($auction['winner_id'] != $user_id) {
				tools::setFlash(ERROR_WINNER, 'error');
				tools::redirect('/account');
			}

			if($auction['status_id'] > 4) {
				tools::setFlash(ALREADY_PAYED, 'error');
				tools::redirect('/account');
			}

			$auction['credits_deal'] = round($auction['product_price'] / $this->settings['app']['bid_value']);

			$this->smarty->assign(array('auction' => $auction));
			$this->smarty->display('auction/pay.tpl');
		} else tools::redirect('/user/login');
	}

	function inactive() {
		$this->smarty->display('inactive.tpl');
	}

	function admin_index() {
		tools::redirect('/admin/auction/ongoing');
	}

	function admin_soon() {
		$auctions_data = $this->exec_all("SELECT a.id, a.product_id, a.type, a.top, a.podium, a.autobids, a.buynow, p.name, p.price as product_price, a.hits FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.product_id = p.id AND active=1 AND closed=0 AND status_id=1");
		$auctions = array();
		$i=0;
		foreach($auctions_data as $auction) {
			$auctions[$i]['id'] = $auction['id'];
			$auctions[$i]['name'] = $auction['name'];
			$auctions[$i]['type'] = $auction['type'];
			$auctions[$i]['top'] = $auction['top'];
			$auctions[$i]['podium'] = $auction['podium'];
			$auctions[$i]['autobids'] = $auction['autobids'];
			$auctions[$i]['buynow'] = $auction['buynow'];
			$auctions[$i]['product_price'] = $auction['product_price'];
			$email_alerts = $this->exec_one("SELECT count(id) as count FROM ". DB_PREFIX ."email_alerts WHERE auction_id=".$auction['id']."");
			$auctions[$i]['email_alerts'] = (!empty($email_alerts)) ? $email_alerts['count'] : 0;
			$autobids = $this->exec_one("SELECT count(id) as count FROM ". DB_PREFIX ."autobids WHERE auction_id=".$auction['id']."");
			$auctions[$i]['autobids'] = (!empty($autobids)) ? $autobids['count'] : 0;
			$auctions[$i]['hits'] = $auction['hits'];
			$i++;
		}

		$this->smarty->assign(array(
			'auctions' => $auctions,
			'number' => $i
		));
		$this->smarty->display('admin/auction/soon.tpl');
	}

	function admin_ongoing() {
		$auctions = $this->exec_all("SELECT a.id, a.product_id, p.name, a.start_time, a.end_time, a.price, a.type, a.top, a.podium, a.autobids, a.buynow, a.minimum_price, a.active, a.status_id FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.product_id = p.id AND a.active=1 AND a.closed=0 AND a.status_id=3");
		$number = $this->exec_one("SELECT count(id) as count FROM ". DB_PREFIX ."auctions WHERE active=1 AND closed=0 AND status_id=3");
		$products = $this->exec_all("SELECT id, name FROM ". DB_PREFIX ."products");

		$dateNow = array(
			'hour'   => date("H"),
			'minute' => date("i"),
			'second' => date("s"),
			'day'    => date("d"),
			'month'  => date("m"),
			'year'   => date("Y")
		);

		$seconds = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$minutes = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$hours = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
		$days = array("01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31");
		$years = array("2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021", "2022", "2023", "2024", "2025");

		$this->smarty->assign(array(
			'auctions' => $auctions,
			'number'   => $number['count'],
			'products' => $products,
			'datenow'  => $dateNow,
			'seconds'  => $seconds,
			'minutes'  => $minutes,
			'hours'    => $hours,
			'days'     => $days,
			'years'    => $years
		));
		$this->smarty->display('admin/auction/ongoing.tpl');
	}

	function admin_closed() {
		if(isset($_GET['user_id'])) $conditions = "AND winner_id=".$this->safe($_GET['user_id'])."";
		elseif(isset($_POST['actions'])) {
			if($_POST['actions'] == 'today') {
				$day = date("Y-m-d");
				$conditions = "AND a.end_time BETWEEN '".$day." 00:00:00' AND '".$day." 23:59:59'";
			} elseif($_POST['actions'] == 'yesterday') {
				$startTime  = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d')-1, date('Y')));
				$endTime    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-1, date('Y')));
				$conditions = "AND a.end_time BETWEEN '".$startTime."' AND '".$endTime."'";
			} elseif($_POST['actions'] == 'this_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d"), date("Y")));
				$conditions = "AND a.end_time BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'last_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1-7, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d")-7, date("Y")));
				$conditions = "AND a.end_time BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'this_month') {
				$month      = date("Y-m");
				$conditions = "AND DATE_FORMAT(a.end_time, '%Y-%m') = '".$month."'";
			} elseif($_POST['actions'] == 'last_month') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
				$lastDay    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-date('j'), date('Y')));
				$conditions = "AND a.end_time BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'this_year') {
				$year = date("Y");
				$conditions = "AND DATE_FORMAT(a.end_time, '%Y') = '".$year."'";
			} elseif($_POST['actions'] == 'last_year') {
				$year = date("Y")-1;
				$conditions = "AND DATE_FORMAT(a.end_time, '%Y') = '".$year."'";
			} elseif($_POST['actions'] == 'payed') {
				$conditions = 'AND a.status_id=5';
			} elseif($_POST['actions'] == 'not_payed') {
				$conditions = 'AND a.status_id=4';
			} elseif($_POST['actions'] == 'recredited') {
				$conditions = 'AND a.status_id=7';
			} elseif($_POST['actions'] == 'classic_auctions') {
				$conditions = 'AND a.type=1';
			} elseif($_POST['actions'] == 'cent_auctions') {
				$conditions = 'AND a.type=2';
			} elseif($_POST['actions'] == 'clic_auctions') {
				$conditions = 'AND a.type=3';
			} elseif($_POST['actions'] == 'fixed_price_auctions') {
				$conditions = 'AND a.type=4';
			} elseif($_POST['actions'] == 'beginner_auctions') {
				$conditions = 'AND a.type=5';
			} elseif($_POST['actions'] == 'vip_auctions') {
				$conditions = 'AND a.type=6';
			} elseif($_POST['actions'] == 'free_auctions') {
				$conditions = 'AND a.type=7';
			} else $conditions = '';
		} else $conditions = '';

		$auctions_data = $this->exec_all("SELECT a.id, a.product_id, p.name, a.end_time, a.price, a.type, a.winner_id, a.active, a.status_id FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.product_id = p.id AND a.closed=1 AND a.buy_id=0 ".$conditions." ORDER BY a.end_time DESC");

		$auctions = array();
		$i=0;
		foreach($auctions_data as $auction) {
			$auctions[$i]['id'] = $auction['id'];
			$auctions[$i]['product_id'] = $auction['product_id'];
			$auctions[$i]['name'] = $auction['name'];
			$auctions[$i]['end_time'] = $auction['end_time'];
			$auctions[$i]['price'] = $auction['price'];
			$auctions[$i]['type'] = $auction['type'];
			$auctions[$i]['winner_id'] = $auction['winner_id'];
			$winner = $this->exec_one("SELECT username FROM ". DB_PREFIX ."users WHERE id=".$auction['winner_id']."");
			$auctions[$i]['winner'] = $winner['username'];
			$auctions[$i]['active'] = $auction['active'];
			$auctions[$i]['status_id'] = $auction['status_id'];
			$status = $this->exec_one("SELECT name FROM ". DB_PREFIX ."auctions_statuses WHERE status_id=".$auction['status_id']."");
			$auctions[$i]['status_name'] = $status['name'];
			$sent = $this->exec_one("SELECT id FROM ". DB_PREFIX ."products_buys WHERE auction_id=".$auction['id']."");
			$auctions[$i]['sent'] = (empty($sent['id'])) ? 0 : 1;
			$i++;
		}

		$this->smarty->assign(array(
			'auctions' => $auctions,
			'number'   => $i
		));
		$this->smarty->display('admin/auction/closed.tpl');
	}

	function admin_delivery($id) {
		$auction = $this->exec_one("SELECT a.id, a.winner_id, a.product_id, p.name, p.delivery_information FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id=".$id." AND p.id=a.product_id");

		if(!empty($_POST)) {
			if(!empty($_POST['object']) && !empty($_POST['message']) && !empty($_POST['supplier_id'])) {
				$supplier = $this->exec_one("SELECT email FROM ". DB_PREFIX ."suppliers WHERE id=".$this->safe($_POST['supplier_id'])."");
				tools::sendMail($supplier['email'], $_POST['object'], $_POST['message']);

				// add product buy
				$this->exec("INSERT INTO ". DB_PREFIX ."products_buys (auction_id, product_id, created)
							 VALUES('".$auction['id']."', '".$auction['product_id']."', '".date("Y-m-d H:i:s")."')");


				// send email to user about delivery
				$user = $this->user->getById($auction['winner_id']);
				tools::sendMail($user['email'], 'package_shipped', array(
					'username' => $user['username'],
					'auction_id' => $auction['id']
				));

				tools::setFlash($this->l('Request processed'), 'success');
				tools::redirect('/admin/auction/closed');
			} else {
				tools::setFlash(EMPTY_FIELDS, 'error');
				tools::redirect('/admin/auction/delivery/'.$id);
			}
		}

		$suppliers = $this->exec_all("SELECT id, company_name FROM ". DB_PREFIX ."suppliers");
		$this->smarty->assign(array(
			'auction'   => $auction,
			'suppliers' => $suppliers
		));
		$this->smarty->display('admin/auction/delivery.tpl');
	}

	function admin_closed_extends($id) {
		$auctions = $this->exec_all("SELECT a.id, a.product_id, p.name, a.end_time, a.price, a.active, a.status_id FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.product_id = p.id AND a.end_time < '".date("Y-m-d H:i:s")."' AND a.winner_id=".$id." AND a.closed=1");
		$this->smarty->assign('auctions', $auctions);
		$this->smarty->display('admin/auction/closed.tpl');
	}

	function admin_buys() {
		if(isset($_GET['buy_id'])) $conditions = "AND buy_id=".$this->safe($_GET['buy_id'])."";
		elseif(isset($_POST['actions'])) {
			if($_POST['actions'] == 'today') {
				$day = date("Y-m-d");
				$conditions = "AND end_time BETWEEN '".$day." 00:00:00' AND '".$day." 23:59:59'";
			} elseif($_POST['actions'] == 'yesterday') {
				$startTime  = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d')-1, date('Y')));
				$endTime    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-1, date('Y')));
				$conditions = "AND end_time BETWEEN '".$startTime."' AND '".$endTime."'";
			} elseif($_POST['actions'] == 'this_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d"), date("Y")));
				$conditions = "AND end_time BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'last_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1-7, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d")-7, date("Y")));
				$conditions = "AND end_time BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'this_month') {
				$month      = date("Y-m");
				$conditions = "AND DATE_FORMAT(end_time, '%Y-%m') = '".$month."'";
			} elseif($_POST['actions'] == 'last_month') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
				$lastDay    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-date('j'), date('Y')));
				$conditions = "AND end_time BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'this_year') {
				$year = date("Y");
				$conditions = "AND DATE_FORMAT(end_time, '%Y') = '".$year."'";
			} elseif($_POST['actions'] == 'last_year') {
				$year = date("Y")-1;
				$conditions = "AND DATE_FORMAT(end_time, '%Y') = '".$year."'";
			}
		} else $conditions = '';

		$auctions_data = $this->exec_all("SELECT a.id, a.product_id, p.name, a.end_time, a.price, a.winner_id, a.active, a.status_id FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.product_id = p.id AND a.closed=1 AND a.buy_id != 0 ".$conditions."");

		$auctions = array();
		$i=0;
		foreach($auctions_data as $auction) {
			$auctions[$i]['id'] = $auction['id'];
			$auctions[$i]['product_id'] = $auction['product_id'];
			$auctions[$i]['name'] = $auction['name'];
			$auctions[$i]['end_time'] = $auction['end_time'];
			$auctions[$i]['price'] = $auction['price'];
			$auctions[$i]['winner_id'] = $auction['winner_id'];
			$winner = $this->exec_one("SELECT username FROM ". DB_PREFIX ."users WHERE id=".$auction['winner_id']."");
			$auctions[$i]['winner_username'] = $winner['username'];
			$auctions[$i]['active'] = $auction['active'];
			$auctions[$i]['status_id'] = $auction['status_id'];
			$status = $this->exec_one("SELECT name FROM ". DB_PREFIX ."auctions_statuses WHERE status_id=".$auction['status_id']."");
			$auctions[$i]['status_name'] = $status['name'];
			$sent = $this->exec_one("SELECT id FROM ". DB_PREFIX ."products_buys WHERE auction_id=".$auction['id']."");
			$auctions[$i]['sent'] = (empty($sent['id'])) ? 0 : 1;
			$i++;
		}

		$this->smarty->assign(array(
			'auctions' => $auctions,
			'number'   => $i
		));
		$this->smarty->display('admin/auction/buys.tpl');
	}

	function admin_bids() {
		if(isset($_POST['actions'])) {
			if($_POST['actions'] == 'today') {
				$day        = date("Y-m-d");
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.created BETWEEN '".$day." 00:00:00' AND '".$day." 23:59:59' ORDER BY b.created DESC LIMIT 0,500";
			} elseif($_POST['actions'] == 'yesterday') {
				$startTime  = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d')-1, date('Y')));
				$endTime    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-1, date('Y')));
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.created BETWEEN '".$startTime."' AND '".$endTime."' ORDER BY b.created DESC LIMIT 0,500";
			}  elseif($_POST['actions'] == 'this_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d"), date("Y")));
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.created BETWEEN '".$firstDay."' AND '".$lastDay."' ORDER BY b.created DESC LIMIT 0,500";
			}  elseif($_POST['actions'] == 'last_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1-7, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d")-7, date("Y")));
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.created BETWEEN '".$firstDay."' AND '".$lastDay."' ORDER BY b.created DESC LIMIT 0,500";
			} elseif($_POST['actions'] == 'this_month') {
				$month      = date("Y-m");
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND DATE_FORMAT(b.created, '%Y-%m') = '".$month."' ORDER BY b.created DESC LIMIT 0,500";
			} elseif($_POST['actions'] == 'last_month') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
				$lastDay    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-date('j'), date('Y')));
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.created BETWEEN '".$firstDay."' AND '".$lastDay."' ORDER BY b.created DESC LIMIT 0,500";
			} elseif($_POST['actions'] == 'this_year') {
				$year = date("Y");
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND DATE_FORMAT(b.created, '%Y') = '".$year."' ORDER BY b.created DESC LIMIT 0,500";
			} elseif($_POST['actions'] == 'last_year') {
				$year = date("Y")-1;
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND DATE_FORMAT(b.created, '%Y') = '".$year."' ORDER BY b.created DESC LIMIT 0,500";
			} elseif($_POST['actions'] == 'credits') {
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.credit>0 ORDER BY b.created DESC LIMIT 0,500";
			} elseif($_POST['actions'] == 'debits') {
				$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.debit>0 ORDER BY b.created DESC LIMIT 0,500";
			}
		} elseif(isset($_GET['type'])) {
			if($_GET['type'] == 'package') {
				if(isset($_GET['sort_by'])) {
					if($_GET['sort_by'] == 'today') {
						$day        = date("Y-m-d");
						$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.description LIKE 'package%' AND b.created BETWEEN '".$day." 00:00:00' AND '".$day." 23:59:59' ORDER BY b.created DESC LIMIT 0,500";
					} elseif($_GET['sort_by'] == 'yesterday') {
						$startTime  = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d')-1, date('Y')));
						$endTime    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-1, date('Y')));
						$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.description LIKE 'package%' AND b.created BETWEEN '".$startTime."' AND '".$endTime."' ORDER BY b.created DESC LIMIT 0,500";
					}  elseif($_GET['sort_by'] == 'this_week') {
						$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1, date("Y")));
						$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d"), date("Y")));
						$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.description LIKE 'package%' AND b.created BETWEEN '".$firstDay."' AND '".$lastDay."' ORDER BY b.created DESC LIMIT 0,500";
					}  elseif($_POST['actions'] == 'last_week') {
						$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1-7, date("Y")));
						$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d")-7, date("Y")));
						$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.description LIKE 'package%' AND b.created BETWEEN '".$firstDay."' AND '".$lastDay."' ORDER BY b.created DESC LIMIT 0,500";
					} elseif($_GET['sort_by'] == 'this_month') {
						$month      = date("Y-m");
						$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.description LIKE 'package%' AND DATE_FORMAT(b.created, '%Y-%m') = '".$month."' ORDER BY b.created DESC LIMIT 0,500";
					} elseif($_POST['actions'] == 'last_month') {
						$firstDay   = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
						$lastDay    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-date('j'), date('Y')));
						$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.description LIKE 'package%' AND b.created BETWEEN '".$firstDay."' AND '".$lastDay."' ORDER BY b.created DESC LIMIT 0,500";
					} elseif($_POST['actions'] == 'this_year') {
						$year = date("Y");
						$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.description LIKE 'package%' AND DATE_FORMAT(b.created, '%Y') = '".$year."' ORDER BY b.created DESC LIMIT 0,500";
					} elseif($_POST['actions'] == 'last_year') {
						$year = date("Y")-1;
						$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.description LIKE 'package%' AND DATE_FORMAT(b.created, '%Y') = '".$year."' ORDER BY b.created DESC LIMIT 0,500";
					}
				} else $conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.description LIKE 'package%' ORDER BY b.created DESC LIMIT 0,500";
			}
		} elseif(isset($_GET['auction_id']) && !empty($_GET['auction_id'])) {
			$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.auction_id = ".$this->safe($_GET['auction_id'])." ORDER BY b.created DESC LIMIT 0,500";
		} elseif(isset($_GET['user_id']) && !empty($_GET['user_id'])) {
			$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND b.user_id = ".$this->safe($_GET['user_id'])." ORDER BY b.created DESC LIMIT 0,500";
		} elseif(isset($_GET['username']) && !empty($_GET['username'])) {
			$conditions = "WHERE u.id = b.user_id AND u.autobidder=0 AND u.username = '".$this->safe($_GET['username'])."' ORDER BY b.created DESC LIMIT 0,500";
		} else $conditions = "WHERE u.id = b.user_id AND u.autobidder=0 ORDER BY b.created DESC LIMIT 0,500";
		$bids_data = $this->exec_all("SELECT b.auction_id, b.user_id, u.username, b.description, b.credit, b.debit, b.created FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u ".$conditions."");
		$bids = array();
		$i=0;
		foreach($bids_data as $bid) {
			$bids[$i]['created'] = $bid['created'];
			$bids[$i]['auction_id'] = $bid['auction_id'];
			$bids[$i]['user_id'] = $bid['user_id'];
			$bids[$i]['username'] = $bid['username'];
			if($bid['description'] == 'auto') {
				$description = AUTO_AUCTION;
				$details = $bid['debit']. DEBITED_CREDITS;
			} elseif($bid['description'] == 'manual') {
				$description = MANUAL_AUCTION;
				$details = $bid['debit']. DEBITED_CREDITS;
			} else {
				$explode = explode('#', $bid['description']);
				if($explode[0] == 'package') {
					$description = PACKAGE_BUY;
					$details = $bid['credit']. BUY_CREDITS;
				} elseif($explode[0] == 'package_win') {
					$description = PACKAGE_WIN;
					$details = '<a href="/'.$bid['auction_id'].'">'.$explode[1].'</a>';
				} elseif($explode[0] == 'credits_deal') {
					$description = CREDITS_DEAL;
					$product = $this->exec_one("SELECT p.name FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id=".$bid['auction_id']." AND p.id=a.product_id");
					$details = VALUE_OF ." <a href=\"/".$bid['auction_id']."\">".$product['name']."</a>";
				} elseif($explode[0] == 'podium') {
					$description = PODIUM;
					if($explode[1] == 'second') $details = "<a href=\"/".$bid['auction_id']."\">". SECOND_PODIUM ."</a>";
					elseif($explode[1] == 'third') $details = "<a href=\"/".$bid['auction_id']."\">". THIRD_PODIUM ."</a>";
				} elseif($explode[0] == 'recredited') {
					$description = "<a href=\"/".$bid['auction_id']."\">".$explode[1]."</a>";
					$details = '';
				} elseif($explode[0] == 'free') {
					if($explode[1] == 'coupon') {
						$description = COUPON;
						$details = $explode[2];
					} elseif($explode[1] == 'register') {
						$description = REGISTER;
						$details = $bid['credit']. OFFERED_CREDITS;
					} elseif($explode[1] == 'package') {
						$description = $explode[2];
						$details = $bid['credit']. OFFERED_CREDITS;
					}
				} elseif($explode[0] == 'referral') {
					$description = REFERRAL;
					$details = $bid['credit']. OFFERED_CREDITS;
				} else {
					$description = MISC;
					$details = $explode[0];
				}
			}
			$bids[$i]['description'] = $description;
			$bids[$i]['details'] = utf8_encode($details);

			$i++;
		}
		$this->smarty->assign('bids', $bids);
		$this->smarty->display('admin/auction/bids.tpl');
	}

	function admin_add($product_id) {
		// check if the product image was added
		$check_image = $this->exec_one("SELECT link FROM ". DB_PREFIX ."images WHERE product_id = ".$product_id."");
		if(empty($check_image['link'])) {
			tools::setFlash(EMPTY_PRODUCT_IMAGE, 'error');
			tools::redirect('/admin/product/images/'.$product_id);
		}

		$product = $this->exec_one("SELECT id, name, price, delivery_cost FROM ". DB_PREFIX ."products WHERE id=".$product_id."");
		// minimum price calculation
		$minimum_price = (($product['price'] + $product['delivery_cost']) / $this->settings['app']['bid_value']) / 100;
		$product['minimum_price'] = number_format($minimum_price, 2);

		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);

			$start_time = $post_data['date-start']." ".$post_data['hour-start'].":".$post_data['min-start'].":".$post_data['sec-start'];
			$end_time = $post_data['date-end']." ".$post_data['hour-end'].":".$post_data['min-end'].":".$post_data['sec-end'];

			$sql_request = $this->exec("INSERT INTO ". DB_PREFIX ."auctions (product_id,
																			   type,
																			   start_time,
																			   end_time,
																			   price,
																			   peak_only,
																			   label,
																			   minimum_price,
																			   active,
																			   status_id,
																			   top,
																			   fixed_price,
																			   pred_cost,
																			   pred_nb_users,
																			   autobids,
																			   podium,
																			   second_credits,
																			   third_credits,
																			   extends,
																			   extends_limit,
																			   buynow,
																			   created)
										VALUES('".$post_data['product_id']."',
											   '".$post_data['auction_type']."',
											   '".$start_time."',
											   '".$end_time."',
											   '".$post_data['auction_start_price']."',
											   '".$post_data['auction_peak_only']."',
											   '".$post_data['auction_label']."',
											   '".$post_data['auction_minimum_price']."',
											   '1',
											   '1',
											   '".$post_data['auction_top']."',
											   '".$post_data['auction_fixed_price']."',
											   '".$post_data['auction_pred_cost']."',
											   '".$post_data['auction_pred_nb_users']."',
											   '".$post_data['auction_autobids']."',
											   '".$post_data['auction_podium']."',
											   '".$post_data['auction_second_credits']."',
											   '".$post_data['auction_third_credits']."',
											   '".$post_data['auction_extends']."',
											   '".$post_data['auction_extends_limit']."',
											   '".$post_data['auction_buynow']."',
											   '".date("Y-m-d H:i:s")."')");
			$auction = $this->exec_one("SELECT id, product_id FROM ". DB_PREFIX ."auctions ORDER BY id DESC");
			if($this->settings['auction']['increments'] == 'dynamic') {
				if($post_data['auction_type'] == 3) {
					if(strpos($post_data['price_increment_1'], ',')) $post_data['price_increment_1'] = str_replace(',', '.', $post_data['price_increment_1']);
					if(strpos($post_data['price_increment_2'], ',')) $post_data['price_increment_2'] = str_replace(',', '.', $post_data['price_increment_2']);
					if(strpos($post_data['price_increment_3'], ',')) $post_data['price_increment_3'] = str_replace(',', '.', $post_data['price_increment_3']);
					if(strpos($post_data['price_increment_4'], ',')) $post_data['price_increment_4'] = str_replace(',', '.', $post_data['price_increment_4']);
					$this->exec("INSERT INTO ". DB_PREFIX ."increments (auction_id, lower_price, upper_price, bid_debit, price_increment, time_increment)
								 VALUES('".$auction['id']."', '".$post_data['lower_price_1']."', '".$post_data['upper_price_1']."', '".$post_data['bid_debit_1']."', '".$post_data['price_increment_1']."', '".$post_data['time_increment_1']."')");
					$this->exec("INSERT INTO ". DB_PREFIX ."increments (auction_id, lower_price, upper_price, bid_debit, price_increment, time_increment)
								 VALUES('".$auction['id']."', '".$post_data['lower_price_2']."', '".$post_data['upper_price_2']."', '".$post_data['bid_debit_2']."', '".$post_data['price_increment_2']."', '".$post_data['time_increment_2']."')");
					$this->exec("INSERT INTO ". DB_PREFIX ."increments (auction_id, lower_price, upper_price, bid_debit, price_increment, time_increment)
								 VALUES('".$auction['id']."', '".$post_data['lower_price_3']."', '".$post_data['upper_price_3']."', '".$post_data['bid_debit_3']."', '".$post_data['price_increment_3']."', '".$post_data['time_increment_3']."')");
					$this->exec("INSERT INTO ". DB_PREFIX ."increments (auction_id, lower_price, upper_price, bid_debit, price_increment, time_increment)
								 VALUES('".$auction['id']."', '".$post_data['lower_price_4']."', '".$post_data['upper_price_4']."', '".$post_data['bid_debit_4']."', '".$post_data['price_increment_4']."', '".$post_data['time_increment_4']."')");
				} else {
					$this->exec("INSERT INTO ". DB_PREFIX ."increments (auction_id, bid_debit, price_increment, time_increment)
								 VALUES('".$auction['id']."', '1', '0.01', '".$post_data['time_increment']."')");
				}
			} elseif($this->settings['auction']['increments'] == 'single') {
				$this->exec("INSERT INTO ". DB_PREFIX ."increments (auction_id, bid_debit, price_increment, time_increment)
							 VALUES('".$auction['id']."', '1', '0.01', '".$post_data['time_increment']."')");
			}
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/auction/soon');
		}

		$seconds = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$minutes = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$hours = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
		$now = array();
		$now['seconds'] = date("s");
		$now['minutes'] = date("i");
		$now['hours'] = date("H");
		$this->smarty->assign(array(
			'product' => $product,
			'seconds' => $seconds,
			'minutes' => $minutes,
			'hours'   => $hours,
			'now'     => $now
		));

		$this->smarty->display('admin/auction/add.tpl');
	}

	function admin_start($id) {
		if(!empty($_POST)) {
			// Send email alerts to users who asked
			$email_alerts = $this->exec_all("SELECT user_id FROM ". DB_PREFIX ."email_alerts WHERE auction_id=".$id."");
			$email_template = $this->exec_one("SELECT object, content FROM ". DB_PREFIX ."email_templates WHERE name = 'email_alert' AND language = '".$this->settings['app']['language']."'");
			$auction = $this->exec_one("SELECT a.id, a.type, a.fixed_time_limit, p.name FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id=".$id." AND p.id=a.product_id");
			foreach($email_alerts as $alert) {
				$user = $this->user->getById($alert['user_id']);

				tools::sendMail($user['email'], 'email_alert_auction_start', array(
					'username' => $user['username'],
					'auction_id' => $auction['id']
				));
			}

			//$endTime = time() + $this->settings['app']['waiting_time'];
			$endTime = $_POST['date']." ".$_POST['auction_hour'].":".$_POST['auction_min'].":".$_POST['auction_sec'];

			$this->exec("UPDATE ". DB_PREFIX ."auctions SET start_time='".$endTime."', end_time='".$endTime."', status_id=3 WHERE id=".$id."");
			$name = _DIR_ ."/data/auction_".$id;
			$name_2 = _DIR_ ."/data/auction_view_".$id;
			if(file_exists($name)) unlink($name);
			if(file_exists($name_2)) unlink($name_2);

			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/auction/ongoing');
		}

		$seconds = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$minutes = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31", "32", "33", "34", "35", "36", "37", "38", "39", "40", "41", "42", "43", "44", "45", "46", "47", "48", "49", "50", "51", "52", "53", "54", "55", "56", "57", "58", "59");
		$hours = array("00", "01", "02", "03", "04", "05", "06", "07", "08", "09", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
		$now = array();
		$now['seconds'] = date("s");
		$now['minutes'] = date("i");
		$now['hours'] = date("H");
		$auction = $this->exec_one("SELECT a.id, p.name FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id=".$id." AND p.id=a.product_id");
		$this->smarty->assign(array(
			'auction' => $auction,
			'seconds' => $seconds,
			'minutes' => $minutes,
			'hours'   => $hours,
			'now'     => $now
		));
		$this->smarty->display('admin/auction/start.tpl');
	}

	function admin_edit($id) {
		if(!empty($_POST)) {
			$post_data = tools::filter($_POST);
			$this->exec("UPDATE ". DB_PREFIX ."auctions
										SET minimum_price='".$post_data['auction_minimum_price']."',
											top='".$post_data['auction_top']."',
											autobids='".$post_data['auction_autobids']."',
											extends_nb='".$post_data['auction_extends_nb']."',
											extends_limit='".$post_data['auction_extends_limit']."',
											extends='".$post_data['auction_extends']."',
											buy_option='".$post_data['auction_buy_option']."',
											buynow='".$post_data['auction_buy_now']."',
											active='".$post_data['auction_active']."'
										WHERE id=".$id."");
			$name = _DIR_ ."/data/auction_".$id;
			$name_2 = _DIR_ ."/data/auction_view_".$id;
			if(file_exists($name)) unlink($name);
			if(file_exists($name_2)) unlink($name_2);
			tools::setFlash($this->l('Request processed'), 'success');
			tools::redirect('/admin/auction/ongoing');
		}

		$auction = $this->exec_one("SELECT * FROM ". DB_PREFIX ."auctions WHERE id=".$id."");

		$this->smarty->assign(array('auction' => $auction));
		$this->smarty->display('admin/auction/edit.tpl');
	}

	function admin_stats($id) {
		$auction = $this->exec_one("SELECT a.id, a.price, a.minimum_price, p.category_id, p.price AS product_price, p.name as product_name FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."products p WHERE a.id=".$id." AND p.id=a.product_id");
		$category = $this->exec_one("SELECT name FROM ". DB_PREFIX ."categories WHERE id=".$auction['category_id']."");
		$auction['category_name'] = $category['name'];
		$total_bids = $this->exec_one("SELECT count(b.id) as count FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u WHERE b.auction_id=".$id." AND b.user_id=u.id AND u.autobidder=0");
		$auction['total_bids'] = (!empty($total_bids)) ? $total_bids['count'] : 0;
		$total_manuals = $this->exec_one("SELECT count(b.id) as count FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u WHERE b.auction_id=".$id." AND b.user_id=u.id AND u.autobidder=0 AND b.description = 'manual'");
		$auction['total_manuals'] = (!empty($total_manuals)) ? $total_manuals['count'] : 0;
		$total_auto = $this->exec_one("SELECT count(b.id) as count FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u WHERE b.auction_id=".$id." AND b.user_id=u.id AND u.autobidder=0 AND b.description = 'auto'");
		$auction['total_auto'] = (!empty($total_auto)) ? $total_auto['count'] : 0;
		$total_buynows = $this->exec_one("SELECT count(id) as count FROM ". DB_PREFIX ."auctions WHERE buy_id=".$id."");
		$auction['total_buynows'] = (!empty($total_buynows)) ? $total_buynows['count'] : 0;

		$bids = $this->exec_all("SELECT u.id as user_id, u.username, b.description, b.created FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u WHERE b.auction_id=".$id." AND b.user_id=u.id AND u.autobidder=0 ORDER BY b.created DESC");
		if(isset($_GET['sort']) && $_GET['sort'] == 'users') $conditions = "AND u.autobidder=0";
		elseif(isset($_GET['sort']) && $_GET['sort'] == 'extends') $conditions = "AND u.autobidder=1";
		else $conditions = "";
		$top_bids = $this->exec_all("SELECT count(b.id) as bids, b.user_id, u.username FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u WHERE b.auction_id=".$id." AND u.id=b.user_id ".$conditions." GROUP BY b.user_id ORDER BY bids DESC");
		$this->smarty->assign(array(
			'auction'  => $auction,
			'bids'     => $bids,
			'top_bids' => $top_bids
		));
		$this->smarty->display('admin/auction/stats.tpl');
	}

	function admin_delete($id) {
		$this->exec("DELETE FROM ". DB_PREFIX ."auctions WHERE id=".tools::filter($id)."");
		tools::setFlash($this->l('Request processed'), 'success');
		tools::redirect('/admin/auction');
	}
}
?>

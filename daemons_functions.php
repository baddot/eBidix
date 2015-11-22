<?php

function get($name = null, $auction_id = null, $cache = true) {
	$db = Database::getInstance();

	if($cache == true) {
		$setting = cacheRead($name.'_setting');
		
		if(!empty($setting)) return $setting;
		else {
			$setting = $db->getRow("SELECT value FROM ". DB_PREFIX ."settings WHERE name = '{$name}'");
			if(!empty($setting)) return $setting['value'];
			else return false;
		}
	}
	
	$increments = $db->getRow("SELECT * FROM ". DB_PREFIX ."increments WHERE auction_id = {$auction_id}");
	return $increments[$name];
}

function checkCanClose($id, $isPeakNow, $timeCheck = true) {
	$db = Database::getInstance();
	$auction = $db->getRow("SELECT id, product_id, end_time, type, peak_only, price, minimum_price, leader_id, extends, extends_limit, extends_bids, users_bids, fixed_price FROM ". DB_PREFIX ."auctions WHERE id = {$id}");

	if($timeCheck == true) {
		if(strtotime($auction['end_time']) > time()) return false;
	}

	if($auction['peak_only'] == 1 && !$isPeakNow) return false;
	
	if($auction['extends'] == 1) {
		$isExtend = $db->getRow("SELECT id FROM ". DB_PREFIX ."users WHERE id={$auction['leader_id']} AND autobidder=1");
		$product = $db->getRow("SELECT price FROM ". DB_PREFIX ."products WHERE id={$auction['product_id']}");
		$bid_value = get('bid_value');
		if($auction['price'] < $auction['minimum_price']) {
			if($isExtend) return false;
			else {
				if(($auction['users_bids'] * $bid_value) < ($product['price'] * $auction['extends_limit'] / 100)) return false;
			}
		} else {
			if(!$isExtend) {
				if(($auction['users_bids'] * $bid_value) < ($product['price'] * $auction['extends_limit'] / 100)) return false;
			}
		}
	}
	
	$latest_bid = lastBid($auction['id']);
	if(empty($latest_bid)) $latest_bid['user_id'] = 0;
	elseif($latest_bid['user_id'] !== $auction['leader_id']) return false;

	$autobids = $db->getRows("SELECT user_id FROM ". DB_PREFIX ."autobids WHERE bids > 0 AND minimum_price <= '".$auction['price']."' AND maximum_price > '".$auction['price']."' AND auction_id = ".$auction['id']." AND user_id != ".$latest_bid['user_id']);
	if(sizeof($autobids) > 0) {
		foreach($autobids as $autobid) {
			if(balance($autobid['user_id']) > 0) return false;
		}
	}
	return true;
}

function lastBid($auction_id = null) {
	$db = Database::getInstance();
	$lastBid = $db->getRow("SELECT b.id, b.debit, u.username, b.description, b.user_id, u.autobidder, b.created FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u WHERE b.auction_id = ".$auction_id." AND b.user_id = u.id ORDER BY b.id DESC");
	$bid = array();

	if(!empty($lastBid)) {
		$bid = array(
			'debit'       => $lastBid['debit'],
			'created'     => $lastBid['created'],
			'username'    => $lastBid['username'],
			'description' => $lastBid['description'],
			'user_id'     => $lastBid['user_id'],
			'autobidder'  => $lastBid['autobidder']
		);
	}
	return $bid;
}

function check($auction_id, $end_time, $data) {
	$db = Database::getInstance();
	$extend = $db->getRow("SELECT * FROM ". DB_PREFIX ."extends WHERE auction_id = {$auction_id}");

	if(!empty($extend)) {
		if($extend['end_time'] == $end_time) {
			if($extend['deploy'] <= date('Y-m-d H:i:s')) {
				placeAutobid($auction_id, $data, time() - $end_time);
				$db->delete("extends", "auction_id = {$auction_id}");
				$auction = $db->getRow("SELECT end_time FROM ". DB_PREFIX ."auctions WHERE id = {$auction_id}");
				$end_time = $auction['end_time'];
			} else return false;
		} else $db->delete("extends", "auction_id = {$auction_id}");
	}

	$str_end_time = strtotime($end_time);
	$timeDifference = $str_end_time - time();
	$randomTime = rand(3, $timeDifference);
	$deploy = date('Y-m-d H:i:s', $str_end_time - $randomTime);
	$db->insert("extends", array(
		"auction_id" => $auction_id,
		"deploy" => $deploy,
		"end_time" => $end_time
	));
	return $data;
}

function placeAutobid($id, $data = array(), $timeEnding = 0) {
	$data['auction_id']	= $id;
	$bid = lastBid($id);
	$db = Database::getInstance();

	if(!empty($bid)) {
		$bidder = $bid['user_id'];
		if(empty($user)) {
			$user = $db->getRow("SELECT id FROM ". DB_PREFIX ."users WHERE active=1 AND autobidder=1 AND id != {$bidder} ORDER BY rand()");
			$data['user_id'] = $user['id'];
		}
	} else {
		$user = $db->getRow("SELECT id FROM ". DB_PREFIX ."users WHERE active=1 AND autobidder=1 ORDER BY rand()");
		$data['user_id'] = $user['id'];
	}

	if(!empty($user)) $auction = bid($data, true, 'manual');
	else return null;
}

function bid($data = array(), $extend = false, $bid_description = null) {
	$db = Database::getInstance();

	$canBid = true;
	$message = '';

	if(empty($data['user_id'])) {
		$message = 'Connectez-vous';
		$canBid = false;
		$data['user_id'] = 0;
	}

	// Get the auction
	$auction_id = $data['auction_id'];
	$auction = $db->getRow("SELECT id, product_id, start_time, end_time, type, price, status_id, peak_only, closed, minimum_price, pred_cost, extends_bids, users_bids, created FROM ". DB_PREFIX ."auctions WHERE id = {$auction_id}");

	if(!empty($auction)){
		if(!empty($auction['free']) || $auction['type'] == 1) $data['bid_debit'] = 0;
		if($auction['type'] == 8) {
			$already_bid = $db->getRow("SELECT id FROM ". DB_PREFIX ."bids WHERE user_id={$data['user_id']} && auction_id={$auction['id']} AND debit > 0");
			if(!empty($already_bid)) {			
				if($auction['status_id'] == 1) {
					$message = 'Enchère non commencée';
					$canBid = false;
				}
				$data['bid_debit'] = 0;	
			} else {
				$data['bid_debit'] = $auction['pred_cost'];
			}
			
			$firstDay = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1, date("Y")));
			$lastDay = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d"), date("Y")));
			$check_win = $db->getRow("SELECT count(id) AS total FROM ". DB_PREFIX ."auctions WHERE winner_id={$data['user_id']} AND end_time BETWEEN '{$firstDay}' AND '{$lastDay}'");
			if($check_win['total'] >= 3) {
				$message = 'Vous avez déjà remporté 3 enchères cette semaine';
				$canBid = false;
			}
		}
		
		if(!empty($auction['closed']) && $extend == false && !@$data['autobid']) {
			$message = 'Enchère terminée';
			$canBid = false;
		}

		if(!empty($auction['peak_only'])){
			if(empty($data['isPeakNow'])){
				$message = 'Enchère limitée';
				$canBid = false;
			}
		}

		if($extend == true) $balance = $data['bid_debit'];
		else $balance = balance($data['user_id']);
		
		if($auction['type'] == 5 && $extend == false) {
			$already_win = $db->getRow("SELECT id FROM ". DB_PREFIX ."auctions WHERE winner_id={$data['user_id']}");
			if($already_win) {
				$message = 'Enchère pour débutants';
				$canBid = false;
			}
		}
		
		if($auction['type'] == 6 && $extend == false) {
			$product = $db->getRow("SELECT price FROM ". DB_PREFIX ."products WHERE id={$auction['product_id']}");
			$bid_value = $db->getRow("SELECT value FROM ". DB_PREFIX ."settings WHERE name='bid_value'");
			
			if(($balance * $bid_value['value']) < $product['price']) {
				$message = 'Enchère pour VIP';
				$canBid = false;
			}
		}
		
		$latest_bid = lastBid($data['auction_id']);
		if(!empty($latest_bid) && $latest_bid['user_id'] == $data['user_id'] && $auction['type'] != 4) {
			$message = "Vous avez la main";
			$canBid = false;
		}
		
		if(!empty($latest_bid)) {
			$theTime = time() - strtotime($latest_bid['created']);
			if($latest_bid['description'] == 'auto') {
				if($theTime < 5) $canBid = false;
			} else {
				if($theTime < 2) $canBid = false;
			}
		}
		
		/*
		$bought = mysql_fetch_array(mysql_query("SELECT id FROM ". DB_PREFIX ."auctions WHERE buy_id=".$auction['id']." AND winner_id=".$data['user_id'].""));
		if(!empty($bought)) {
			$message = "Produit acheté";
			$canBid = false;
		}
		*/

		if($canBid == true) {
			if($balance >= $data['bid_debit']) {
				if($auction['type'] == 8 && $auction['status_id'] == 1) {
					$auction['price'] = $auction['price'];
					$bid_description = 'participation';
				} else {
					$auction['price'] += $data['price_increment'];	
				}
				
				if($auction['type'] != 4 && $auction['type'] != 1 && $auction['type'] != 8) {
					if((strtotime($auction['end_time']) - time()) > $data['time_increment']) $auction['end_time'] = date('Y-m-d H:i:s', strtotime($auction['end_time']) + $data['time_increment']);
					else $auction['end_time'] = date('Y-m-d H:i:s', time() + $data['time_increment']);
				}
				
				if($extend == true) $auction['extends_bids']++;
				else $auction['users_bids']++;

				$bid['user_id']    = $data['user_id'];
				$bid['auction_id'] = $auction['id'];
				$bid['price']      = $auction['price'];
				$bid['credit']     = 0;
				$bid['debit']      = $data['bid_debit'];

				if(!empty($bid_description)) $bid['description'] = $bid_description;
				elseif(!empty($data['autobid'])) $bid['description'] = "auto";
				else $bid['description'] = "manuel";

				if(!empty($data['autobid'])) {
					$autobids = $db->getRow("SELECT bids FROM ". DB_PREFIX ."autobids WHERE id = ".$data['autobid']);
					if(!empty($autobids)){
						if($autobids['bids'] >= $data['bid_debit']) {
							$autobids['bids'] -= $data['bid_debit'];
							$db->update("autobids", array('bids' => $autobids['bids']), "id = {$data['autobid']}");
						} else return $auction;
					}
				}

				$auction['leader_id'] = $data['user_id'];

				$success = $db->update(
					"auctions",
					array(
						'end_time' => $auction['end_time'],
						'price' => $auction['price'],
						'extends_bids' => $auction['extends_bids'],
						'users_bids' => $auction['users_bids'],
						'leader_id' => $auction['leader_id']
					),
					"id = {$auction['id']}"
				);

				if($success) {
					$db->insert("bids", array(
						user_id => $data['user_id'],
						auction_id => $auction['id'],
						price => $bid['price'],
						description => $bid['description'],
						credit => $bid['credit'],
						debit => $bid['debit'],
						created => date('Y-m-d H:i:s')
					));
					clearCache($auction['id'], $data['user_id']);
					$message = "offre validée";
				} else $message = "problème";

				$auction['Auction']['success'] = true;
				$auction['Bid']['description'] = $bid['description'];
				$auction['Bid']['user_id']     = $bid['user_id'];
			} else {
				$message = "Vous n'avez plus d'offres";
				$message .= '<script language="JavaScript" type="text/javascript">
								window.location.replace("/packages");
							</script>';
			}
		}
		if($auction['type'] != 4) fixDoubleBids($auction['id']);
		echo $message;
	} else return false;
}

function fixDoubleBids($auction_id = null) {
	$db = Database::getInstance();
	$bid_histories = $db->getRows("SELECT * FROM ". DB_PREFIX ."bids WHERE credit = 0 AND auction_id = ".$auction_id." ORDER BY id DESC LIMIT 2");

	if(sizeof($bid_histories) > 0) {
		$user_id = 0;
		foreach($bid_histories as $bid) {
			if(empty($user_id)) $user_id = $bid['user_id'];
			else {
				if($bid['user_id'] == $user_id) {
					$db->delete("bids", "id = {$bid['id']}");
					clearCache($auction_id, $bid['user_id']);
				}
			}
		}
	}
}

function balance($user_id) {
	$db = Database::getInstance();
	$credit = $db->getRow("SELECT SUM(credit) as credit FROM ". DB_PREFIX ."bids WHERE user_id = {$user_id}");
	$debit = $db->getRow("SELECT SUM(debit) as debit FROM ". DB_PREFIX ."bids WHERE user_id = {$user_id}");
	return $credit['credit'] - $debit['debit'];
}

function closeAuction($auction = array()) {
	$db = Database::getInstance();

	$db->update("auctions", array('closed'=> 1, 'end_time' => date('Y-m-d H:i:s')), "id = {$auction['id']}");
	usleep(250000);
	$bid = lastBid($auction['id']);

	if(!empty($bid)) {
		$db->update("auctions", array('winner_id' => $bid['user_id'], 'status_id' => 4), "id={$auction['id']}");

		// send email to winner
		$user = $db->getRow("SELECT username, email FROM ". DB_PREFIX ."users WHERE id=".$bid['user_id']);

		tools::sendMail($user['email'], 'won_auction', array(
			'username' => $user['username'],
			'auction_id' => $auction['id']
		));
	}

	clearCache($auction['id']);
	$db->delete("extends", "auction_id = {$auction['id']}");

	if(!empty($auction['podium'])) {
		$podium_data = $db->getRows("SELECT DISTINCT user_id FROM ". DB_PREFIX ."bids WHERE auction_id=".$auction['id']." AND (description = 'manual' OR description = 'auto') AND user_id != ".$bid['user_id']." ORDER BY id DESC LIMIT 2");
		$users = array();
		$i=0;
		foreach($podium_data as $podium) {
			$user_data = $db->getRow("SELECT username, email, autobidder FROM ". DB_PREFIX ."users WHERE id={$podium['user_id']}");
			$users[$i]['user_id'] = $podium['user_id'];
			$users[$i]['username'] = $user_data['username'];
			$users[$i]['email'] = $user_data['email'];
			$users[$i]['autobidder'] = $user_data['autobidder'];
			$i++;
		}
		
		if(empty($users[0]['autobidder'])) {
			$db->insert("bids", array(
				'user_id' => $users[0]['user_id'],
				'auction_id' => $auction['id'],
				'description' => 'free_credits#podium#second',
				'credit' => $auction['second_credits'],
				'created' => date('Y-m-d H:i:s')
			));
		}
		
		if(empty($users[1]['autobidder'])) {
			$db->insert("bids", array(
				'user_id' => $users[1]['user_id'],
				'auction_id' => $auction['id'],
				'description' => 'free_credits#podium#third',
				'credit' => $auction['third_credits'],
				'created' => date('Y-m-d H:i:s')
			));
		}
		
		$db->update("auctions", array('second' => $users[0]['username'], 'third' => $users[1]['username']), "id={$auction['id']}");
	}
}

function clearCache($auction_id = null, $user_id = null) {
	if(!empty($auction_id)) {
		tools::deleteCache('auction_view_'.$auction_id);
		tools::deleteCache('auction_'.$auction_id);
	}

	if(!empty($user_id)) {
		tools::deleteCache('bids_balance_'.$user_id);
	}
}

?>
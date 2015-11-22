<?php

function get($name = null, $auction_id = null, $cache = true) {
	$db = database::getInstance();

	if($cache == true) {
		$setting = cacheRead($name.'_setting');
		
		if(!empty($setting)) return $setting;
		else {
			$setting = $db->getRow("SELECT value FROM ". _DB_PREFIX_ ."settings WHERE name = '{$name}'");
			if(!empty($setting)) return $setting['value'];
			else return false;
		}
	}
	
	$increments = $db->getRow("SELECT * FROM ". _DB_PREFIX_ ."increments WHERE auction_id = {$auction_id}");
	return $increments[$name];
}

function checkCanClose($id, $isPeakNow, $timeCheck = true) {
	$db = database::getInstance();
	$auction = $db->getRow("SELECT id, product_id, end_time, type, peak_only, price, minimum_price, leader_id, extends, extends_limit, extends_bids, users_bids, fixed_price FROM ". _DB_PREFIX_ ."auctions WHERE id = {$id}");

	if($timeCheck == true) {
		if(strtotime($auction['end_time']) > time()) return false;
	}

	if($auction['peak_only'] == 1 && !$isPeakNow) return false;
	
	if($auction['extends'] == 1) {
		$isExtend = $db->getRow("SELECT id FROM ". _DB_PREFIX_ ."users WHERE id={$auction['leader_id']} AND autobidder=1");
		$product = $db->getRow("SELECT price FROM ". _DB_PREFIX_ ."products WHERE id={$auction['product_id']}");
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

	$autobids = $db->getRows("SELECT user_id FROM ". _DB_PREFIX_ ."autobids WHERE bids > 0 AND minimum_price <= '".$auction['price']."' AND maximum_price > '".$auction['price']."' AND auction_id = ".$auction['id']." AND user_id != ".$latest_bid['user_id']);
	if(sizeof($autobids) > 0) {
		foreach($autobids as $autobid) {
			if(balance($autobid['user_id']) > 0) return false;
		}
	}
	return true;
}

function lastBid($auction_id = null) {
	$lastBid = $db->getRow("SELECT b.id, b.debit, u.username, b.description, b.user_id, u.autobidder, b.created FROM ". _DB_PREFIX_ ."bids b, ". _DB_PREFIX_ ."users u WHERE b.auction_id = ".$auction_id." AND b.user_id = u.id ORDER BY b.id DESC");
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
	$extend = mysql_fetch_array(mysql_query("SELECT * FROM ". _DB_PREFIX_ ."extends WHERE auction_id = ".$auction_id.""), MYSQL_ASSOC);

	if(!empty($extend)) {
		if($extend['end_time'] == $end_time) {
			if($extend['deploy'] <= date('Y-m-d H:i:s')) {
				placeAutobid($auction_id, $data, time() - $end_time);
				mysql_query("DELETE FROM ". _DB_PREFIX_ ."extends WHERE auction_id = ".$auction_id."");
				$auction = mysql_fetch_array(mysql_query("SELECT end_time FROM ". _DB_PREFIX_ ."auctions WHERE id = ".$auction_id.""), MYSQL_ASSOC);
				$end_time = $auction['end_time'];
			} else return false;
		} else mysql_query("DELETE FROM ". _DB_PREFIX_ ."extends WHERE auction_id = ".$auction_id."");
	}

	$str_end_time = strtotime($end_time);
	$timeDifference = $str_end_time - time();
	$randomTime = rand(3, $timeDifference);
	$deploy = date('Y-m-d H:i:s', $str_end_time - $randomTime);
	mysql_query("INSERT INTO ". _DB_PREFIX_ ."extends VALUES('', '".$auction_id."', '".$deploy."', '".$end_time."')");
	return $data;
}

function placeAutobid($id, $data = array(), $timeEnding = 0) {
	$data['auction_id']	= $id;
	$bid = lastBid($id);

	if(!empty($bid)) {
		$bidder = $bid['user_id'];
		if(empty($user)) {
			$user = mysql_fetch_array(mysql_query("SELECT id FROM ". _DB_PREFIX_ ."users WHERE active=1 AND autobidder=1 AND id != ".$bidder." ORDER BY rand()"), MYSQL_ASSOC);
			$data['user_id'] = $user['id'];
		}
	} else {
		$user = mysql_fetch_array(mysql_query("SELECT id FROM ". _DB_PREFIX_ ."users WHERE active=1 AND autobidder=1 ORDER BY rand()"), MYSQL_ASSOC);
		$data['user_id'] = $user['id'];
	}

	if(!empty($user)) $auction = bid($data, true, 'manual');
	else return null;
}

function bid($data = array(), $extend = false, $bid_description = null) {
	global $config;

	$canBid = true;
	$message = '';

	if(empty($data['user_id'])) {
		$message = 'Connectez-vous';
		$canBid = false;
		$data['user_id'] = 0;
	}

	// Get the auction
	$auction_id = $data['auction_id'];
	$auction = mysql_fetch_array(mysql_query("SELECT id, product_id, start_time, end_time, type, price, status_id, peak_only, closed, minimum_price, pred_cost, extends_bids, users_bids, created FROM ". _DB_PREFIX_ ."auctions WHERE id = ".$auction_id.""), MYSQL_ASSOC);

	if(!empty($auction)){
		if(!empty($auction['free']) || $auction['type'] == 1) $data['bid_debit'] = 0;
		if($auction['type'] == 8) {
			$already_bid = mysql_fetch_array(mysql_query("SELECT id FROM ". _DB_PREFIX_ ."bids WHERE user_id=".$data['user_id']." && auction_id=".$auction['id']." AND debit > 0"), MYSQL_ASSOC);
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
			$check_win = mysql_fetch_array(mysql_query("SELECT count(id) AS total FROM ". _DB_PREFIX_ ."auctions WHERE winner_id=".$data['user_id']." AND end_time BETWEEN '".$firstDay."' AND '".$lastDay."'"), MYSQL_ASSOC);
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
			$already_win = mysql_fetch_array(mysql_query("SELECT id FROM ". _DB_PREFIX_ ."auctions WHERE winner_id=".$data['user_id'].""), MYSQL_ASSOC);
			if($already_win) {
				$message = 'Enchère pour débutants';
				$canBid = false;
			}
		}
		
		if($auction['type'] == 6 && $extend == false) {
			$product = mysql_fetch_array(mysql_query("SELECT price FROM ". _DB_PREFIX_ ."products WHERE id=".$auction['product_id'].""), MYSQL_ASSOC);
			$bid_value = mysql_fetch_array(mysql_query("SELECT value FROM ". _DB_PREFIX_ ."settings WHERE name='bid_value'"));
			
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
		$bought = mysql_fetch_array(mysql_query("SELECT id FROM ". _DB_PREFIX_ ."auctions WHERE buy_id=".$auction['id']." AND winner_id=".$data['user_id'].""));
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
					$autobids = mysql_fetch_array(mysql_query("SELECT bids FROM ". _DB_PREFIX_ ."autobids WHERE id = ".$data['autobid']), MYSQL_ASSOC);
					if(!empty($autobids)){
						if($autobids['bids'] >= $data['bid_debit']) {
							$autobids['bids'] -= $data['bid_debit'];
							mysql_query("UPDATE ". _DB_PREFIX_ ."autobids SET bids = ".$autobids['bids']." WHERE id = ".$data['autobid']."");
						} else return $auction;
					}
				}

				$auction['leader_id'] = $data['user_id'];

				$success = mysql_query("UPDATE ". _DB_PREFIX_ ."auctions SET end_time = '".$auction['end_time']."', price = '".$auction['price']."', extends_bids = ".$auction['extends_bids'].", users_bids = ".$auction['users_bids'].", leader_id = ".$auction['leader_id']." WHERE id = ".$auction['id']);
				if($success == 1) {
					mysql_query("INSERT INTO ". _DB_PREFIX_ ."bids (user_id, auction_id, price, description, credit, debit, created) VALUES ('".$bid['user_id']."', '".$bid['auction_id']."', '".$bid['price']."', '".$bid['description']."', '".$bid['credit']."', '".$bid['debit']."', '".date('Y-m-d H:i:s')."')");
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
	$bid_histories = mysql_query("SELECT * FROM ". _DB_PREFIX_ ."bids WHERE credit = 0 AND auction_id = ".$auction_id." ORDER BY id DESC LIMIT 2");
	$total_bids    = mysql_num_rows($bid_histories);

	if($total_bids > 0) {
		$user_id = 0;
		while($bid = mysql_fetch_array($bid_histories, MYSQL_ASSOC)) {
			if(empty($user_id)) $user_id = $bid['user_id'];
			else {
				if($bid['user_id'] == $user_id) {
					mysql_query("DELETE FROM ". _DB_PREFIX_ ."bids WHERE id = ".$bid['id']);
					clearCache($auction_id, $bid['user_id']);
				}
			}
		}
	}
}

function balance($user_id) {
	global $config;
	$credit = mysql_fetch_array(mysql_query("SELECT SUM(credit) as credit FROM ". _DB_PREFIX_ ."bids WHERE user_id = ".$user_id.""), MYSQL_ASSOC);
	$debit = mysql_fetch_array(mysql_query("SELECT SUM(debit) as debit FROM ". _DB_PREFIX_ ."bids WHERE user_id = ".$user_id.""), MYSQL_ASSOC);
	return $credit['credit'] - $debit['debit'];
}

function closeAuction($auction = array()) {
	global $config;

	mysql_query("UPDATE ". _DB_PREFIX_ ."auctions SET closed=1, end_time = '".date('Y-m-d H:i:s')."' WHERE id = ".$auction['id']);
	usleep(250000);
	$bid = lastBid($auction['id']);

	if(!empty($bid)) {
		mysql_query("UPDATE ". _DB_PREFIX_ ."auctions SET winner_id=".$bid['user_id'].", status_id=4 WHERE id=".$auction['id']);
	}
	
	// send email to winner
	$user = mysql_fetch_array(mysql_query("SELECT username, email FROM ". _DB_PREFIX_ ."users WHERE id=".$bid['user_id']), MYSQL_ASSOC);
	
	tools::sendMail($user['email'], 'won_auction', array(
		'username' => $user['username'],
		'auction_id' => $auction['id']
	));

	clearCache($auction['id']);
	mysql_query("DELETE FROM ". _DB_PREFIX_ ."extends WHERE auction_id = ".$auction['id']);

	if(!empty($auction['podium'])) {
		$podium_data = mysql_query("SELECT DISTINCT user_id FROM ". _DB_PREFIX_ ."bids WHERE auction_id=".$auction['id']." AND (description = 'manual' OR description = 'auto') AND user_id != ".$bid['user_id']." ORDER BY id DESC LIMIT 2");
		$users = array();
		$i=0;
		while($podium = mysql_fetch_array($podium_data)) {
			$user_data = mysql_fetch_array(mysql_query("SELECT username, email, autobidder FROM ". _DB_PREFIX_ ."users WHERE id=".$podium['user_id'].""));
			$users[$i]['user_id'] = $podium['user_id'];
			$users[$i]['username'] = $user_data['username'];
			$users[$i]['email'] = $user_data['email'];
			$users[$i]['autobidder'] = $user_data['autobidder'];
			$i++;
		}
		
		if(empty($users[0]['autobidder'])) {
			mysql_query("INSERT INTO ". _DB_PREFIX_ ."bids (user_id, auction_id, description, credit, created) VALUES ('".$users[0]['user_id']."', '".$auction['id']."', 'free_credits#podium#second', '".$auction['second_credits']."', '".date('Y-m-d H:i:s')."')");
		}
		
		if(empty($users[1]['autobidder'])) {
			mysql_query("INSERT INTO ". _DB_PREFIX_ ."bids (user_id, auction_id, description, credit, created) VALUES ('".$users[1]['user_id']."', '".$auction['id']."', 'free_credits#podium#third', '".$auction['third_credits']."', '".date('Y-m-d H:i:s')."')");
		}
		
		mysql_query("UPDATE ". _DB_PREFIX_ ."auctions SET second='".$users[0]['username']."', third='".$users[1]['username']."' WHERE id=".$auction['id']."");
	}
}

function clearCache($auction_id = null, $user_id = null) {
	if(!empty($auction_id)) {
		cacheDelete('auction_view_'.$auction_id);
		cacheDelete('auction_'.$auction_id);
	}

	if(!empty($user_id)) {
		cacheDelete('bids_balance_'.$user_id);
	}
}

?>
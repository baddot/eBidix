<?php

define('_DIR_', dirname(__FILE__));
require_once _DIR_ . '/config/settings.inc.php';
require_once _DIR_ . '/config/db.php';
require_once _DIR_ . '/app/core/database.class.php';
require_once _DIR_ . '/app/core/tools.class.php';
require_once _DIR_ . '/app/libs/fastjson/fastjson.php';

session_start();

if(!empty($_SESSION['user_id'])) $user_id = $_SESSION['user_id'];
else $user_id = null;

date_default_timezone_set($settings['app']['timezone']);

$isPeakNow = tools::isPeakNow();
$site_online = tools::siteOnline();
$data = $_POST;
if(empty($data)) die('No data given');
$results = array();

foreach($data as $key => $value) {
	
	if(!empty($_GET['histories'])) $result = tools::readCache('auction_view_'.$value);
	else $result = tools::readCache('auction_'.$value);

	if(empty($result)) {
		$db = database::getInstance();
	
		// gettting data
		$auction = $db->getRow("SELECT id, product_id, start_time, end_time, type, price, peak_only, winner_id, closed, status_id, fixed_price FROM ". DB_PREFIX ."auctions WHERE id = {$value}");
		$product = $db->getRow("SELECT id, price FROM ". DB_PREFIX ."products WHERE id = ".$auction['product_id']);
		$last_bid = $db->getRow("SELECT b.id, b.user_id, b.description, b.created, u.username FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u WHERE b.user_id = u.id AND b.auction_id = ".$auction['id']." AND b.credit = 0 ORDER BY b.id DESC LIMIT 1");
		
		// formatting auction array
		$auction['closes_on'] = tools::niceShort($auction['end_time']);
		$auction['element']	= $key;
		$result = array();
		$result['Product'] = $product;

		if($auction['closed'] == 1) {
			$result['LastBid']['username'] = ($auction['status_id'] == 6) ? 'aucun gagnant' : utf8_encode("Remport&eacute; par ".$last_bid['username']);
		} else {
			if(!empty($last_bid['username'])) $result['LastBid']['username'] = utf8_encode($last_bid['username'].' a la main');
			else $result['LastBid']['username'] = "";
		}
		
		if($auction['type'] == 4) {
			$auction['price'] = $auction['fixed_price'];
		}
		
		if($auction['type'] == 8 && $auction['status_id'] == 1) {
			$bid_pred_nb = $db->getRow("SELECT count(id) AS total FROM ". DB_PREFIX ."bids WHERE auction_id = :auction_id AND debit > 0", array('auction_id', $auction['id']));
			$auction['bid_pred_nb'] = $bid_pred_nb['total'];
		}
		
		if(!empty($_GET['histories'])) {
			$res = $db->getRows("SELECT b.id, b.user_id, b.price, b.description, b.debit, b.created, u.username FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u WHERE b.credit = 0 AND b.user_id = u.id AND b.auction_id = ".$auction['id']." ORDER BY b.id DESC LIMIT 10");
			
			if ($res) {
				$bid_histories_result = array();

				foreach ($res as $row) {
					$bid_history['Bid']['id']          = $row['id'];
					$bid_history['Bid']['created']     = tools::niceShort($row['created']);
					$bid_history['Bid']['description'] = $row['description'];
					$bid_history['Bid']['username']    = utf8_encode($row['username']);
					$bid_history['Bid']['amount']      = $row['price'].'&euro;';
				    $bid_histories_result[] = $bid_history;
				}
				$result['Histories'] = $bid_histories_result;
			}
		}
		$result['Auction'] = $auction;

		// writing data to the application cache
		if(!empty($_GET['histories'])) $auction = tools::writeCache('auction_view_'.$value, $result);
		else $auction = tools::writeCache('auction_'.$value, $result);
	}
	$result['User_id'] = $user_id;
	
	if (!empty($user_id)) {
		$balance = tools::readCache('bids_balance_'.$user_id);
		if (empty($balance)) {
			$balance = database::getInstance()->getRow("SELECT SUM(credit) - SUM(debit) AS balance FROM ". DB_PREFIX ."bids WHERE user_id = {$user_id}");
			tools::writeCache('bids_balance_'.$user_id, $balance);
		}
		$result['Balance'] = $balance['balance'];
	}

	$result['Auction']['price'] = $result['Auction']['price'];
	$result['Auction']['serverTimestamp'] = time();
	$result['Auction']['serverTimeString'] = date('d-m-Y, H:i:s');

	$result['Auction']['time_left']	= strtotime($result['Auction']['end_time']) - time();
	if ($result['Auction']['time_left'] <= 0 && $result['Auction']['closed'] == 0){
		$result['Auction']['time_left'] = 1;
	}

	if ($site_online == 'no') {
		$result['Auction']['isPeakNow'] 	= 0;
		$result['Auction']['peak_only'] 	= 1;
	} else $result['Auction']['isPeakNow'] 	= $isPeakNow;
	
	$result['Auction']['start_time_string'] = tools::getStringTime($result['Auction']['start_time']);
	$result['Auction']['end_time_string']   = tools::getStringTime($result['Auction']['end_time']);
	$result['Auction']['end_time'] 		  	= strtotime($result['Auction']['end_time']);
	
	$results[] = $result;
}

header('Content-type: text/json');
$json = new FastJSON();
echo $json->convert($results);

?>
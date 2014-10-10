<?php

require_once 'config/db.php';
require_once 'config/settings.inc.php';
require_once 'app/core/database.class.php';
require_once 'app/core/tools.class.php';
require_once 'daemons_functions.php';
date_default_timezone_set($settings['app']['timezone']);

switch($_GET['type']){
	case 'autobid':
		if(cacheRead('autobid.pid')) return false;
		else cacheWrite('autobid.pid', microtime(), 50);
		
		$db = database::getInstance();
		
		$data = array();
		$data['auction_peak_start'] = get('auction_peak_start');
		$data['auction_peak_end'] = get('auction_peak_end');
		$data['isPeakNow'] = isPeakNow();

		$expireTime = time() + 60;

		while (time() < $expireTime) {
			$autobidEndTime = date('Y-m-d H:i:s', time() + 10);
			$sql = "SELECT b.auction_id, a.price, b.id, b.minimum_price, b.maximum_price, b.user_id 
					FROM ". DB_PREFIX ."auctions a, ". DB_PREFIX ."autobids b 
					WHERE a.id = b.auction_id AND a.end_time < '".$autobidEndTime."' AND a.closed = 0 
					AND a.active = 1 AND a.status_id = 3 AND b.bids > 0 AND b.active=1 ORDER BY b.created DESC";
			if ($res = $db->query($sql)) {
				if ($res->fetchColumn() > 0) {
					foreach ($res as $row) {
						if($row['price'] >= $row['minimum_price'] && $row['price'] < $row['maximum_price']) {
							$bid = lastBid($row['auction_id']);
							
							if(!empty($bid['user_id']) && $bid['user_id'] == $row['user_id']) {
								continue;
							}
							
							$data['auction_id']	     = $row['auction_id'];
							$data['user_id']	     = $row['user_id'];
							$data['autobid']	     = $row['id'];
							$data['bid_debit'] 		 = get('bid_debit', $data['auction_id'], 0);
							$data['price_increment'] = get('price_increment', $data['auction_id'], 0);
							$data['time_increment']  = get('time_increment', $data['auction_id'], 0);

							$result = bid($data);
						}	
					}
				}
			}
			sleep(4);
		}
		cacheDelete('autobid.pid');
		break;
		
	case 'close':
		if(cacheRead('close.pid')) return false;
		else cacheWrite('close.pid', microtime(), 50);
		
		$db = database::getInstance();
		
		$isPeakNow = isPeakNow();	
		$expireTime = time() + 60;

		while (time() < $expireTime) {
			$sql = "SELECT id, peak_only, end_time FROM ". DB_PREFIX ."auctions WHERE end_time <= '".date('Y-m-d H:i:s')."' AND closed=0 AND active=1 AND status_id=3";
			if ($res = $db->query($sql)) {			
				if ($res->fetchColumn() > 0) {
					foreach ($res as $auction) {
						if(checkCanClose($auction['id'], $isPeakNow) == false) {
							if($auction['peak_only'] == 1 && !$isPeakNow) {
								$peak = isPeakNow(true);
								if(strtotime($peak['peak_start']) < time()) {
									$peak['peak_start'] = date('Y-m-d H:i:s', strtotime($peak['peak_start']) + 86400);	
								}
								
								$seconds_after_peak = strtotime($auction['end_time']) - strtotime($peak['peak_end']);
								$time = strtotime($peak['peak_start']) + $seconds_after_peak;	
								$endTime = date('Y-m-d H:i:s', $time);
								
								if(strtotime($endTime) < time()) {
									$endTime = date('Y-m-d H:i:s', strtotime($endTime) + 86400);	
								}
								
								mysql_query("UPDATE ". DB_PREFIX ."auctions SET end_time = '".$endTime."' WHERE id = ".$auction['id']);
							} else {			
								$data['auction_peak_start'] = get('auction_peak_start');
								$data['auction_peak_end'] 	= get('auction_peak_end');
								$data['isPeakNow']  		= $isPeakNow;
								$data['time_increment'] 	= get('time_increment', $auction['id'], 0);
								$data['bid_debit'] 			= get('bid_debit', $auction['id'], 0);
								$data['price_increment'] 	= get('price_increment', $auction['id'], 0);
		
								placeAutobid($auction['id'], $data, false, 3);
							} 
						} else closeAuction($auction);
					}
				}
			}
			usleep(500000);
		}
		cacheDelete('close.pid');
		break;
}

?>
<?php

class statsController extends appController
{	
	function admin_accounting() {
		if(isset($_POST['actions'])) {
			if($_POST['actions'] == 'today') {
				$day = date("Y-m-d");
				$conditions = "AND created BETWEEN '".$day." 00:00:00' AND '".$day." 23:59:59'";
			} elseif($_POST['actions'] == 'yesterday') {
				$startTime  = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m'), date('d')-1, date('Y')));
				$endTime    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-1, date('Y')));
				$conditions = "AND created BETWEEN '".$startTime."' AND '".$endTime."'";
			} elseif($_POST['actions'] == 'this_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d"), date("Y")));	
				$conditions = "AND created BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'last_week') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0,0,0, date("m"), date("d")-date("w")+1-7, date("Y")));
				$lastDay    = date('Y-m-d H:i:s', mktime(23,59,59, date("m"), 7-date("w")+date("d")-7, date("Y")));	
				$conditions = "AND created BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'this_month') {
				$month      = date("Y-m");
				$conditions = "AND DATE_FORMAT(created, '%Y-%m') = '".$month."'";
			} elseif($_POST['actions'] == 'last_month') {
				$firstDay   = date('Y-m-d H:i:s', mktime(0, 0, 0, date('m')-1, 1, date('Y')));
				$lastDay    = date('Y-m-d H:i:s', mktime(23, 59, 59, date('m'), date('d')-date('j'), date('Y')));
				$conditions = "AND a.created BETWEEN '".$firstDay."' AND '".$lastDay."'";
			} elseif($_POST['actions'] == 'this_year') {
				$year = date("Y");
				$conditions = "AND DATE_FORMAT(created, '%Y') = '".$year."'";
			} elseif($_POST['actions'] == 'last_year') {
				$year = date("Y")-1;
				$conditions = "AND DATE_FORMAT(created, '%Y') = '".$year."'";
			}
		} else $conditions = '';
		
		$i = 0;
		$stats = array();
		
		// getting auctions data
		$auctionsData = $this->exec_all("SELECT id, product_id, price, winner_id, status_id, buy_id, payment 
									     FROM ". DB_PREFIX ."auctions
									     WHERE closed=1 AND payment != '' ".$conditions."");
		
		if($auctionsData) {
			foreach($auctionsData as $auction) {
				$stats[$i]['auction_id']      = $auction['id'];
				$stats[$i]['type']            = (empty($auction['buy_id'])) ? 1 : 2;
				$stats[$i]['price']           = $auction['price'];
				$stats[$i]['winner_id']       = $auction['winner_id'];
				$winner = $this->exec_one("SELECT username FROM ". DB_PREFIX ."users WHERE id=".$auction['winner_id']."");
				$stats[$i]['winner_username'] = $winner['username'];
				$spentCredits = $this->exec_one("SELECT SUM(b.debit) as debit FROM ". DB_PREFIX ."bids b, ". DB_PREFIX ."users u WHERE b.auction_id=".$auction['id']." AND u.id=b.user_id AND u.autobidder=0");
				$stats[$i]['spent_credits']   = number_format($spentCredits['debit'] / $this->settings['app']['bid_value'], 2, '.', '');
				$paymentExplode = explode('#', $auction['payment']);
				$stats[$i]['date']            = $paymentExplode[1];
				$payment = $this->exec_one("SELECT name, fixed_fees, variable_fees FROM ". DB_PREFIX ."payments WHERE id=".$paymentExplode[0]."");
				$stats[$i]['payment']         = $payment['name'];
				$product = $this->exec_one("SELECT delivery_cost ". DB_PREFIX ."products WHERE id=".$auction['product_id']."");
				$stats[$i]['fees']            = number_format($payment['fixed_fees'] + (($auction['price'] + $product['delivery_cost']) * $payment['variable_fees'] / 100), 2, '.', '');
				$stats[$i]['outgoings']       = $stats[$i]['fees'];
				$stats[$i]['earnings']        = number_format($auction['price'] + $stats[$i]['spent_credits'] - $stats[$i]['outgoings'], 2, '.', '');
				$i++;
			}
		}
		
		// getting products buys
		$productsBuysData = $this->exec_all("SELECT b.created, b.auction_id, b.product_id, p.name, p.price 
											 FROM ". DB_PREFIX ."products_buys b, ". DB_PREFIX ."products p 
											 WHERE p.id=b.product_id ".$conditions."");
		if($productsBuysData) {
			foreach($productsBuysData as $productBuy) {
				$stats[$i]['auction_id'] = $productBuy['auction_id'];
				$stats[$i]['product_id'] = $productBuy['product_id'];
				$stats[$i]['date']       = $productBuy['created'];
				$stats[$i]['name']       = $productBuy['name'];
				$stats[$i]['type']       = 3;
				$stats[$i]['outgoings']  = $productBuy['price'];
				$stats[$i]['spent_total'] = number_format($productBuy['price'], 2, '.', '');
				$data['total_spent_ttc'] += $stats[$i]['spent_total'];
				$stats[$i]['earnings_total'] = number_format(-$stats[$i]['spent_total'], 2, '.', '');
				$data['total_earning_ttc'] += $stats[$i]['earnings_total'];
				$i++;
			}
		}
		
		$this->smarty->assign(array('stats' => $stats));
		
		if(isset($_GET['export'])) $this->smarty->display('admin/dashboard/export.tpl');
		else $this->smarty->display('admin/dashboard/accounting.tpl');
	}
	
	function admin_connexions() {
		$connexions = $this->exec_all("SELECT c.created, c.user_id, u.username FROM ". DB_PREFIX ."connexions c, ". DB_PREFIX ."users u WHERE u.id=c.user_id ORDER BY c.created DESC");
		
		$this->smarty->assign(array('connexions' => $connexions));
		$this->smarty->display('admin/dashboard/connexions.tpl');
	}
}
?>
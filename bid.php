<?php

define('_DIR_', dirname(__FILE__));
require_once 'config/db.php';
require_once 'config/settings.inc.php';
require_once 'app/core/tools.class.php';
require_once 'app/core/database.class.php';
require_once 'daemons_functions.php';

date_default_timezone_set($settings['app']['timezone']);

session_start();

if(!empty($_SESSION['user_id'])) $data['user_id'] = $_SESSION['user_id'];
else $data['user_id'] = null;

if(!empty($_GET['id'])) {
	$data['auction_id']	     = htmlspecialchars($_GET['id'], ENT_QUOTES, 'UTF-8');
	$data['time_increment']  = get('time_increment', $data['auction_id'], 0);
	$data['bid_debit'] 		 = get('bid_debit', $data['auction_id'], 0);
	$data['price_increment'] = get('price_increment', $data['auction_id'], 0);
}

$data['isPeakNow']  = tools::isPeakNow();

// bid the auction
$auction = bid($data);

?>
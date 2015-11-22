<?php

/*******************************************************************************
 *                         Application settings
 *******************************************************************************
 *      Author:     BWeb Media
 *      Email:      contact@bwebmedia.com
 *      Website:    http://www.bwebmedia.com
 *
 *      File:       settings.php
 *      Version:    1.2
 *      Copyright:  (c) 2014 - BWeb Media 
 *      
 ******************************************************************************/

$settings = array(
	'app' => array(
		'encoding' => 'utf-8',
		'language' => 'fr',
		'site_name' => 'demo.ebidix.com',
		'site_url' => 'http://demo.ebidix.com',
		'currency' => 'EUR',
		'currency_code' => '&euro;',
		'timezone' => 'Europe/Paris', // default timezone
		'salt' => '$2a$07$m4d31nRU5514bYg1o7s412$',
		'captcha' => true,
		'per_page' => 30, // number of elements to show per page
		'last_purchases' => true,
		'testimonials' => true,
		'poll' => false,
		'coupons' => true,
		'referrals' => true,
		'forum' => false,
		'ip_block' => 1,
		'cache' => false,
		'debug' => false
	),
	
	'auction' => array(
		'home_limit' => 6, // number of auctions to display on homepage
		'won_month_limit' => 5,
		'buy_now' => true,
		'buy_now_nb_limit' => 10,
		'buy_now_time_limit' => 7,
		'auction_autostart' => false,
		'credits_deal' => true,
		'outsider' => false,
		'labels' => false,
		'video' => false,
		'bids_history_limit' => 10, // number of last bids on product page
		'increments' => 'dynamic', // single, dynamic
		'waiting_time' => 10,
		'closed_limit' => 100,
		'podium' => array(
			'active' => true,
			'refund' => 'amount', // amount, percent
			'percent_1' => 0.5,
			'percent_2' => 0.25
		)
	),
	
	'thumbnails' => array(
		'product_full' => array(
			'width' => 400,
			'height' => 400
		),
		'product_gallery' => array(
			'width' => 240,
			'height' => 240
		),
		'product_thumb' => array(
			'width' => 50,
			'height' => 50
		),
		'home_label' => array(
			'width' => 160,
			'height' => 120
		),
		'home_list' => array(
			'width' => 60,
			'height' => 35
		)
	),
	
	'facebook' => array(
		'app_id' => '573818542715607',
		'secret' => 'f13238127390b6dc44e3b92aa91c5e5f',
		'redirect_uri' => 'http://demo.ebidix.com/user/facebook'
	),
	
	'paypal' => array(
		'active' => true,
		'url' => 'https://www.sandbox.paypal.com/cgi-bin/webscr', // https://www.paypal.com/cgi-bin/webscr
		'account' => 'contact@bwebmedia.com',
		'lc' => 'FR'
	),
	
	'google_analytics' => array(
		'active' => true,
		'id' => 'UA-4559156-9',
		'account' => '',
		'password' => '',
		'language' => 'FR'
	)
);

?>

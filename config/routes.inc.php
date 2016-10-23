<?php

$routes = array(
	'closed-auctions' => array(
		'controller' => 'auction',
		'action' => 'closed'
	),
		
	'how-it-works' => array(
		'controller' => 'page',
		'action' => 'view',
		'value' => 'how-it-works'
	),
	
	'packages' => array(
		'controller' => 'package',
		'action' => 'index'
	),
	
	'alert' => array(
		'controller' => 'auction',
		'action' => 'alert'
	),
	
	'watchlist' => array(
		'controller' => 'auction',
		'action' => 'watchlist'
	),
	
	'buy' => array(
		'controller' => 'auction',
		'action' => 'buy'
	),
	
	'autobids' => array(
		'controller' => 'autobid',
		'action' => 'index'
	),
	
	'email-alerts' => array(
		'controller' => 'email',
		'action' => 'user_alerts'
	),
	
	'won-auctions' => array(
		'controller' => 'auction',
		'action' => 'won'
	),
	
	'account' => array(
		'controller' => 'user',
		'action' => 'index'
	),
	
	'login' => array(
		'controller' => 'user',
		'action' => 'login'
	),
	
	'logout' => array(
		'controller' => 'user',
		'action' => 'logout'
	),
	
	'signup' => array(
		'controller' => 'user',
		'action' => 'signup'
	),
		
	'reset-password' => array(
		'controller' => 'user',
		'action' => 'reset'
	),
	
	'edit-account' => array(
		'controller' => 'user',
		'action' => 'edit'
	),
	
	'edit-password' => array(
		'controller' => 'user',
		'action' => 'edit_password'
	),
	
	'newsletters' => array(
		'controller' => 'user',
		'action' => 'newsletters'
	),
	
	'credits' => array(
		'controller' => 'user',
		'action' => 'credits'
	),
	
	'debits' => array(
		'controller' => 'user',
		'action' => 'debits'
	),
	
	'referrals' => array(
		'controller' => 'user',
		'action' => 'referrals'
	),
	
	'invit-friends' => array(
		'controller' => 'user',
		'action' => 'invit'
	),
	
	'add-comment' => array(
		'controller' => 'user',
		'action' => 'add_testimonial'
	),
	
	'messages' => array(
		'controller' => 'user',
		'action' => 'messages'
	),
	
	'unsubscribe' => array(
		'controller' => 'user',
		'action' => 'unsubscribe'
	),
	
	'contact' => array(
		'controller' => 'page',
		'action' => 'contact'
	),
	
	'payment' => array(
		'controller' => 'payment',
		'action' => 'index'
	),
	
	'faq' => array(
		'controller' => 'page',
		'action' => 'view',
		'value' => 'faq'
	),
	
	'promotions' => array(
		'controller' => 'page',
		'action' => 'view',
		'value' => 'promotions'
	),
	
	'sitemap' => array(
		'controller' => 'page',
		'action' => 'view',
		'value' => 'sitemap'
	),
	
	'privacy' => array(
		'controller' => 'page',
		'action' => 'view',
		'value' => 'privacy'
	),
	
	'terms' => array(
		'controller' => 'page',
		'action' => 'view',
		'value' => 'terms'
	),
	
	'about' => array(
		'controller' => 'page',
		'action' => 'view',
		'value' => 'about'
	),
	
	'partners' => array(
		'controller' => 'page',
		'action' => 'view',
		'value' => 'partners'
	)
);

?>
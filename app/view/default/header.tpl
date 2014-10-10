<!DOCTYPE html>
<html lang="{$settings.app.language}">
<head>
	<meta charset="{$settings.app.encoding}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>{$settings.app.default_meta_title}</title>
	<meta name="viewport" content="maximum-scale=1">
	<meta name="description" content="{$settings.app.default_meta_description}">
	<meta name="keywords" content="{$settings.app.default_meta_keywords}">
	<link type="text/css" media="screen" rel="stylesheet" href="/assets/css/style.css" />
	<link rel="shortcut icon" type="image/x-icon" href="/assets/img/favicon.ico" />
	<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_EN/sdk.js#xfbml=1&appId=573818542715607&version=v2.0";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<header id="header">
		<div class="inner">
			<div class="logo">
				<a href="/">{$settings.app.site_name}</a>
			</div>
			<div class="top-menu">
				{if $settings.app.show_server_time == 'yes'}<div class="bid-official-time">&nbsp;</div> |{/if} 

				<div class="user-box">
					{if isset($smarty.session.user_id)}
						{if isset($smarty.session.admin)}<a href="/admin" class="admin">Admin</a> - {/if} 
						<a href="/user/logout">{$lang.logout}</a>
					{else}
						<a href="#" id="login">{$lang.Login}</a>
					{/if}
				</div>

				<div class="current-lang">
					<a href="/?lang=fr"><img src="/assets/img/flags/fr.png" alt=""></a> 
					<a href="/?lang=en"><img src="/assets/img/flags/uk.png" alt=""></a> 
					<ul id="menu-lang" style="display:none;">
						<li>
							<img src="/assets/img/flags/uk.png" alt="" class="menu-lang-1">
							<a href="/?lang=en" title="en">English</a>
						</li>
						<li>
							<img src="/assets/img/flags/fr.png" alt="" class="menu-lang-1">
							<a href="/?lang=fr" title="fr">Français</a>
						</li>
						<li>
							<img src="/assets/img/flags/ru.png" alt="" class="menu-lang-1">
							<a href="/?lang=ru" title="ru">Русский</a>
						</li>
					</ul>
				</div>

				<div class="login-box">
					<form method="post" action="/user/login">
						<p><input type="text" name="username" id="username-input" placeholder="{$lang.Username}" required></p>
						<p><input type="password" name="password" placeholder="{$lang.Password}" required></p>
						<p class="login-submit"><button type="submit" name="submit" class="login-button"></button></p>
						<p><a href="/reset-password">{$lang.Password_lost}</a> - <a class="sign-up-link" href="/signup">{$lang.Sign_up}</a></p>
						<p class="line"></p>
						<p>{$lang.Facebook_connect_text}<br><a href="https://www.facebook.com/dialog/oauth?client_id={$settings.facebook.app_id}&redirect_uri={$settings.facebook.redirect_uri}&scope=email"><img src="/assets/img/facebook_connect_button.png" alt="facebook connect button" /></a></p>
					</form>
				</div>
			</div>
		</div>
		
		<nav>
			<ul class="nav">
				<li class="{if isset($active) && $active == 1}active{/if}"><a href="/" class="icon home"><span>{$lang.Menu.Home}</span></a></li>
				<li class="dropdown {if isset($active) && $active == 2}active{/if}">
					<a href="#">{$lang.Menu.Categories}</a>
					<ul>
						{foreach from=$categories item=category}
							<li><a href="/auction/category/{$category.id}">{$category.name}</a></li>
						{/foreach}
					</ul>
				</li>
				<li class="{if isset($active) && $active == 3}active{/if}"><a href="/closed-auctions">{$lang.Menu.Closed_auctions}</a></li>
				<li class="{if isset($active) && $active == 4}active{/if}"><a href="/how-it-works">{$lang.Menu.How_it_works}</a></li>
				{if isset($smarty.session.user_id)}
					<li class="{if isset($active) && $active == 5}active{/if}"><a href="/packages">{$lang.Menu.Buy_credits}</a></li>
					<li class="dropdown {if isset($active) && $active == 6}active{/if}">
						<a href="/account">{$lang.Menu.My_account}</a>
						<ul>
							<li><a href="/edit-account">{$lang.User_menu.Edit_account}</a></li>
							<li><a href="/edit-password">{$lang.User_menu.Change_password}</a></li>
							<li><a href="/messages">{$lang.User_menu.My_messages}</a></li>
							<li><a href="/watchlist">{$lang.User_menu.My_watchlist}</a></li>
							<li><a href="/autobids">{$lang.User_menu.My_autobids}</a></li>
							<li><a href="/email-alerts">{$lang.User_menu.My_email_alerts}</a></li>
							<li><a href="/won-auctions">{$lang.User_menu.My_won_auctions}</a></li>
							<li><a href="/credits">{$lang.User_menu.My_credits}</a></li>
							<li><a href="/debits">{$lang.User_menu.My_debits}</a></li>
							<li><a href="/referrals">{$lang.User_menu.Referrals}</a></li>
							{*<li><a href="/users/invit">{$lang.User_menu.Invit_my_friends}</a></li>*}
						</ul>
					</li>
				{else}
					<li class="{if isset($active) && $active == 7}active{/if}"><a class="signup" href="/signup">{$lang.Menu.Sign_up}</a></li>
				{/if}
			</ul>
		</nav>
	</header>
	
	<div id="wrapper">
		<div id="container">			
			{if isset($smarty.session.flash_message)}{$smarty.session.flash_message}{/if}
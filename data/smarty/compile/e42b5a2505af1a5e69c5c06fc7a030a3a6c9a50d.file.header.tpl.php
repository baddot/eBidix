<?php /* Smarty version Smarty-3.1.17, created on 2014-08-13 16:56:15
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:63147182653eb7c8fc3a637-43128440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e42b5a2505af1a5e69c5c06fc7a030a3a6c9a50d' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/header.tpl',
      1 => 1407935843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '63147182653eb7c8fc3a637-43128440',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'settings' => 0,
    'lang' => 0,
    'active' => 0,
    'categories' => 0,
    'category' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53eb7c8fcd2e49_47372079',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53eb7c8fcd2e49_47372079')) {function content_53eb7c8fcd2e49_47372079($_smarty_tpl) {?><!DOCTYPE html>
<html lang="<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['language'];?>
">
<head>
	<meta charset="<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['encoding'];?>
">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['default_meta_title'];?>
</title>
	<meta name="viewport" content="maximum-scale=1">
	<meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['default_meta_description'];?>
">
	<meta name="keywords" content="<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['default_meta_keywords'];?>
">
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
				<a href="/"><?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['site_name'];?>
</a>
			</div>
			<div class="top-menu">
				<?php if ($_smarty_tpl->tpl_vars['settings']->value['app']['show_server_time']=='yes') {?><div class="bid-official-time">&nbsp;</div> |<?php }?> 

				<div class="user-box">
					<?php if (isset($_SESSION['user_id'])) {?>
						<?php if (isset($_SESSION['admin'])) {?><a href="/admin" class="admin">Admin</a> - <?php }?> 
						<a href="/user/logout"><?php echo $_smarty_tpl->tpl_vars['lang']->value['logout'];?>
</a>
					<?php } else { ?>
						<a href="#" id="login"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Login'];?>
</a>
					<?php }?>
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
						<p><input type="text" name="username" id="username-input" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Username'];?>
" required></p>
						<p><input type="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Password'];?>
" required></p>
						<p class="login-submit"><button type="submit" name="submit" class="login-button"></button></p>
						<p><a href="/reset-password"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Password_lost'];?>
</a> - <a class="sign-up-link" href="/signup"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Sign_up'];?>
</a></p>
						<p class="line"></p>
						<p><?php echo $_smarty_tpl->tpl_vars['lang']->value['Facebook_connect_text'];?>
<br><a href="https://www.facebook.com/dialog/oauth?client_id=<?php echo $_smarty_tpl->tpl_vars['settings']->value['facebook']['app_id'];?>
&redirect_uri=<?php echo $_smarty_tpl->tpl_vars['settings']->value['facebook']['redirect_uri'];?>
&scope=email"><img src="/assets/img/facebook_connect_button.png" alt="facebook connect button" /></a></p>
					</form>
				</div>
			</div>
		</div>
		
		<nav>
			<ul class="nav">
				<li class="<?php if (isset($_smarty_tpl->tpl_vars['active']->value)&&$_smarty_tpl->tpl_vars['active']->value==1) {?>active<?php }?>"><a href="/" class="icon home"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['Home'];?>
</span></a></li>
				<li class="dropdown <?php if (isset($_smarty_tpl->tpl_vars['active']->value)&&$_smarty_tpl->tpl_vars['active']->value==2) {?>active<?php }?>">
					<a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['Categories'];?>
</a>
					<ul>
						<?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
?>
							<li><a href="/auction/category/<?php echo $_smarty_tpl->tpl_vars['category']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['category']->value['name'];?>
</a></li>
						<?php } ?>
					</ul>
				</li>
				<li class="<?php if (isset($_smarty_tpl->tpl_vars['active']->value)&&$_smarty_tpl->tpl_vars['active']->value==3) {?>active<?php }?>"><a href="/closed-auctions"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['Closed_auctions'];?>
</a></li>
				<li class="<?php if (isset($_smarty_tpl->tpl_vars['active']->value)&&$_smarty_tpl->tpl_vars['active']->value==4) {?>active<?php }?>"><a href="/how-it-works"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['How_it_works'];?>
</a></li>
				<?php if (isset($_SESSION['user_id'])) {?>
					<li class="<?php if (isset($_smarty_tpl->tpl_vars['active']->value)&&$_smarty_tpl->tpl_vars['active']->value==5) {?>active<?php }?>"><a href="/packages"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['Buy_credits'];?>
</a></li>
					<li class="dropdown <?php if (isset($_smarty_tpl->tpl_vars['active']->value)&&$_smarty_tpl->tpl_vars['active']->value==6) {?>active<?php }?>">
						<a href="/account"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['My_account'];?>
</a>
						<ul>
							<li><a href="/edit-account"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['Edit_account'];?>
</a></li>
							<li><a href="/edit-password"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['Change_password'];?>
</a></li>
							<li><a href="/messages"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['My_messages'];?>
</a></li>
							<li><a href="/watchlist"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['My_watchlist'];?>
</a></li>
							<li><a href="/autobids"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['My_autobids'];?>
</a></li>
							<li><a href="/email-alerts"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['My_email_alerts'];?>
</a></li>
							<li><a href="/won-auctions"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['My_won_auctions'];?>
</a></li>
							<li><a href="/credits"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['My_credits'];?>
</a></li>
							<li><a href="/debits"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['My_debits'];?>
</a></li>
							<li><a href="/referrals"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_menu']['Referrals'];?>
</a></li>
							
						</ul>
					</li>
				<?php } else { ?>
					<li class="<?php if (isset($_smarty_tpl->tpl_vars['active']->value)&&$_smarty_tpl->tpl_vars['active']->value==7) {?>active<?php }?>"><a class="signup" href="/signup"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['Sign_up'];?>
</a></li>
				<?php }?>
			</ul>
		</nav>
	</header>
	
	<div id="wrapper">
		<div id="container">			
			<?php if (isset($_SESSION['flash_message'])) {?><?php echo $_SESSION['flash_message'];?>
<?php }?><?php }} ?>

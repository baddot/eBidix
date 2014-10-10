<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:06:40
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/elements/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154483707453b4e4e0535255-87728106%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0efc48809a4ae91191bb46f8a6acb8ddf27c83bc' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/elements/header.tpl',
      1 => 1403712445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154483707453b4e4e0535255-87728106',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'nb_messages' => 0,
    'errors' => 0,
    'error' => 0,
    'text' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e4e0628668_06706751',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e4e0628668_06706751')) {function content_53b4e4e0628668_06706751($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $_smarty_tpl->tpl_vars['lang']->value['Admin_panel'];?>
</title>
	<link rel="stylesheet" type="text/css" href="/assets/admin/css/styles.css" media="screen" />
	<link rel="stylesheet" type="text/css" media="screen" href="/assets/admin/css/datePicker.css">
	<script type="text/javascript" src="/assets/admin/js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="/assets/admin/js/jquery-ui-1.8.2.custom.min.js"></script>
	<script type="text/javascript" src="/assets/admin/js/jquery.visualize.js"></script>
	<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="/assets/admin/css/ie7.css" media="screen" />
	<![endif]-->
	<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="/assets/admin/css/ie8.css" media="screen" />
	<![endif]-->
	<!--[if IE]>
    <script language="javascript" type="text/javascript" src="/assets/admin/js/excanvas.js"></script>
    <![endif]-->
	<script type="text/javascript" src="/assets/admin/js/jquery.mousewheel.min.js"></script>
	<script type="text/javascript" src="/assets/admin/js/jquery.wysiwyg.js"></script>
	<script type="text/javascript" src="/assets/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/assets/admin/js/date.js"></script>
	<script type="text/javascript" src="/assets/admin/js/jquery.datePicker.js"></script>
	
		<script type="text/javascript" charset="utf-8">
			$(function()
			{
				$('.date-pick').datePicker().val(new Date().asString()).trigger('change');
			});
		</script>
	
	<script type="text/javascript" src="/assets/admin/js/custom.js"></script>
</head>

<body>
<div id="page-body">
	<div id="wrapper">
		<div id="header">
			<div id="adminbar"><span class="official-time"></span> | <?php echo $_smarty_tpl->tpl_vars['lang']->value['Welcome'];?>
, <strong><?php echo $_SESSION['username'];?>
</strong>! <a class="link" href="/admin/dashboard/message"><?php if (!empty($_smarty_tpl->tpl_vars['nb_messages']->value)) {?><img alt="" src="/assets/admin/images/onebit-icons/ok_messages.png" /><?php } else { ?><img alt="" src="/assets/admin/images/onebit-icons/no_messages.png" /><?php }?></a> <a class="link" href="/" class="logout"><?php echo $_smarty_tpl->tpl_vars['lang']->value['View_site'];?>
</a> | <a href="/user/logout" class="logout"><?php echo $_smarty_tpl->tpl_vars['lang']->value['logout'];?>
</a></div>
		</div>
		<div id="menu-tabs" class="center">
			<ul>
				<li class="active"><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Dashboard'];?>
</a></li>
				<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Auctions_management'];?>
</a></li>
				<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Users_management'];?>
</a></li>
				<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Content_management'];?>
</a></li>
				<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Settings'];?>
</a></li>
			</ul>
		</div>
		
		<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/scroll_menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
		<?php if (isset($_SESSION['flash_message'])) {?><?php echo $_SESSION['flash_message'];?>
<?php }?>
		
		<?php if (!empty($_smarty_tpl->tpl_vars['errors']->value)) {?>
			<div class="flash-message error">
				<span class="strong"><?php echo $_smarty_tpl->tpl_vars['lang']->value['ERROR'];?>
</span> 
				<?php  $_smarty_tpl->tpl_vars['error'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['error']->_loop = false;
 $_smarty_tpl->tpl_vars['text'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['errors']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['error']->key => $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
 $_smarty_tpl->tpl_vars['text']->value = $_smarty_tpl->tpl_vars['error']->key;
?>
					<br /><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['text']->value;?>
<br />
				<?php } ?>
			</div>
		<?php }?><?php }} ?>

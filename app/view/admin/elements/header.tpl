<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>{$lang.Admin_panel}</title>
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
	<script type="text/javascript" src="/assets/admin/js/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="/assets/admin/js/date.js"></script>
	<script type="text/javascript" src="/assets/admin/js/jquery.datePicker.js"></script>
	{literal}
		<script type="text/javascript" charset="utf-8">
			$(function()
			{
				$('.date-pick').datePicker().val(new Date().asString()).trigger('change');
			});
		</script>
	{/literal}
	<script type="text/javascript" src="/assets/admin/js/custom.js"></script>
</head>

<body>
<div id="page-body">
	<div id="wrapper">
		<div id="header">
			<div id="adminbar"><span class="official-time"></span> | {$lang.Welcome}, <strong>{$smarty.session.username}</strong>! <a class="link" href="/admin/dashboard/message">{if !empty($nb_messages)}<img alt="" src="/assets/admin/images/onebit-icons/ok_messages.png" />{else}<img alt="" src="/assets/admin/images/onebit-icons/no_messages.png" />{/if}</a> <a class="link" href="/" class="logout">{$lang.View_site}</a> | <a href="/user/logout" class="logout">{$lang.logout}</a></div>
		</div>
		<div id="menu-tabs" class="center">
			<ul>
				<li class="active"><a href="#">{$lang.Dashboard}</a></li>
				<li><a href="#">{$lang.Auctions_management}</a></li>
				<li><a href="#">{$lang.Users_management}</a></li>
				<li><a href="#">{$lang.Content_management}</a></li>
				<li><a href="#">{$lang.Settings}</a></li>
			</ul>
		</div>
		
		{include file='admin/elements/scroll_menu.tpl'}
		
		{if isset($smarty.session.flash_message)}{$smarty.session.flash_message}{/if}
		
		{if !empty($errors)}
			<div class="flash-message error">
				<span class="strong">{$lang.ERROR}</span> 
				{foreach from=$errors item=error key=text}
					<br />{$error} {$text}<br />
				{/foreach}
			</div>
		{/if}

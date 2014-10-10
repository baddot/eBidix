<?php /* Smarty version Smarty-3.1.17, created on 2014-06-25 18:45:08
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21140004053aafc9468bcb6-97537559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f9cb1313bfed0fc0606de94a921dfcc6a6a22c7a' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/user/login.tpl',
      1 => 1403712454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21140004053aafc9468bcb6-97537559',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53aafc947567d2_62063401',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53aafc947567d2_62063401')) {function content_53aafc947567d2_62063401($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
<div id="left-column">
	<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> > <?php echo $_smarty_tpl->tpl_vars['lang']->value['Login_page'];?>
</div>
	<div class="content">
		<form method="post" action="/user/login">
			<ul>
				<li><input type="text" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Username'];?>
" required autofocus></li>
				<li><input type="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Password'];?>
" required></li>
				<li><input type="submit" class="button green" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Login'];?>
"></li>
			</ul>
		</form>
	</div>
</div>

<div id="right-column">
	<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

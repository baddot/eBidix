<?php /* Smarty version Smarty-3.1.17, created on 2014-07-04 19:22:59
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/user/reset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3863392453b6e2f3b25202-00466309%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e7d203cfabdbca7b38fcd65265e4a94b639a0d2f' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/user/reset.tpl',
      1 => 1403712454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3863392453b6e2f3b25202-00466309',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b6e2f3bf25f2_83161275',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b6e2f3bf25f2_83161275')) {function content_53b6e2f3bf25f2_83161275($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<div id="left-column">
		<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> > <?php echo $_smarty_tpl->tpl_vars['lang']->value['Reset_password_title'];?>
</div>
		<div class="content">
			<p><?php echo $_smarty_tpl->tpl_vars['lang']->value['Password_reset_text'];?>
</p>
			<p>
				<form method="POST" action="/user/reset">
					<ul>
						<li><input type="email" name="email" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Email'];?>
" required autofocus></li>
						<li><input type="submit" class="button green" name="submit" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Submit'];?>
"></li>
					</ul>
				</form>
			</p>
		</div>
	</div>
	
	<div id="right-column">
		<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	
</div>
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

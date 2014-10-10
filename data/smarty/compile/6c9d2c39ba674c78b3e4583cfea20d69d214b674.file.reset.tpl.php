<?php /* Smarty version Smarty-3.1.17, created on 2014-09-18 06:18:45
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/user/reset.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130530204541a5d250cb127-65111358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c9d2c39ba674c78b3e4583cfea20d69d214b674' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/user/reset.tpl',
      1 => 1407935886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130530204541a5d250cb127-65111358',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_541a5d250fe244_99961678',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_541a5d250fe244_99961678')) {function content_541a5d250fe244_99961678($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
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

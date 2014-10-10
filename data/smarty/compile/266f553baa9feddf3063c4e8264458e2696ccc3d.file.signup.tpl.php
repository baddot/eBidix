<?php /* Smarty version Smarty-3.1.17, created on 2014-08-14 17:59:05
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/user/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2411204053ecdcc98b5e45-04958058%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '266f553baa9feddf3063c4e8264458e2696ccc3d' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/user/signup.tpl',
      1 => 1407935886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2411204053ecdcc98b5e45-04958058',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'data' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53ecdcc9908471_75741833',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ecdcc9908471_75741833')) {function content_53ecdcc9908471_75741833($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div id="left-column">	
		<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> &raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['Sign_up'];?>
</div>
		<div class="content">
			<form method="post" action="/user/signup">
				<ul>
					<li><input type="text" name="username" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Username'];?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['username'])) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['username'];?>
<?php }?>" required autofocus></li>
					<li><input type="email" name="email" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Email'];?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['email'])) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['email'];?>
<?php }?>" required></li>
					<li><input type="password" name="password" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Password'];?>
" value="<?php if (isset($_smarty_tpl->tpl_vars['data']->value['password'])) {?><?php echo $_smarty_tpl->tpl_vars['data']->value['password'];?>
<?php }?>" required></li>
					<?php if ($_smarty_tpl->tpl_vars['settings']->value['app']['captcha']) {?>
						<li><img src="/user/captcha" width="160" height="60" alt="" /></li>
						<li><input type="text" name="captcha" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Verification_code'];?>
" required></li>
					<?php }?>
					<li><input type="checkbox" name="terms" value="1" checked required> <?php echo $_smarty_tpl->tpl_vars['lang']->value['cgu_accept'];?>
</li>
					<li><input type="submit" class="button green" name="signup" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Register'];?>
"></li>
				</ul>
			</form>
		</div>
	</div>
	
	<div id="right-column">
		<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>
	
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

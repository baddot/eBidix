<?php /* Smarty version Smarty-3.1.17, created on 2014-08-14 18:05:44
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/user/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175391282553ecde58422cb9-79286736%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae49094eeab30f61196b5e0568f920ca2dc79434' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/user/login.tpl',
      1 => 1407935886,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175391282553ecde58422cb9-79286736',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53ecde58453fd1_82924470',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ecde58453fd1_82924470')) {function content_53ecde58453fd1_82924470($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
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

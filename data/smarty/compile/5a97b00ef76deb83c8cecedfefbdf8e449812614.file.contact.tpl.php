<?php /* Smarty version Smarty-3.1.17, created on 2014-08-25 16:35:05
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/contact.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1263175353fb499966a168-93311578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5a97b00ef76deb83c8cecedfefbdf8e449812614' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/contact.tpl',
      1 => 1407935843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1263175353fb499966a168-93311578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53fb49996ab286_08338796',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fb49996ab286_08338796')) {function content_53fb49996ab286_08338796($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
<div id="left-column">
	<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> &raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value['Contact'];?>
</div>
	<div class="content">
		<form action="/contact" method="post">
			<ul>
				<?php if (!isset($_SESSION['user_id'])) {?>
					<li><input type="email" name="email" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Email'];?>
" required autofocus></li>
				<?php } else { ?>
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'];?>
">
				<?php }?>
				<li><input type="text" name="object" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Object'];?>
" required></li>
				<li><textarea name="message" cols="50" rows="10" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Message'];?>
" required></textarea></li>
				<li><input type="submit" class="button green" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Send'];?>
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

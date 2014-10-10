<?php /* Smarty version Smarty-3.1.17, created on 2014-08-14 17:59:25
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:120079378953ecdcdd6c7651-99171666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0400c06140b90aa0b0e45fdd5aff924d12217085' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/page.tpl',
      1 => 1407935844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '120079378953ecdcdd6c7651-99171666',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'page' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53ecdcdd6f5b50_17443613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ecdcdd6f5b50_17443613')) {function content_53ecdcdd6f5b50_17443613($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
<div id="left-column">
	<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> &raquo; <?php echo $_smarty_tpl->tpl_vars['page']->value['title'];?>
</div>
	<div class="content">
		<?php echo $_smarty_tpl->tpl_vars['page']->value['content'];?>

	</div>
</div>

<div id="right-column">
	<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

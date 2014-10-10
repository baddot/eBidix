<?php /* Smarty version Smarty-3.1.17, created on 2014-08-14 17:59:24
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/auction/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181400446853ecdcdc01c518-21146599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd724e78987e0d41c8b90ecadfd080b21ba3dbc55' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/auction/category.tpl',
      1 => 1407935883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181400446853ecdcdc01c518-21146599',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'category_name' => 0,
    'auctions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53ecdcdc04fe67_73687200',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53ecdcdc04fe67_73687200')) {function content_53ecdcdc04fe67_73687200($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="left-column">	
	<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> &raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value['Categories'];?>
 &raquo; <?php echo $_smarty_tpl->tpl_vars['category_name']->value;?>
</div>
	<div id="auctions">
		<ul>
			<?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value) {
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
				<?php echo $_smarty_tpl->getSubTemplate ('auction/display.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

			<?php } ?>
		</ul>
	</div>
</div>

<div id="right-column">
	<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
	
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

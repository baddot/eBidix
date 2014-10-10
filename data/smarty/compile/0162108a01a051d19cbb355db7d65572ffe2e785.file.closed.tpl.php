<?php /* Smarty version Smarty-3.1.17, created on 2014-06-25 18:30:58
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/auction/closed.tpl" */ ?>
<?php /*%%SmartyHeaderCode:214060012153aaf94232e165-96643839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0162108a01a051d19cbb355db7d65572ffe2e785' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/auction/closed.tpl',
      1 => 1403712450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '214060012153aaf94232e165-96643839',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'auctions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53aaf94243f1f9_21878393',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53aaf94243f1f9_21878393')) {function content_53aaf94243f1f9_21878393($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div id="left-column">		
		<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> &raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['Closed_auctions'];?>
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
	
</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

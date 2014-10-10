<?php /* Smarty version Smarty-3.1.17, created on 2014-08-13 16:56:15
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:33543469553eb7c8fbeb102-57062720%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1aa76159e7824a2046a243dd275932d2ad28bd61' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/home.tpl',
      1 => 1407935843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33543469553eb7c8fbeb102-57062720',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'top_ad' => 0,
    'home_text' => 0,
    'ongoing_auctions' => 0,
    'soon_auctions' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53eb7c8fc37bf8_23918062',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53eb7c8fc37bf8_23918062')) {function content_53eb7c8fc37bf8_23918062($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div id="left-column">	
		<?php if ($_smarty_tpl->tpl_vars['top_ad']->value['active']==1) {?><div class="top-ad"><?php echo $_smarty_tpl->tpl_vars['top_ad']->value['content'];?>
</div><?php }?>
		
		<?php if (!empty($_smarty_tpl->tpl_vars['home_text']->value)) {?><div class="infos-message"><?php echo $_smarty_tpl->tpl_vars['home_text']->value;?>
</div><?php }?>
		
		<div id="auctions">
			<ul>
				<?php if (!empty($_smarty_tpl->tpl_vars['ongoing_auctions']->value)) {?>	
					<?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ongoing_auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value) {
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
						<?php echo $_smarty_tpl->getSubTemplate ('auction/display.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					<?php } ?>
				<?php }?>
				<?php if (!empty($_smarty_tpl->tpl_vars['soon_auctions']->value)) {?>
					<?php $_smarty_tpl->tpl_vars['sort'] = new Smarty_variable('list', null, 0);?>
					<?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['soon_auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value) {
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
						<?php echo $_smarty_tpl->getSubTemplate ('auction/display.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					<?php } ?>
				<?php }?>
			</ul>
		</div>
	</div>
	
	<div id="right-column">
		<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

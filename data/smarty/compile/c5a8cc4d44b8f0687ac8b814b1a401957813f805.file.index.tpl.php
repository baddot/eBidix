<?php /* Smarty version Smarty-3.1.17, created on 2014-06-25 18:45:15
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/user/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:191768829353aafc9baadb97-84588505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5a8cc4d44b8f0687ac8b814b1a401957813f805' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/user/index.tpl',
      1 => 1403712453,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '191768829353aafc9baadb97-84588505',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'profile' => 0,
    'packages' => 0,
    'address' => 0,
    'unpaid' => 0,
    'uncomment' => 0,
    'messages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53aafc9bc33103_05947644',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53aafc9bc33103_05947644')) {function content_53aafc9bc33103_05947644($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="left-column">
	<div class="breadcrumb"><a href="/"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</a> &raquo; <?php echo $_smarty_tpl->tpl_vars['lang']->value['Menu']['My_account'];?>
</div>
	<div class="content">
		<p>
			<u><?php echo $_smarty_tpl->tpl_vars['lang']->value['Things_to_do'];?>
</u>
			<ul>
				<?php if (empty($_smarty_tpl->tpl_vars['profile']->value['firstname'])) {?><li><a href="/edit-account"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Complete_profil'];?>
</a></li><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['packages']->value) {?><li><a href="/packages"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Purchase_bids'];?>
</a></li><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['address']->value) {?><li><a href="/addresses"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add_address'];?>
</a></li><?php }?>
				<?php if ($_smarty_tpl->tpl_vars['unpaid']->value) {?><li><a href="/won-auctions"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Pay_for_an_auction'];?>
</a></li><?php }?>
				<?php if (!empty($_smarty_tpl->tpl_vars['uncomment']->value)) {?><li><a href="/won-auctions"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Leave_comment'];?>
</a></li><?php }?>
				<?php if (!empty($_smarty_tpl->tpl_vars['messages']->value)) {?><li><a href="/messages"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Read_messages'];?>
</a></li><?php }?>
			</ul>
		</p>
		<div class="coupon">
			<?php echo $_smarty_tpl->tpl_vars['lang']->value['If_have_coupon'];?>
<br>
			<form method="POST" action="/coupon">
				<input type="text" name="code" placeholder="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Code_coupon'];?>
" required> 
				<input type="submit" class="button green" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Submit'];?>
">
			</form>
		</div>
	</div>
</div>

<div id="right-column">
	<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>

<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>

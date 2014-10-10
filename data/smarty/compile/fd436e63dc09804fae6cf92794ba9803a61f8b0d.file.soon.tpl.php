<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:09:36
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/auction/soon.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27164141753b4e59084d6f9-53552550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd436e63dc09804fae6cf92794ba9803a61f8b0d' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/auction/soon.tpl',
      1 => 1403712440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27164141753b4e59084d6f9-53552550',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'number' => 0,
    'auctions' => 0,
    'auction' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e590b2eb44_69729331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e590b2eb44_69729331')) {function content_53b4e590b2eb44_69729331($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="container_12">
		<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Soon_auctions'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Soon_auctions'];?>
 (<?php echo $_smarty_tpl->tpl_vars['number']->value;?>
)</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Id'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Product'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Type'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Options'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Email_alerts'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Autobids'];?>
</th>
									
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['auction'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['auction']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['auctions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['auction']->key => $_smarty_tpl->tpl_vars['auction']->value) {
$_smarty_tpl->tpl_vars['auction']->_loop = true;
?>
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><a href="/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
</a></td>
										<td><?php echo $_smarty_tpl->tpl_vars['auction']->value['name'];?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['auction']->value['type']==1) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Classic_auction'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['type']==2) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Cent_auction'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['type']==3) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Clic_auction'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['type']==4) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Fixed_price_auction'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['type']==5) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Beginner_auction'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['type']==6) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Vip_auction'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['type']==7) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Free_auction'];?>
<?php }?></td>
										<td><?php if ($_smarty_tpl->tpl_vars['auction']->value['top']==1) {?><img src="/assets/img/icons/auction_star_icon.png" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Top_auction'];?>
" alt="" /><?php }?> <?php if ($_smarty_tpl->tpl_vars['auction']->value['podium']==1) {?><img src="/assets/img/icons/auction_podium_icon.png" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Podium'];?>
" alt="" /><?php }?> <?php if ($_smarty_tpl->tpl_vars['auction']->value['autobids']==0) {?><img src="/assets/img/icons/auction_autobids_icon.png" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Autobids'];?>
" alt="" /><?php }?> <?php if ($_smarty_tpl->tpl_vars['auction']->value['buynow']==1) {?><img src="/assets/img/icons/auction_buynow_icon.png" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Buynow'];?>
" alt="" /><?php }?></td>
										<td><a href="/admin/user?email_alerts=<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['auction']->value['email_alerts'];?>
</a></td>
										<td><a href="/admin/user?autobids=<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['auction']->value['autobids'];?>
</a></td>
										
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/auctions/start/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Start'];?>
</a></li><li><a href="/admin/auction/delete/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Delete'];?>
</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/controls.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>

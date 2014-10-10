<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:09:31
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/auction/ongoing.tpl" */ ?>
<?php /*%%SmartyHeaderCode:143581360853b4e58b831cd0-30954339%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5dc8bfe584001af7bbf0d18d7732c6dd977072f2' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/auction/ongoing.tpl',
      1 => 1403712439,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '143581360853b4e58b831cd0-30954339',
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
  'unifunc' => 'content_53b4e58bb47d55_53109684',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e58bb47d55_53109684')) {function content_53b4e58bb47d55_53109684($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="container_12">
		<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Ongoing_auctions'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Ongoing_auctions'];?>
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
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Date_hour_start'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Price_now'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Activated'];?>
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
										<td><?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
</td>
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
										<td><?php echo $_smarty_tpl->tpl_vars['auction']->value['start_time'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['auction']->value['price'];?>
&euro;</td>
										<td><?php if ($_smarty_tpl->tpl_vars['auction']->value['active']==1) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Yes'];?>
 <?php } else { ?><?php echo $_smarty_tpl->tpl_vars['lang']->value['No'];?>
<?php }?></td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['lang']->value['View'];?>
</a></li><li><a href="/admin/auction/stats/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Stats'];?>
</a></li><li style="color:#717171; margin-left:5px;"><a href="/admin/auction/delete/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
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

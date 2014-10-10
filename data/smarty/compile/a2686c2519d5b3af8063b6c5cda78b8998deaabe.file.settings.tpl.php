<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:07:36
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/settings/settings.tpl" */ ?>
<?php /*%%SmartyHeaderCode:199880141353b4e518de93a7-60410164%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2686c2519d5b3af8063b6c5cda78b8998deaabe' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/settings/settings.tpl',
      1 => 1403712447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '199880141353b4e518de93a7-60410164',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'settings_data' => 0,
    'setting' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e5193118c6_95525730',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e5193118c6_95525730')) {function content_53b4e5193118c6_95525730($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<div class="container_12">
		<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Settings'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Settings'];?>
</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable" cellspacing="0" cellpadding="0" width="100%">
							<thead>
								<tr>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Name'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Value'];?>
</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['setting'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['setting']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['settings_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['setting']->key => $_smarty_tpl->tpl_vars['setting']->value) {
$_smarty_tpl->tpl_vars['setting']->_loop = true;
?>
									<tr>
										<td>
											<div style="float:left; display:inline;">
											<?php if ($_smarty_tpl->tpl_vars['setting']->value['name']=='contact_email') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Contact_email'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auction_peak_start') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Auction_peak_start'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auction_peak_end') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Auction_peak_end'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='free_referral_register_credits') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Free_referral_credits'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='free_referral_buy_credits') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Free_ref_buy_credits'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='free_signup_credits') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Free_signup_credits'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='free_first_buy_credits') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Free_first_buy_credits'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='default_meta_title') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Default_meta_title'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='default_meta_description') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Default_meta_description'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='default_meta_keywords') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Default_meta_keywords'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='theme') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Theme'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='site_live') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Site_live'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='poll') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Poll_mod'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='coupons') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Coupons'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='bid_value') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Bid_value'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='bid_avg_value') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Bid_avg_value'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='per_page') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Per_page'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auctions_format') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Auctions_format'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='currency') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Currency'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='show_server_time') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Server_time'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auctions_display') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Auctions_display'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auctions_order') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Auctions_order'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='percent_bids_to_buy') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Percent_bids_to_buy'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='buy_now_limit') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Buy_now_limit'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='buy_now_nb_limit') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Buy_now_nb_limit'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='home_text') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home_text'];?>

											<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='site_no_live_txt') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Maintenance_text'];?>

											<?php }?>
											</div>
											<div style="float:left; display:inline;">
												<ul class="settings">
													<li>
														<a href="#"><img src="/assets/img/infos.png" alt="infos" /></a>
														<div class="tooltip"><?php echo $_smarty_tpl->tpl_vars['setting']->value['description'];?>
</div>
													</li>
												</ul>
											</div>
										</td>
										<?php if ($_smarty_tpl->tpl_vars['setting']->value['name']=='bid_value') {?><td><?php echo $_smarty_tpl->tpl_vars['setting']->value['value'];?>
€</td>
										<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='free_first_buy_credits'||$_smarty_tpl->tpl_vars['setting']->value['name']=='percent_bids_to_buy') {?><td><?php echo $_smarty_tpl->tpl_vars['setting']->value['value'];?>
%</td>
										<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='currency') {?><td><?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='EUR') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Euros'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['value']=='USD') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Dollars'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['value']=='GBD') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Pounds'];?>
<?php }?></td>
										<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auctions_display') {?><td><?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='labels') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Labels'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['value']=='list') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['List'];?>
<?php }?></td>
										<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['name']=='auctions_order') {?><td><?php if ($_smarty_tpl->tpl_vars['setting']->value['value']=='asc') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Asc'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['value']=='desc') {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Desc'];?>
<?php }?></td>
										<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['value']=='yes') {?><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['Yes'];?>
</td>
										<?php } elseif ($_smarty_tpl->tpl_vars['setting']->value['value']=='no') {?><td><?php echo $_smarty_tpl->tpl_vars['lang']->value['No'];?>
</td>
										<?php } else { ?><td><?php echo $_smarty_tpl->tpl_vars['setting']->value['value'];?>
</td>
										<?php }?>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/setting/edit/<?php echo $_smarty_tpl->tpl_vars['setting']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Edit'];?>
</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>

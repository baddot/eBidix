<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:06:40
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/elements/scroll_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113500027553b4e4e06328c0-26819550%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fda45c3892a499168687e92f63db4f5271ac62a' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/elements/scroll_menu.tpl',
      1 => 1403712445,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113500027553b4e4e06328c0-26819550',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e4e075aa89_88908205',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e4e075aa89_88908205')) {function content_53b4e4e075aa89_88908205($_smarty_tpl) {?>		<div class="scroll-menu">
			<div class="smc-1">
				<div class="smc-2">
					<div class="smc-3">
						<div id="content-scroll">
							<div id="content-holder">
								
								<div class="pane"">
									<ul class="menu-items">
										<li><a href="/admin"><img src="/assets/admin/images/function-icons/home_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</span></a></li>
										<li><a href="/admin/dashboard/messages"><img src="/assets/admin/images/function-icons/mail_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Messages'];?>
</span></a></li>
										<li><a href="/admin/stat/accounting"><img src="/assets/admin/images/function-icons/accounting_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Accounting'];?>
</span></a></li>
										<li><a href="/admin/dashboard/upload"><img src="/assets/admin/images/function-icons/box_upload_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Upload'];?>
</span></a></li>
										<li><a href="/admin/dashboard/logs"><img src="/assets/admin/images/function-icons/paper_pencil_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Logs'];?>
</span></a></li>
									</ul>
								</div>

								<div class="pane">
									<ul class="menu-items">
										<li><a href="/admin/product"><img src="/assets/admin/images/function-icons/products_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Products'];?>
</span></a><div class="tooltip"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Products_tooltip'];?>
</div></li>
										<li><a href="/admin/category"><img src="/assets/admin/images/function-icons/categories_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Categories'];?>
</span></a></li>
										<li><a href="/admin/auction/soon"><img src="/assets/admin/images/function-icons/auction_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Soon_auctions'];?>
</span></a></li>
										<li><a href="/admin/auction/ongoing"><img src="/assets/admin/images/function-icons/auction_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Ongoing_auctions'];?>
</span></a></li>
										<li><a href="/admin/auction/closed"><img src="/assets/admin/images/function-icons/closed_auction_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Closed_auctions'];?>
</span></a></li>
										<li><a href="/admin/auction/buys"><img src="/assets/admin/images/function-icons/buy_now_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Buys_auctions'];?>
</span></a></li>
										<li><a href="/admin/auction/bids"><img src="/assets/admin/images/function-icons/list_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Activity'];?>
</span></a></li>
									</ul>
								</div>
								
								<div class="pane">
									<ul class="menu-items">	
										<li><a href="/admin/user"><img src="/assets/admin/images/function-icons/users_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Users'];?>
</span></a></li>
										<li><a href="/admin/user/blacklist"><img src="/assets/admin/images/function-icons/blacklist_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Blacklist'];?>
</span></a></li>
										<li><a href="/admin/user/referrals"><img src="/assets/admin/images/function-icons/referrals_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Referrals'];?>
</span></a></li>
										<li><a href="/admin/stat/connexions"><img src="/assets/admin/images/function-icons/connexions_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Connexions'];?>
</span></a></li>
									</ul>
								</div>
								
								<div class="pane">
									<ul class="menu-items">
										<li><a href="/admin/page"><img src="/assets/admin/images/function-icons/page_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Pages'];?>
</span></a></li>
										<li><a href="/admin/advert"><img src="/assets/admin/images/function-icons/adverts_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Adverts'];?>
</span></a></li>
										<li><a href="/admin/poll"><img src="/assets/admin/images/function-icons/chart_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Polls'];?>
</span></a></li>
										<li><a href="/admin/testimonial"><img src="/assets/admin/images/function-icons/comment_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Testimonials'];?>
</span></a></li>
										<li><a href="/admin/email"><img src="/assets/admin/images/function-icons/emails_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Emails'];?>
</span></a></li>
										<li><a href="/admin/newsletter"><img src="/assets/admin/images/function-icons/mail_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Newsletters'];?>
</span></a></li>
									</ul>
								</div>
								
								<div class="pane">
									<ul class="menu-items">
										<li><a href="/admin/country"><img src="/assets/admin/images/function-icons/world_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Countries'];?>
</span></a></li>
										<li><a href="/admin/source"><img src="/assets/admin/images/function-icons/source_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Sources'];?>
</span></a></li>
										<li><a href="/admin/coupon"><img src="/assets/admin/images/function-icons/coupon_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Coupons'];?>
</span></a></li>
										<li><a href="/admin/package"><img src="/assets/admin/images/function-icons/wallet_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Packages'];?>
</span></a></li>
										<li><a href="/admin/payment"><img src="/assets/admin/images/function-icons/shopping_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Payment_systems'];?>
</span></a></li>
										<li><a href="/admin/supplier"><img src="/assets/admin/images/function-icons/suppliers_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Suppliers'];?>
</span></a></li>
										<li><a href="/admin/setting"><img src="/assets/admin/images/function-icons/spanner_48.png" alt="" /><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['General_settings'];?>
</span></a></li>
									</ul>
								</div>
								
							</div>
						</div>
						<div class="clearingfix"></div>
					</div>
				</div>
			</div>
		</div><?php }} ?>

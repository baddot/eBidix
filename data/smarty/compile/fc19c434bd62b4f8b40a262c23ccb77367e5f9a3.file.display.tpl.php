<?php /* Smarty version Smarty-3.1.17, created on 2014-06-25 18:27:49
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/auction/display.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2558717053aaf8858449e3-03754276%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fc19c434bd62b4f8b40a262c23ccb77367e5f9a3' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/default/auction/display.tpl',
      1 => 1403712450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2558717053aaf8858449e3-03754276',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sort' => 0,
    'auction' => 0,
    'settings' => 0,
    'lang' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53aaf885a74f16_89658249',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53aaf885a74f16_89658249')) {function content_53aaf885a74f16_89658249($_smarty_tpl) {?>				<?php if ($_smarty_tpl->tpl_vars['sort']->value=='labels') {?>
					<li class="label auction-item" id="auction_<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
">
						<h2><a href="/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['auction']->value['link_name'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['auction']->value['name'];?>
"><?php echo $_smarty_tpl->tpl_vars['auction']->value['name'];?>
</a></h2>
						<div class="details">
							<div class="image">
								<a href="/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['auction']->value['link_name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['site_url'];?>
/assets/img/product/thumb/<?php echo $_smarty_tpl->tpl_vars['auction']->value['product_id'];?>
/home_label.jpg" width="160" height="120" alt="<?php echo $_smarty_tpl->tpl_vars['auction']->value['name'];?>
"></a>
							</div>
							<div class="infos">
								<div class="bid-price"><?php echo $_smarty_tpl->tpl_vars['auction']->value['price'];?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
</div>
								<div class="product-price"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Value'];?>
: <b><?php echo $_smarty_tpl->tpl_vars['auction']->value['product_price'];?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
</b></div>
								<div class="countdown" id="timer_<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
">--:--:--</div>
								<div class="bid-bidder"></div>
								<div class="bid-button">
									<?php if ($_smarty_tpl->tpl_vars['auction']->value['closed']!=1) {?>
										<?php if ($_smarty_tpl->tpl_vars['auction']->value['status_id']==1) {?>
											<div class="set-autobid"><a href="/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['auction']->value['link_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Set_autobid'];?>
</a></div>
											<a class="button green" id="<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Bid'];?>
</a>
										<?php } else { ?>	
											<a class="button green" id="<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Bid'];?>
</a>
										<?php }?>
									<?php }?>
								</div>
							</div>
						</div>
						<div class="bid-message"></div>
					</li>
				<?php } elseif ($_smarty_tpl->tpl_vars['sort']->value=='list') {?>
					<li class="list auction-item" id="auction_<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
">
						<div class="image">
							<a href="/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['auction']->value['link_name'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['site_url'];?>
/assets/img/product/thumb/<?php echo $_smarty_tpl->tpl_vars['auction']->value['product_id'];?>
/home_list.jpg" width="60" height="35" alt="<?php echo $_smarty_tpl->tpl_vars['auction']->value['name'];?>
"></a>
						</div>
						<h2><a href="/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['auction']->value['link_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['auction']->value['name'];?>
</a></h2>
						<div class="infos-1">
							<div class="bid-price"><?php echo $_smarty_tpl->tpl_vars['auction']->value['price'];?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
</div>
							<div class="product-price"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Value'];?>
: <?php echo $_smarty_tpl->tpl_vars['auction']->value['product_price'];?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
</div>
						</div>
						<div class="countdown" id="timer_<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
">--:--:--</div>
						<div class="infos-2">	
							<div class="bid-bidder"></div>
						</div>
						<div class="bid-button">	
							<?php if ($_smarty_tpl->tpl_vars['auction']->value['closed']!=1) {?>
								<?php if ($_smarty_tpl->tpl_vars['auction']->value['status_id']==1) {?>
									<div class="set-autobid"><a href="/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['auction']->value['link_name'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Set_autobid'];?>
</a></div>
									<a class="button green" id="<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
" style="display:none;"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Bid'];?>
</a>
								<?php } else { ?>	
									<a class="button green" id="<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Bid'];?>
</a>
								<?php }?>
							<?php }?>
						</div>
						<div class="bid-message"></div>
					</li>
				<?php }?><?php }} ?>

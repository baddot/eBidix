<?php /* Smarty version Smarty-3.1.17, created on 2014-08-25 03:50:02
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/auction/view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:70946761453fa964a5013a3-66116307%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f36a13e0652ede789015da895f58ab63ed1df0c1' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/auction/view.tpl',
      1 => 1407935883,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70946761453fa964a5013a3-66116307',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'auction' => 0,
    'images' => 0,
    'counter' => 0,
    'lang' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53fa964a5be405_66424552',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53fa964a5be405_66424552')) {function content_53fa964a5be405_66424552($_smarty_tpl) {?><?php if (!is_callable('smarty_function_counter')) include '/var/www/html/demo.ebidix.com/app/libs/smarty/plugins/function.counter.php';
?><?php echo $_smarty_tpl->getSubTemplate ('header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div id="left-column">
	<div class="auction-item" id="auction_<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
">
		<div class="auction-image">
			<div class="big">
				<a href=""><img src="/assets/img/product/thumb/<?php echo $_smarty_tpl->tpl_vars['auction']->value['product_id'];?>
/product_gallery.jpg" width="240" height="240" alt=""></a>
			</div>
			<div class="thumbs-list">
				<ul>
					<?php echo smarty_function_counter(array('assign'=>'counter','start'=>0),$_smarty_tpl);?>

					<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
?>	
						<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

						<li><a rel="img<?php echo $_smarty_tpl->tpl_vars['counter']->value;?>
" href="#"><img src="/assets/img/product/thumb/<?php echo $_smarty_tpl->tpl_vars['auction']->value['product_id'];?>
/product_thumb.jpg" width="50" height="50" alt=""></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
		
		<div class="auction-infos">
			<h2><?php echo $_smarty_tpl->tpl_vars['auction']->value['product_name'];?>
</h2>
			
			<div class="content">
				<a href="#" id="auction-options-link"></a>
				<div class="auction-options">
					<ul>
						<li>- <a href="/auction/add_watch/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Follow_auction'];?>
</a></li>
						<?php if ($_smarty_tpl->tpl_vars['auction']->value['status_id']==1) {?><li>- <a href="/auction/alert/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Email_alert'];?>
</a></li><?php }?>
					</ul>
				</div>
				<div class="bid-config">
					<?php if ($_smarty_tpl->tpl_vars['auction']->value['type']==4) {?><img src="/assets/img/icons/fixed_auction_icon.png" alt="" />
					<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['type']==5) {?><img src="/assets/img/icons/beginner_icon.png" alt="" />
					<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['type']==6) {?><img src="/assets/img/icons/vip_icon.png" alt="" />
					<?php }?>
					<?php if ($_smarty_tpl->tpl_vars['auction']->value['podium']==1) {?><img src="/assets/img/icons/auction_podium_icon.png" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Podium'];?>
" alt="" /><?php }?> 
					<?php if ($_smarty_tpl->tpl_vars['auction']->value['autobids']==0) {?><img src="/assets/img/icons/auction_autobids_icon.png" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Autobids'];?>
" alt="" /><?php }?> 
					<?php if ($_smarty_tpl->tpl_vars['auction']->value['buynow']==1) {?><img src="/assets/img/icons/auction_buynow_icon.png" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Buynow'];?>
" alt="" /><?php }?>
					<img src="/assets/img/icons/time_increment_<?php echo $_smarty_tpl->tpl_vars['auction']->value['time_increment'];?>
.png" alt="" />
					<img src="/assets/img/icons/bid_debit_<?php echo $_smarty_tpl->tpl_vars['auction']->value['bid_debit'];?>
.png" alt="" />
					<?php if ($_smarty_tpl->tpl_vars['auction']->value['price_increment']=='0.01') {?><img src="/assets/img/icons/price_increment_1.png" alt="" />
					<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['price_increment']=='0.02') {?><img src="/assets/img/icons/price_increment_2.png" alt="" />
					<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['price_increment']=='0.03') {?><img src="/assets/img/icons/price_increment_3.png" alt="" />
					<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['price_increment']=='0.04') {?><img src="/assets/img/icons/price_increment_4.png" alt="" />
					<?php } elseif ($_smarty_tpl->tpl_vars['auction']->value['price_increment']=='0.05') {?><img src="/assets/img/icons/price_increment_5.png" alt="" />
					<?php }?>
				</div>
				<div class="bid-price"><?php echo $_smarty_tpl->tpl_vars['auction']->value['price'];?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
</div>
				<div class="product-price"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Value'];?>
: <b><?php echo $_smarty_tpl->tpl_vars['auction']->value['product_price'];?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
</b></div>
				<div class="countdown" id="timer_<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
">--:--:--</div>
				<div class="bid-bidder">&nbsp;</div>
				<div class="bid-button">
					<?php if ($_smarty_tpl->tpl_vars['auction']->value['closed']!=1&&$_smarty_tpl->tpl_vars['auction']->value['status_id']==3) {?>
						<a class="button green" id="<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Bid'];?>
</a>
					<?php }?>
				</div>
			</div>
			<div class="bid-message"></div>
		</div>
		
		
		<?php if ($_smarty_tpl->tpl_vars['auction']->value['status_id']>3) {?><div class="economy"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Economy'];?>
: <span class="bid-savings-percentage">&nbsp;</span></div><?php }?>
		
		<?php if ($_smarty_tpl->tpl_vars['auction']->value['autobids']==1&&isset($_SESSION['user_id'])&&$_smarty_tpl->tpl_vars['auction']->value['closed']==0) {?>
			<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Program_your_auction'];?>
</h3>
			<div class="auction-autobid">
				<form method="POST" action="/autobids/set/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
">
					<?php echo $_smarty_tpl->tpl_vars['lang']->value['Minimum_price'];?>
 <input type="text" name="minimum_price" /> 
					<?php echo $_smarty_tpl->tpl_vars['lang']->value['Maximum_price'];?>
 <input type="text" name="maximum_price" /> 
					<?php echo $_smarty_tpl->tpl_vars['lang']->value['Maximum_bids'];?>
 <input type="text" name="bids" /> 
					<input type="submit" name="submit" class="button blue" value="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Save'];?>
" />
				</form>
			</div>
		<?php }?>
		
		<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['History'];?>
</h3>
		<div class="bid-histories" id="bidHistoryTable<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
">
			<table width="100%" cellpadding="0" cellspacing="0" border="0">
				<thead>
					<tr>
						<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Date'];?>
</th>
						<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Price'];?>
</th>
						<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Username'];?>
</th>
						<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Type'];?>
</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		
		<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Description'];?>
</h3>
		<div class="product-description" id="product-description">
			<?php echo $_smarty_tpl->tpl_vars['auction']->value['description'];?>

		</div>
	</div>
</div>
	
<div id="right-column">
	<?php echo $_smarty_tpl->getSubTemplate ('right_column.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</div>
	
<?php echo $_smarty_tpl->getSubTemplate ('footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>

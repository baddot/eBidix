<?php /* Smarty version Smarty-3.1.17, created on 2014-08-13 16:56:15
         compiled from "/var/www/html/demo.ebidix.com/app/view/default/right_column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30049658753eb7c8fcd6255-11370477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '328d27f79288876ccf5d42964b36c5cb889e883d' => 
    array (
      0 => '/var/www/html/demo.ebidix.com/app/view/default/right_column.tpl',
      1 => 1407935844,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30049658753eb7c8fcd6255-11370477',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ads' => 0,
    'ad' => 0,
    'lang' => 0,
    'user' => 0,
    'auction' => 0,
    'settings' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53eb7c8fd348b1_09034450',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53eb7c8fd348b1_09034450')) {function content_53eb7c8fd348b1_09034450($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/var/www/html/demo.ebidix.com/app/libs/smarty/plugins/function.math.php';
?><?php if (isset($_smarty_tpl->tpl_vars['ads']->value)) {?>
	<div id="ad">
		<ul>
			<?php  $_smarty_tpl->tpl_vars['ad'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ad']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ads']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ad']->key => $_smarty_tpl->tpl_vars['ad']->value) {
$_smarty_tpl->tpl_vars['ad']->_loop = true;
?>
				<li><?php echo $_smarty_tpl->tpl_vars['ad']->value['img'];?>
</li>
			<?php } ?>
		</ul>
	</div>
<?php }?>

<?php if (isset($_SESSION['user_id'])) {?>
	<div class="content">
		<?php echo $_smarty_tpl->tpl_vars['lang']->value['Hi'];?>
 <?php echo $_SESSION['username'];?>
, 
		<br><?php echo $_smarty_tpl->tpl_vars['lang']->value['you_have'];?>
 <span class="bid-balance" style="font-weight:bold;"><?php if (!empty($_smarty_tpl->tpl_vars['user']->value['balance'])) {?><?php echo $_smarty_tpl->tpl_vars['user']->value['balance'];?>
<?php } else { ?>0<?php }?></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['credits'];?>

	</div>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['auction']->value['buynow'])&&$_smarty_tpl->tpl_vars['auction']->value['buynow']==1) {?>
	<div class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Buynow'];?>
</div>
	<div class="content center">
		<div class="descriptions">
			<?php echo $_smarty_tpl->tpl_vars['lang']->value['Product_price'];?>
<br>
			<?php echo $_smarty_tpl->tpl_vars['lang']->value['Delivery_cost'];?>
<br>
			<?php echo $_smarty_tpl->tpl_vars['lang']->value['Spent_credits'];?>
<br>
			<span style="font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Total'];?>
</span>
		</div> 
		<div class="prices">
			<?php echo $_smarty_tpl->tpl_vars['auction']->value['product_price'];?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
<br><br>
			+ <?php echo $_smarty_tpl->tpl_vars['auction']->value['delivery_cost'];?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
<br>
			- <?php echo $_smarty_tpl->tpl_vars['auction']->value['spent_credits'];?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
<br>
			<span style="font-weight:bold;"><?php echo smarty_function_math(array('equation'=>"x + y - z",'x'=>$_smarty_tpl->tpl_vars['auction']->value['product_price'],'y'=>$_smarty_tpl->tpl_vars['auction']->value['delivery_cost'],'z'=>$_smarty_tpl->tpl_vars['auction']->value['spent_credits']),$_smarty_tpl);?>
<?php echo $_smarty_tpl->tpl_vars['settings']->value['app']['currency_code'];?>
</span>
		</div>
		
		<div class="buy-button">
			<a class="button orange" href="/auction/buy/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Buy'];?>
</a>
		</div>
		
		<div class="infos"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Buynow_available_only'];?>
</div>
	</div>
<?php }?>

<div class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Legends'];?>
</div>
<div class="content">
	<ul>
		<li><img src="/assets/img/icons/beginner_icon.png" alt="" /> <span class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Beginner_option'];?>
</span></li>
		<li><img src="/assets/img/icons/vip_icon.png" alt="" /> <span class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Vip_auction'];?>
</span></li>
		<li><img src="/assets/img/icons/fixed_auction_icon.png" alt="" /> <span class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Fixed_price_auction'];?>
</span></li>
		<li><img src="/assets/img/icons/auction_podium_icon.png" alt="" /> <span class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Podium_option'];?>
</span></li>
		<li><img src="/assets/img/icons/auction_autobids_icon.png" alt="" /> <span class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['No_autobids'];?>
</span></li>
		<li><img src="/assets/img/icons/auction_buynow_icon.png" alt="" /> <span class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Buy_now'];?>
</span></li>
		<li><img src="/assets/img/icons/time_increment_45.png" alt="" /> <span class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Time_increment'];?>
</span></li>
		<li><img src="/assets/img/icons/bid_debit_1.png" alt="" /> <span class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Bid_debit'];?>
</span></li>
		<li><img src="/assets/img/icons/price_increment_1.png" alt="" /> <span class="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Price_increment'];?>
</span></li>
	</ul>
</div>
<?php }} ?>

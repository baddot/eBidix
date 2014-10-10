<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:06:40
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:129567831053b4e4e03678e8-57184639%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c80f9e83373d8ee3c4c6a88ebcc0b0e08da2e99e' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/index.tpl',
      1 => 1403712400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129567831053b4e4e03678e8-57184639',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'data' => 0,
    'month' => 0,
    'days' => 0,
    'day' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e4e0527753_91768279',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e4e0527753_91768279')) {function content_53b4e4e0527753_91768279($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

		
		<div class="container_12">
			<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Home'];?>
</div>
			<div class="grid_4">
				<div class="sb-box">
					<div class="sb-box-inner content">
						<div class="header">
							<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Infos'];?>
</h3>
						</div>
						
						<div class="bcont">
							<p>
								<b><?php echo $_smarty_tpl->tpl_vars['lang']->value['Income'];?>
 :</b>
								<ul class="fast_links">
									<li><?php echo $_smarty_tpl->tpl_vars['lang']->value['Today'];?>
 : <a href="/admin/auctions/bids?type=package&sort_by=today"><?php echo $_smarty_tpl->tpl_vars['data']->value['today_income'];?>
&euro;</a></li>
									<li><?php echo $_smarty_tpl->tpl_vars['lang']->value['Yesterday'];?>
 : <a href="/admin/auctions/bids?type=package&sort_by=yesterday"><?php echo $_smarty_tpl->tpl_vars['data']->value['yesterday_income'];?>
&euro;</a></li>
									<li><?php echo $_smarty_tpl->tpl_vars['lang']->value['This_week'];?>
 : <a href="/admin/auctions/bids?type=package&sort_by=this_week"><?php echo $_smarty_tpl->tpl_vars['data']->value['weekly_income'];?>
&euro;</a></li>
									<li><?php echo $_smarty_tpl->tpl_vars['lang']->value['This_month'];?>
 : <a href="/admin/auctions/bids?type=package&sort_by=this_month"><?php echo $_smarty_tpl->tpl_vars['data']->value['monthly_income'];?>
&euro;</a></li>
									<li><?php echo $_smarty_tpl->tpl_vars['lang']->value['Last_month'];?>
 : <a href="/admin/auctions/bids?type=package&sort_by=last_month"><?php echo $_smarty_tpl->tpl_vars['data']->value['last_month_income'];?>
&euro;</a></li>
									<li><?php echo $_smarty_tpl->tpl_vars['lang']->value['This_year'];?>
 : <a href="/admin/auctions/bids?type=package&sort_by=this_year"><?php echo $_smarty_tpl->tpl_vars['data']->value['yearly_income'];?>
&euro;</a></li>
									<li style="margin-top:10px;"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Registered_users'];?>
 : <a href="/admin/users"><?php echo $_smarty_tpl->tpl_vars['data']->value['registered_users'];?>
</a></li>
									<li><?php echo $_smarty_tpl->tpl_vars['lang']->value['Online_users'];?>
 : <a href="/admin/dashboard/online_users"><?php echo $_smarty_tpl->tpl_vars['data']->value['online_users'];?>
</a></li>
								</ul>
							</p>
							<p>
								<b><?php echo $_smarty_tpl->tpl_vars['lang']->value['Fast_links'];?>
</b>
								<ul class="fast_links">
									<li><a href="/admin/products/add"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add_new_product'];?>
</a></li>
									<li><a href="/admin/users/add"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add_new_user'];?>
</a></li>
									<li><a href="/admin/products"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Start_new_auction'];?>
</a></li>
									<li><a href="http://www.google.com/analytics/" target="_blank"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Usage_stats'];?>
</a></li>
								</ul>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="grid_8">
				<div class="sb-box">
					<div class="sb-box-inner content">
						<div class="header">
							<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Stats'];?>
</h3>
							<ul class="tabs" id="vis-setter">
								<li><a href="#" rel="area">Area</a></li>
								<li><a href="#" rel="line">Line</a></li>
								<li><a href="#" rel="bar">Bar</a></li>
								<li><a href="#" rel="pie">Pie</a></li>
							</ul>
						</div>
						<div class="bcont" id="visualize">
							<table class="graph">
								<caption><?php echo $_smarty_tpl->tpl_vars['month']->value;?>
</caption>
								<thead>
									<tr>
										<td></td>
										<?php  $_smarty_tpl->tpl_vars['day'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['day']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['days']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['day']->key => $_smarty_tpl->tpl_vars['day']->value) {
$_smarty_tpl->tpl_vars['day']->_loop = true;
?>
											<th scope="col"><?php echo $_smarty_tpl->tpl_vars['day']->value;?>
</th>
										<?php } ?>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Income'];?>
</th>
										<td>673</td>
										<td>31</td>
										<td>10</td>
										<td>5</td>
										<td>478</td>
										<td>641</td>
										<td>518</td>
										<td>372</td>
										<td>346</td>
										<td>296</td>
										<td>200</td>
										<td>133</td>
										<td>177</td>
										<td>185</td>
										<td>192</td>
										<td>196</td>
										<td>150</td>
										<td>114</td>
										<td>121</td>
										<td>192</td>
										<td>128</td>
										<td>158</td>
										<td>168</td>
										<td>155</td>
									</tr>
									<tr>
										<th scope="row"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Outgoings'];?>
</th>
										<td>800</td>
										<td>35</td>
										<td>19</td>
										<td>6</td>
										<td>559</td>
										<td>764</td>
										<td>1083</td>
										<td>507</td>
										<td>426</td>
										<td>368</td>
										<td>250</td>
										<td>147</td>
										<td>236</td>
										<td>225</td>
										<td>260</td>
										<td>249</td>
										<td>191</td>
										<td>136</td>
										<td>142</td>
										<td>237</td>
										<td>153</td>
										<td>193</td>
										<td>208</td>
										<td>185</td>
									</tr>	
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

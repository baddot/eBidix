<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:15:10
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/auction/buys.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189837807453b4e6de575b46-52659609%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2946e5c624e24321b89793bcec44872957e8befe' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/auction/buys.tpl',
      1 => 1403712438,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189837807453b4e6de575b46-52659609',
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
  'unifunc' => 'content_53b4e6de7cf8b1_23798780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e6de7cf8b1_23798780')) {function content_53b4e6de7cf8b1_23798780($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="container_12">
		<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Buys_auctions'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Buys_auctions'];?>
 (<?php echo $_smarty_tpl->tpl_vars['number']->value;?>
)</h3>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="closed_auctions_table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Id'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Name'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Buy_date'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Sold_price'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Winner'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Status'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Evaluation'];?>
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
"><?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
</a></td>
										<td><?php echo $_smarty_tpl->tpl_vars['auction']->value['name'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['auction']->value['end_time'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['auction']->value['price'];?>
&euro;</td>
										<td><a href="/admin/user/view/<?php echo $_smarty_tpl->tpl_vars['auction']->value['winner_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['auction']->value['winner_username'];?>
</a></td>
										<td><?php echo $_smarty_tpl->tpl_vars['auction']->value['status_name'];?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['auction']->value['status_id']<6) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Waiting'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Done'];?>
<?php }?></td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><?php if ($_smarty_tpl->tpl_vars['auction']->value['status_id']>4&&empty($_smarty_tpl->tpl_vars['auction']->value['sent'])) {?><li><a href="/admin/auction/delivery/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Shipping'];?>
</a></li><?php }?><li><a href="/admin/auction/delete/<?php echo $_smarty_tpl->tpl_vars['auction']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Delete'];?>
</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<div id="controls">
							<div id="perpage">
								<select onchange="sorter.size(this.value)">
								<option value="5">5</option>
									<option value="10" selected="selected">10</option>
									<option value="20">20</option>
									<option value="50">50</option>
									<option value="100">100</option>
								</select>
								<span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Entries_per_page'];?>
</span>
							</div>
							<div id="navigation">
								<img src="/assets/admin/images/first.gif" width="16" height="16" alt="" onclick="sorter.move(-1,true)" />
								<img src="/assets/admin/images/previous.gif" width="16" height="16" alt="" onclick="sorter.move(-1)" />
								<img src="/assets/admin/images/next.gif" width="16" height="16" alt="" onclick="sorter.move(1)" />
								<img src="/assets/admin/images/last.gif" width="16" height="16" alt="" onclick="sorter.move(1,true)" />
							</div>
							<div id="text"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Page'];?>
 <span id="currentpage"></span> <?php echo $_smarty_tpl->tpl_vars['lang']->value['on'];?>
 <span id="pagelimit"></span></div>
						</div>
						<div class="tableactions">
							<?php echo $_smarty_tpl->tpl_vars['lang']->value['Sort_filters'];?>
 
							<form method="POST" action="/admin/auction/buys">
								<select name="actions">
									<option>...</option>
									<optgroup label="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Buy_date'];?>
">
										<option value="today"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Today'];?>
</option>
										<option value="yesterday"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Yesterday'];?>
</option>
										<option value="this_week"><?php echo $_smarty_tpl->tpl_vars['lang']->value['This_week'];?>
</option>
										<option value="last_week"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Last_week'];?>
</option>
										<option value="this_month"><?php echo $_smarty_tpl->tpl_vars['lang']->value['This_month'];?>
</option>
										<option value="last_month"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Last_month'];?>
</option>
										<option value="this_year"><?php echo $_smarty_tpl->tpl_vars['lang']->value['This_year'];?>
</option>
										<option value="last_year"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Last_year'];?>
</option>
									</optgroup>
								</select>
								<button class="button blue small left"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Go'];?>
</span></button>
							</form>
						</div>
						<div class="clearingfix"></div>
						
							<script type="text/javascript">
								var sorter = new TINY.table.sorter("sorter");
								sorter.head = "head";
								sorter.asc = "asc";
								sorter.desc = "desc";
								sorter.even = "evenrow";
								sorter.odd = "oddrow";
								sorter.evensel = "evenselected";
								sorter.oddsel = "oddselected";
								sorter.paginate = true;
								sorter.currentid = "currentpage";
								sorter.limitid = "pagelimit";
								sorter.sortmethod = "desc";
								sorter.init("closed_auctions_table",1);
							</script>
						
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>

<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:11:30
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/users/users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:125077251153b4e602c91f93-07516825%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0bd95bb009df994db5da77d339c05afdc020fc4f' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/users/users.tpl',
      1 => 1403712449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125077251153b4e602c91f93-07516825',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'users' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e6031f6ba4_75211995',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e6031f6ba4_75211995')) {function content_53b4e6031f6ba4_75211995($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


	<div class="container_12">
		<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Users'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Users'];?>
 <a href="/admin/user/export" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Export'];?>
"><img src="/assets/admin/images/export_excel.png" width="20" alt="" /></a></h3>
						<ul class="tabs">
							<li class="active"><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['List'];?>
</a></li>
							<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add'];?>
</a></li>
							<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Search'];?>
</a></li>
						</ul>
					</div>
					<div class="bcont">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="users_table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Id'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Username'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['First_name'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Last_name'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Email'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Ip_address'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Date_of_birth'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Register_date'];?>
</th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Status'];?>
</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value) {
$_smarty_tpl->tpl_vars['user']->_loop = true;
?>
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</td>
										<td <?php if ($_smarty_tpl->tpl_vars['user']->value['admin']==1) {?>style="color:red; font-weight:bold;"<?php }?>><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['firstname'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['lastname'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['ip'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['date_of_birth'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['user']->value['register_date'];?>
</td>
										<td><?php if ($_smarty_tpl->tpl_vars['user']->value['active']==0&&empty($_smarty_tpl->tpl_vars['user']->value['firstname'])) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Not_confirmed'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['user']->value['active']==1&&empty($_smarty_tpl->tpl_vars['user']->value['firstname'])) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Not_completed'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['user']->value['active']==1&&!empty($_smarty_tpl->tpl_vars['user']->value['firstname'])) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Activated'];?>
<?php } elseif ($_smarty_tpl->tpl_vars['user']->value['active']==0&&!empty($_smarty_tpl->tpl_vars['user']->value['firstname'])) {?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Suspended'];?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['lang']->value['Desactivated'];?>
<?php }?></td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/user/view/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Details'];?>
</a></li><li><a href="/admin/user/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Edit'];?>
</a></li><li><?php if ($_smarty_tpl->tpl_vars['user']->value['active']==1) {?><a href="/admin/user/suspend/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Suspend'];?>
</a><?php } else { ?><a href="/admin/user/activate/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Activate'];?>
</a><?php }?></li><?php if ($_smarty_tpl->tpl_vars['user']->value['blacklist']==0) {?><li><a href="/admin/user/add_blacklist/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add_to_blacklist'];?>
</a></li><?php }?><li><a href="/admin/user/delete/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
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
 
							<form method="POST" action="/admin/user">
								<select name="actions">
									<option>...</option>
									<optgroup label="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Status'];?>
">
										<option value=""><?php echo $_smarty_tpl->tpl_vars['lang']->value['All'];?>
</option>
										<option value="activated"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Activated'];?>
</option>
										<option value="not_confirmed"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Not_confirmed'];?>
</option>
										<option value="not_completed"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Not_completed'];?>
</option>
										<option value="suspended"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Suspended'];?>
</option>
									</optgroup>
									<optgroup label="<?php echo $_smarty_tpl->tpl_vars['lang']->value['Register_date'];?>
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
								sorter.init("users_table",1);
							</script>
						
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/user">
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Username'];?>
 <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="username" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Password'];?>
 <span style="color:red;">*</span> :</label><br/> 
								<input type="password" name="password" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Email'];?>
 <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="email" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Last_name'];?>
 <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="last_name" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['First_name'];?>
 <span style="color:red;">*</span> :</label><br/> 
								<input type="text" name="first_name" class="inputtext medium" />
							</p>
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Gender'];?>
 <span style="color:red;">*</span> :</label><br/> 
								<?php echo $_smarty_tpl->tpl_vars['lang']->value['Male'];?>
 <input type="radio" class="radio" name="gender_id" value="1"> <?php echo $_smarty_tpl->tpl_vars['lang']->value['Female'];?>
 <input type="radio" class="radio" name="gender_id" value="2">
							</p>
							<p>
								<input type="checkbox" name="active" class="checkbox" value="1" checked="checked" /> <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Activate_user'];?>
</label>
							</p>
							<?php if ($_SESSION['user_id']==1) {?>
								<p>
									<input type="checkbox" name="admin" class="checkbox" value="1" /> <label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Admin'];?>
</label>
								</p>
							<?php }?>
							<p>
								<button name="submit" class="button green"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add'];?>
</span></button> <br /><br /><?php echo $_smarty_tpl->tpl_vars['lang']->value['fields_required'];?>

							</p>
						</form>
					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/user">
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Text'];?>
 <span style="color:red;">*</span> :</label><br/>
								<input type="text" name="search" class="inputtext medium" /> 
								<span class="tooltip_box"><span><a href="#"><img src="/assets/admin/images/infos.png" alt="infos" /></a><span class="tooltip"><?php echo $_smarty_tpl->tpl_vars['lang']->value['User_search_text'];?>
</span></span></span>
							</p>
							<p>
								<button class="button green"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Search'];?>
</span></button> <br /><br /><?php echo $_smarty_tpl->tpl_vars['lang']->value['fields_required'];?>

							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearingfix"></div>
	</div>

<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>
<?php }} ?>

<?php /* Smarty version Smarty-3.1.17, created on 2014-07-03 07:13:42
         compiled from "/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/settings/sources.tpl" */ ?>
<?php /*%%SmartyHeaderCode:57590520253b4e686d07066-79361930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38cf459fd216e761d02ffb4eab23184aa735e1ee' => 
    array (
      0 => '/var/www/vhosts/ks35714.kimsufi.com/demo.ebidix.com/app/view/admin/settings/sources.tpl',
      1 => 1403712447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '57590520253b4e686d07066-79361930',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'lang' => 0,
    'sources' => 0,
    'source' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_53b4e686e32982_66417940',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b4e686e32982_66417940')) {function content_53b4e686e32982_66417940($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('admin/elements/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	
	<div class="container_12">
		<div class="crumb">&raquo <?php echo $_smarty_tpl->tpl_vars['lang']->value['Sources'];?>
</div>

		<div class="grid_12">
			<div class="sb-box">
				<div class="sb-box-inner content">
					<div class="header">
						<h3><?php echo $_smarty_tpl->tpl_vars['lang']->value['Sources'];?>
</h3>
						<ul class="tabs">
							<li class="active"><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['List'];?>
</a></li>
							<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add'];?>
</a></li>
						</ul>
					</div>
					<div class="bcont nopadding">
						<table class="infotable sortable" cellspacing="0" cellpadding="0" width="100%" id="table">
							<thead>
								<tr>
									<th class="nosort"><input type="checkbox" class="checkall" /></th>
									<th><?php echo $_smarty_tpl->tpl_vars['lang']->value['Name'];?>
</th>
									<th class="nosort"><a class="action" href="#"></a></th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['source'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['source']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sources']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['source']->key => $_smarty_tpl->tpl_vars['source']->value) {
$_smarty_tpl->tpl_vars['source']->_loop = true;
?>
									<tr>
										<td class="small"><input type="checkbox" /></td>
										<td><?php echo $_smarty_tpl->tpl_vars['source']->value['name'];?>
</td>
										<td class="small"><a class="action" href="#"></a><div class="opmenu"><ul><li><a href="/admin/sources/edit/<?php echo $_smarty_tpl->tpl_vars['source']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Edit'];?>
</a></li><li><a href="/admin/sources/delete/<?php echo $_smarty_tpl->tpl_vars['source']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lang']->value['Delete'];?>
</a></li></ul><div class="clear"></div><div class="foot"></div></div></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?php echo $_smarty_tpl->getSubTemplate ('admin/elements/controls.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

					</div>
					
					<div class="bcont">
						<form method="post" action="/admin/sources">
							<p>
								<label><?php echo $_smarty_tpl->tpl_vars['lang']->value['Name'];?>
 <span style="color:red;">*</span> : </label><br />
								<input type="text" name="name" class="inputtext medium" />
							</p>
							<p>
								<button name="submit" class="button green"><span><?php echo $_smarty_tpl->tpl_vars['lang']->value['Add'];?>
</span></button>
								<br /><br /><?php echo $_smarty_tpl->tpl_vars['lang']->value['fields_required'];?>

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
